<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\System\Dashboard\Users\Models\AuthenticationOTPModel;
use Modules\System\Dashboard\Users\Models\UserModel;
use Modules\System\Dashboard\Users\Models\UserInfoModel;
use Illuminate\Support\Facades\Auth;
use Str;
use Modules\System\Dashboard\Users\Services\UserService;
use Modules\System\Dashboard\PermissionLogin\Models\PermissionLoginModel;
use Modules\Base\Library;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserService $userService
    )
    {
        $this->userService = $userService;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator =  Validator::make(
            $data,
            [
                'name' => 'required',
                'email' => ['required','email','regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/','unique:users'],
                'phone' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation'=> 'required',
                // 'otp'=>'required || exists:auth_otp,otp',
            ],
            [
                'name.required' => 'Tên không được để trống!',
                'email.required' => 'Email không được để trống!',
                'email.email' => 'Email không đúng định dạng!',
                'email.regex' => 'Email không đúng định dạng!',
                'email.unique' => 'Email đã tồn tại!',
                'phone.required' => 'Số điện thoại không được để trống!',
                'password.required' => 'Mật khẩu không được để trống!',
                'password_confirmation.confirmed' => 'Mật khẩu xác định không khớp',
                'password_confirmation.required' => 'Nhập lại mật khẩu không được để trống',
                // 'otp.required' => 'Mã OTP không được để trống!',
                // 'otp.exists' => 'Mã OTP không hợp lệ!',
            ]);
            return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     */
    protected function create(array $data)
    { 
            $createUser = User::create([
                'id' => (string)Str::uuid(),
                'name' => $data['name'],
                'email' => $data['email'],
                'user_introduce' => !empty($data['code_introduce'])?$data['code_introduce']:'',
                'password' => Hash::make($data['password']),
                'role_Users' => 'USERS',
            ]);
            Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
            $user = Auth::user();
            $getUsers = $this->userService->where('email',$data['email'])->first();
            $_SESSION["role"] = $getUsers->role;
            $_SESSION["id"]   = $getUsers->id;
            $_SESSION["email"]   = $data['email'];
            $_SESSION["name"]   = $getUsers->name;
            // kiem tra quyen nguoi dung
            $checkPrLogin = $this->permission_login($data['email']);
            Auth::login($user);
        return $createUser;
    }
     // check đăng nhập lưu token đăng nhập 1 nơi
     public function permission_login($email){
        $check = PermissionLoginModel::where('email',$email)->first();
        $random = Library::_get_randon_number();
        $token = date("Y") . '_' . date("m") . '_' . date("d") . "_" . date("H") . date("i") . date("u") .$_SESSION["id"]. $random;
        $arr = [
            'email'=> $email,
            'user_id'=> $_SESSION["id"],
            'token'=> $token,
            'ip'=> '1',
            'created_at'=> date("Y/m/d H:i:s"),
            'updated_at'=> date("Y/m/d H:i:s"),
        ];
        if(isset($check->email)){
            PermissionLoginModel::where('email',$email)->update($arr);
        }else{
            $arr['id'] = (string)Str::uuid();
            PermissionLoginModel::create($arr);
        }
        $_SESSION["token"] = $token;
    }
}
