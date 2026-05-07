<?php

namespace Modules\Client\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Client\Auth\Models\RegisterModel;
use Modules\System\Dashboard\Users\Models\AuthenticationOTPModel;
use Modules\System\Dashboard\Users\Services\UserInfoService;
use Modules\System\Dashboard\Users\Services\UserService;

class RegisterController extends Controller
{
    public function __construct(
        UserService $userService,
        UserInfoService $userInfoService
    ){
        $this->userService = $userService;
        $this->userInfoService = $userInfoService;
    }
    public function index()
    {
        return view('auth.register.index');
    }
    public function tab1()
    {
        return view('auth.register.tab1');
    }
    public function tab2(Request $request)
    {
        $arrInput = $request->all();
        if(!empty($arrInput['email'])){
            $user = $this->userService->where('email', $arrInput['email'])->orWhere('phone', $arrInput['phone'])->first();
            if(!empty($user)){
                return array('success' => false, 'message' => 'Email hoặc Số điện thoại đã tồn tại!');
            }
        }
        return view('auth.register.tab2');
    }
    public function tab3(Request $request)
    {
        $arrInput = $request->all();
        $params = [
            'id' => (string)\Str::uuid(),
            'name' => $arrInput['name'] ?? '',
            'address' => $arrInput['address'] ?? '',
            'phone' => $arrInput['phone'] ?? '',
            'dateBirth' => $arrInput['dateBirth'] ?? '',
            'company' => $arrInput['investment_company'] ?? '',
            'position' => '',
            'date_join' => '',
            'email' => $arrInput['email'] ?? '',
            'password' => Hash::make($arrInput['repass']),
            'user_introduce' => $arrInput['name'] ?? '',
            'account_tkck_vps'=> isset($arrInput['account_tkck_vps'])?$arrInput['account_tkck_vps']:'',
            'investment_time'=> isset($arrInput['investment_time'])?$arrInput['investment_time']:'',
            'investment_taste'=> isset($arrInput['investment_taste'])?$arrInput['investment_taste']:'',
            'investment_company'=> isset($arrInput['investment_company'])?$arrInput['investment_company']:'',
            // 'id_personnel' => $arrInput['code_introduce'] ?? '',
            'id_manage' => $arrInput['code_introduce'] ?? 'F889',
        ];
        $register = RegisterModel::where('email', $params['email'])->first();
        if(!empty($register)){
            $params['updated_at'] = date('Y-m-d H:i:s');
            $register->update($params);
        }else{
            $params['created_at'] = date('Y-m-d H:i:s');
            RegisterModel::insert($params);
        }
        $otp = $this->userService->sent_OTP($params);
        //gui otp mail ca nhan
        return view('auth.register.tab3');
    }
    public function tab4(Request $request)
    {
        $arrInput = $request->all();
        $AuthenticationOTP = AuthenticationOTPModel::where('phone', $arrInput['phone'])->where('otp', $arrInput['otp'])->first();
        if(!empty($AuthenticationOTP)){
            $arrData = [
                'name'=> $arrInput['name'],
                'address'=> $arrInput['address'],
                'phone'=> $arrInput['phone'],
                'email'=> $arrInput['email'],
                'password'=> Hash::make($arrInput['repass']),
                'dateBirth'=> $arrInput['dateBirth'],
                'id_personnel'=> isset($arrInput['id_personnel'])?$arrInput['id_personnel']:'',
                // 'id_personnel'=> isset($arrInput['id_personnel'])?$arrInput['id_personnel']:'',
                'id_manage'=> isset($arrInput['code_introduce'])?$arrInput['code_introduce']:'F889',
                'user_introduce'=> $arrInput['name_personnel'] ?? 'FinTop.BA@gmail.com',
                'investment_time'=> isset($arrInput['investment_time'])?$arrInput['investment_time']:'',
                'investment_taste'=> isset($arrInput['investment_taste'])?$arrInput['investment_taste']:'',
                'investment_company'=> isset($arrInput['investment_company'])?$arrInput['investment_company']:'',
                'account_tkck_vps'=> isset($arrInput['account_tkck_vps'])?$arrInput['account_tkck_vps']:'',
                "status" => 1,
                "role" => 'USERS',
            ];
            $arrInfo = [
                'company'=> '', 
                'position'=> '', 
                'date_join'=> '', 
                'color_view'=> 1,
                'created_at'=> date("Y-m-d H:i:s")
            ];
            $register = $this->userService->where('email', $arrInput['email'])->first();
            if(!empty($register)){
                $arrData['updated_at'] = date('Y-m-d H:i:s');
                $register->update($arrData);
                $this->userInfoService->where('user_id', $register->id)->update($arrInfo);
            }else{
                $arrData['id'] = (string)\Str::uuid();
                $arrData['created_at'] = date('Y-m-d H:i:s');
                $arrInfo['id'] = (string)\Str::uuid();
                $arrInfo['user_id'] = $arrData['id'];
                $this->userService->insert($arrData);
                $this->userInfoService->insert($arrInfo);
            }
            return view('auth.register.tab4');
        }else{
            return array('success' => false, 'message' => 'Mã xác nhận không chính xác!');
        }
    }
}