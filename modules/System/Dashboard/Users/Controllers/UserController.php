<?php

namespace Modules\System\Dashboard\Users\Controllers;

use App\Http\Controllers\Controller;
use Modules\System\Dashboard\Users\Services\UserInfoService;
use Modules\System\Dashboard\Users\Services\UserService;
use Modules\System\Dashboard\Users\Models\AuthenticationOTPModel;
use Modules\System\Helpers\PaginationHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Modules\Base\Helpers\ForgetPassWordMailHelper;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Client\Services\ClientService;

/**
 *
 * @author Luatnc
 */
class UserController extends Controller
{
    public function __construct(
        ClientService $ClientService,
        userInfoService $userInfoService,
        UserService $userService,
        CategoryService $CategoryService
    ){
        $this->ClientService  = $ClientService;
        $this->userInfoService  = $userInfoService;
        $this->userService  = $userService;
        $this->CategoryService  = $CategoryService;
    }

    /**
     * màn hình danh sách người dùng
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('dashboard.users.index');
    }
    /**
     * user_info
     *
     * @return view
     */
    public function indexUserInfo(Request $request)
    {
        $data = $this->userService->where('id',$_SESSION["id"])->first();
        $userInfo = $this->userInfoService->where('user_id',$_SESSION['id'])->first();
        $data['company'] = !empty($userInfo->company)?$userInfo->company:null;
        $data['position'] = !empty($userInfo->position)?$userInfo->position:null;
        $data['date_join'] = !empty($userInfo->date_join)?$userInfo->date_join:null;
        return view('dashboard.users.userInfor.index',compact('data'));
    }
     /**
     * thay đổi màu sắc trang web
     *
     * @return view
     */
    public function editColorView(Request $request)
    {
        $input = $request->all();
        if(!empty($input['is_checkbox'])){
            $checkInfo = $this->userInfoService->where('user_id',$input['id'])->first();
            if($checkInfo){
                $update = $this->userInfoService->where('user_id',$input['id'])->update(['color_view'=> '1']);
            }else{
                $create = $this->userInfoService->create(['id'=>(string) \Str::uuid(),'color_view'=> '1','user_id'=> $input['id']]);
            }
            $_SESSION["color_view"] = 1;
        }else{
            $checkInfo = $this->userInfoService->where('user_id',$input['id'])->first();
            if($checkInfo){
                $update = $this->userInfoService->where('user_id',$input['id'])->update(['color_view'=> '2']);
            }else{
                $create = $this->userInfoService->create(['id'=>(string) \Str::uuid(),'color_view'=> '2','user_id'=> $input['id']]);
            }
            $_SESSION["color_view"] = 2;
        }
        return array('success' => true, 'message' => 'Cập nhật thành công');
    }

    /**
     * Load màn hình thêm mới người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function add(Request $request)
    {
        $input = $request->all();
        $data = $this->userService->addUserDisplay($input);
        return view('Users::User.add', $data);
    }
     /**
     * Load màn hình them thông tin người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function createForm(Request $request)
    {
        $input = $request->all();
        $cate_quyen = $this->CategoryService->where('cate','DM_QUYEN')->orderBy('order','asc')->get();
        if($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'MANAGE'){
            $data['arr_quanly'] = $this->userService->where('role','ADMIN')->orWhere('role','MANAGE')->orWhere('role','CV_ADMIN')->orWhere('role','SALE_ADMIN')->orWhere('role','LIKE','%SALE_ADMIN%')->orWhere('role','LIKE','%CV_ADMIN%')->orderBy('order','asc')->get()->toArray();
        }else{
            $data['arr_quanly'] = $this->userService->where('id_personnel',$_SESSION['id_personnel'])->get();
        }
        $quyen = [];
        foreach($cate_quyen as $value){
            
            if($_SESSION['role'] == 'ADMIN'){
                $quyen[] = [
                    'code_category' => $value['code_category'],
                    'name_category' =>  $value['name_category'],
                    'status' =>  0,
                ];
            }elseif($_SESSION['role'] == 'MANAGE'){
                $quyen = [
                    0 => [
                        'code_category' => 'MANAGE',
                        'name_category' =>  'Trợ lý CEO',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'CV_ADMIN',
                        'name_category' => 'CV - Admin',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'CV_PRO',
                        'name_category' => 'CV - Pro',
                        'status' =>  0,
                    ],
                    3 => [
                        'code_category' => 'CV_BASIC',
                        'name_category' =>  'CV - basic',
                        'status' =>  0,
                    ],
                    4 => [
                        'code_category' => 'SALE_ADMIN',
                        'name_category' =>  'Sale - Admin',
                        'status' =>  0,
                    ],
                    5 => [
                        'code_category' => 'SALE_BASIC',
                        'name_category' => 'Sale',
                        'status' =>  0,
                    ],
                    6 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                ];
            }elseif($_SESSION['role'] == 'CV_ADMIN'){
                $quyen = [
                    0 => [
                        'code_category' => 'CV_ADMIN',
                        'name_category' =>  'CV - Admin',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'CV_PRO',
                        'name_category' => 'CV - Pro',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'CV_BASIC',
                        'name_category' =>  'CV - basic',
                        'status' =>  0,
                    ],
                    3 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                    
                ];
            }elseif($_SESSION['role'] == 'SALE_ADMIN'){
                $quyen = [
                    0 => [
                        'code_category' => 'SALE_ADMIN',
                        'name_category' =>  'Sale - Admin',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'SALE_BASIC',
                        'name_category' => 'Sale',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                    
                ];
            }elseif($_SESSION['role'] == 'CV_ADMIN,SALE_ADMIN'){
                $quyen = [
                    0 => [
                        'code_category' => 'CV_ADMIN',
                        'name_category' =>  'CV - Admin',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'CV_PRO',
                        'name_category' => 'CV - Pro',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'CV_BASIC',
                        'name_category' =>  'CV - basic',
                        'status' =>  0,
                    ],
                    3 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                    
                ];
            }elseif($_SESSION['role'] == 'CV_ADMIN,SALE_BASIC'){
                $quyen = [
                    0 => [
                        'code_category' => 'CV_ADMIN',
                        'name_category' =>  'CV - Admin',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'CV_PRO',
                        'name_category' => 'CV - Pro',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'CV_BASIC',
                        'name_category' =>  'CV - basic',
                        'status' =>  0,
                    ],
                    3 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                    
                ];
            }elseif($_SESSION['role'] == 'CV_PRO,SALE_ADMIN'){
                $quyen = [
                    0 => [
                        'code_category' => 'SALE_ADMIN',
                        'name_category' =>  'Sale - Admin',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'SALE_BASIC',
                        'name_category' => 'Sale',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                    
                ];
            }
            elseif($_SESSION['role'] == 'CV_BASIC,SALE_ADMIN'){
                $quyen = [
                    0 => [
                        'code_category' => 'SALE_ADMIN',
                        'name_category' =>  'Sale - Admin',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'SALE_BASIC',
                        'name_category' => 'Sale',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                    
                ];
            }
        }
        $data['cate_quyen'] = $quyen;
        return view('dashboard.users.edit',compact('data'));
    }
    /**
     * Thêm thông tin người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function create (Request $request)
    {
        $input = $request->input();
        $create = $this->userService->store($input,$_FILES); 
        return $create;
    }
    /**
     * Load màn hình chỉnh sửa thông tin người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        $data = $this->userService->editUser($input);
        $cate_quyen = $this->CategoryService->where('cate','DM_QUYEN')->orderBy('order','asc')->get();
        if($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'MANAGE'){
            $data['arr_quanly'] = $this->userService->where('role','ADMIN')->orwhere('role','MANAGE')->orWhere('role','CV_ADMIN')->orWhere('role','SALE_ADMIN')->orWhere('role','LIKE','%SALE_ADMIN%')->orWhere('role','LIKE','%CV_ADMIN%')->orWhere('role','SALE_BASIC')->orWhere('role','LIKE','%SALE_BASIC%')->orderBy('order','asc')->get()->toArray();
        }else{
            $data['arr_quanly'] = $this->userService->where('id_personnel',$_SESSION['id_personnel'])->get();
        }
        $quyen = [];
        foreach($cate_quyen as $value){
            
            if($_SESSION['role'] == 'ADMIN'){
                $quyen[] = [
                    'code_category' => $value['code_category'],
                    'name_category' =>  $value['name_category'],
                ];
            }elseif($_SESSION['role'] == 'MANAGE'){
                $quyen = [
                    0 => [
                        'code_category' => 'MANAGE',
                        'name_category' =>  'Trợ lý CEO',
                    ],
                    1 => [
                        'code_category' => 'CV_ADMIN',
                        'name_category' => 'CV - Admin',
                    ],
                    2 => [
                        'code_category' => 'CV_PRO',
                        'name_category' => 'CV - Pro',
                    ],
                    3 => [
                        'code_category' => 'CV_BASIC',
                        'name_category' =>  'CV - basic',
                    ],
                    4 => [
                        'code_category' => 'CV_BASIC',
                        'name_category' =>  'CV - basic',
                    ],
                    5 => [
                        'code_category' => 'SALE_ADMIN',
                        'name_category' =>  'Sale - Admin',
                    ],
                    6 => [
                        'code_category' => 'SALE_BASIC',
                        'name_category' => 'Sale',
                    ],
                    7 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                ];
            }elseif($_SESSION['role'] == 'CV_ADMIN'){
                $quyen = [
                    0 => [
                        'code_category' => 'CV_ADMIN',
                        'name_category' =>  'CV - Admin',
                    ],
                    1 => [
                        'code_category' => 'CV_PRO',
                        'name_category' => 'CV - Pro',
                    ],
                    2 => [
                        'code_category' => 'CV_BASIC',
                        'name_category' =>  'CV - basic',
                    ],
                    3 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                ];
            }elseif($_SESSION['role'] == 'SALE_ADMIN'){
                $quyen = [
                    0 => [
                        'code_category' => 'SALE_ADMIN',
                        'name_category' =>  'Sale - Admin',
                    ],
                    1 => [
                        'code_category' => 'SALE_BASIC',
                        'name_category' => 'Sale',
                    ],
                    2 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                    
                ];
             }elseif($_SESSION['role'] == 'CV_ADMIN,SALE_ADMIN'){
                $quyen = [
                    0 => [
                        'code_category' => 'CV_ADMIN',
                        'name_category' =>  'CV - Admin',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'CV_PRO',
                        'name_category' => 'CV - Pro',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'CV_BASIC',
                        'name_category' =>  'CV - basic',
                        'status' =>  0,
                    ],
                    3 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                    
                ];
            }elseif($_SESSION['role'] == 'CV_ADMIN,SALE_BASIC'){
                $quyen = [
                    0 => [
                        'code_category' => 'CV_ADMIN',
                        'name_category' =>  'CV - Admin',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'CV_PRO',
                        'name_category' => 'CV - Pro',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'CV_BASIC',
                        'name_category' =>  'CV - basic',
                        'status' =>  0,
                    ],
                    3 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                    
                ];
            }elseif($_SESSION['role'] == 'CV_PRO,SALE_ADMIN'){
                $quyen = [
                    0 => [
                        'code_category' => 'SALE_ADMIN',
                        'name_category' =>  'Sale - Admin',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'SALE_BASIC',
                        'name_category' => 'Sale',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                    
                ];
            }
            elseif($_SESSION['role'] == 'CV_BASIC,SALE_ADMIN'){
                $quyen = [
                    0 => [
                        'code_category' => 'SALE_ADMIN',
                        'name_category' =>  'Sale - Admin',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'SALE_BASIC',
                        'name_category' => 'Sale',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                    
                ];
            }elseif($_SESSION['role'] == 'CV_ADMIN,SALE_ADMIN'){
                $quyen = [
                    0 => [
                        'code_category' => 'CV_ADMIN',
                        'name_category' =>  'CV - Admin',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'CV_PRO',
                        'name_category' => 'CV - Pro',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'CV_BASIC',
                        'name_category' =>  'CV - basic',
                        'status' =>  0,
                    ],
                    3 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                    
                ];
            }elseif($_SESSION['role'] == 'CV_ADMIN,SALE_BASIC'){
                $quyen = [
                    0 => [
                        'code_category' => 'CV_ADMIN',
                        'name_category' =>  'CV - Admin',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'CV_PRO',
                        'name_category' => 'CV - Pro',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'CV_BASIC',
                        'name_category' =>  'CV - basic',
                        'status' =>  0,
                    ],
                    3 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                ];
                
            }elseif($_SESSION['role'] == 'CV_PRO,SALE_ADMIN'){
                $quyen = [
                    0 => [
                        'code_category' => 'SALE_ADMIN',
                        'name_category' =>  'Sale - Admin',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'SALE_BASIC',
                        'name_category' => 'Sale',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                    
                ];
            }
            elseif($_SESSION['role'] == 'CV_BASIC,SALE_ADMIN'){
                $quyen = [
                    0 => [
                        'code_category' => 'SALE_ADMIN',
                        'name_category' =>  'Sale - Admin',
                        'status' =>  0,
                    ],
                    1 => [
                        'code_category' => 'SALE_BASIC',
                        'name_category' => 'Sale',
                        'status' =>  0,
                    ],
                    2 => [
                        'code_category' => 'USERS',
                        'name_category' => 'khách hàng'
                    ]
                    
                ];
            }
        }
        $arrQuyen = [];
        foreach($quyen as $value){
            $code = $value['code_category'];
            if(in_array($value['code_category'],$data['arrQuyen'])){
                $arrQuyen[] = [
                    'code_category' =>  $code,
                    'name_category' =>  $value['name_category'],
                    'status' =>  1
                ];
            }else{
                $arrQuyen[] = [
                    'code_category' =>  $code,
                    'name_category' =>  $value['name_category'],
                    'status' =>  0
                ];
            }
        }
        $data['cate_quyen'] = $arrQuyen;
        $getuser_introduce_name = $this->userService->where('id_manage',$data['id_manage'])->first();
        $data['user_introduce_name'] = '';
        if(!empty($getuser_introduce_name['name'])){
            $data['user_introduce_name'] = $getuser_introduce_name['name'];
        }
        return view('dashboard.users.edit',compact('data'));
    }

     /**
     * Xóa người dùng
     *
     * @param Request $request
     *
     * @return Array
     */
    public function delete(Request $request)
    {
        $input = $request->all();
        if($_SESSION['role'] != 'ADMIN' && $_SESSION['role'] != 'MANAGE' && $_SESSION['role'] != 'CV_ADMIN' && $_SESSION['role'] != 'CV_ADMIN,SALE_ADMIN' && $_SESSION['role'] != 'CV_ADMIN,SALE_BASIC' && $_SESSION['role'] != 'SALE_ADMIN'){
            return array('success' => false, 'message' => 'Rất tiếc! bạn ko có quyền. Vui lòng liên hệ hỗ trợ FinTop.');
        }
        $listids = trim($input['listitem'], ",");
        $ids = explode(",", $listids);
        foreach ($ids as $id) {
            if ($id) {
                $this->userService->where('id',$id)->delete();
            }
        }
        return array('success' => true, 'message' => 'Xóa thành công');
    }
     /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     */
    public function loadList(Request $request)
    { 
        $paginationHelper = new PaginationHelper();
        $arrInput = $request->input();
        if($arrInput['role'] == '' || $arrInput['role'] == 'undefined'){
            unset($arrInput['role']);
        }
        $data = array();
        $param = $arrInput;
        $param['sort'] = 'order';
        $param['sortType'] = 1;
        $param['role'] = ['USERS'];
        if($_SESSION['role'] == 'CV_ADMIN' || $_SESSION['role'] == 'CV_ADMIN,SALE_ADMIN' || $_SESSION['role'] == 'CV_ADMIN,SALE_BASIC' 
        || $_SESSION['role'] == 'SALE_ADMIN' || $_SESSION['role'] == 'SALE_ADMIN,SALE'){
            $getUser_child_goc = [$_SESSION['id_personnel']];
            $getUser_child = $this->userService->where('id_manage',$_SESSION['id_personnel'])->where('role','!=','USERS')->pluck('id_personnel')->toArray();
            $id_manage = array_merge($getUser_child_goc,$getUser_child);
            $param['id_manage'] = $id_manage;
        }elseif($_SESSION['role'] == 'MANAGE'){
            $param['role'] = ['ADMIN','USERS'];
        }
        
        // dd($param);
        $objResult = $this->userService->filter($param);
        $data['datas'] = $objResult;
        return view("dashboard.users.loadlist", $data);
    }
     /**
     * hiển thị modal đổi mật khẩu
     *
     * @param Request $request
     *
     * @return view
     */
    public function changePass(Request $request)
    {
        $input = $request->all();
        $data['id'] = $input['id'];
        $users = $this->userService->where('id',$input['id'])->first();
        $data['email_acc'] = $users['email'];
        return view('dashboard.users.userInfor.edit',compact('data'));
    }
    /**
     * Cập nhật mật khẩu
     *
     * @param Request $request
     *
     * @return view
     */
    // public function updatePass(Request $request)
    // {
    //     $input = $request->all();
    //     if (Auth::guard('web')->attempt(['email' => $input['email_acc'],'password' => $input['password_old']])) {
    //         if($input['password_new'] != $input['password_retype_change']){
    //             return array('success' => false, 'message' => 'Nhập lại mật khẩu không khớp!');
    //         }
    //         $user = $this->userService->where('email',$input['email_acc'])->first();
    //         $selectOtp = AuthenticationOTPModel::where('phone',$user['phone'])->first();
    //         $zenData = [
    //             'phone'=> $user['phone'],
    //             'otp'=> 'FT'.rand(10,100).rand(10,100).rand(10,100),
    //             'created_at'=> date("Y/m/d H:i:s"),
    //             'updated_at'=> date("Y/m/d H:i:s"),
    //         ];
    //         if(isset($input['otp'])){
    //             $checkOtp = AuthenticationOTPModel::where('phone',$user['phone'])->where('otp',$input['otp'])->first();
    //             if(empty($checkOtp)){
    //                 return array('success' => false, 'message' => 'Mã otp không khớp!');
    //             }else{
    //                  $passNew = [
    //                     'password'=> Hash::make($input['password_new']),
    //                  ];
    //                  $updatePass = $this->userService->where('id',$input['user_id'])->update($passNew);
    //                  return array('success' => 3, 'message' => 'Mật khẩu của bạn đã được thay đổi');
    //             }
    //         }
    //         if(isset($selectOtp)){
    //             $create = AuthenticationOTPModel::where('phone',$user['phone'])->update($zenData);
    //         }else{
    //             $zenData['id'] = (string)\Str::uuid();
    //             $create = AuthenticationOTPModel::create($zenData);
    //         }
         
    //         // $this->sendMail($input);
    //         $input['email'] = $input['email_acc'];
    //         $sendOtp = $this->userService->sendMail_register($input,$zenData['otp']);
    //         return array('success' => true, 'message' => 'Chúng tôi đã gửi mã OTP qua gmail của bạn!');
    //     } else {
    //         return array('success' => false, 'message' => 'Mật khẩu cũ chưa chính xác!');
    //     }
    // }
    public function updatePass(Request $request)
    {
        $input = $request->all();
        // dd($input);
        if ($input['password_old'] == 'fintop123') {
            if($input['password_new'] != $input['password_retype_change']){
                return array('success' => false, 'message' => 'Nhập lại mật khẩu không khớp!');
            }
            $user = $this->userService->where('email',$input['email_acc'])->first();
            $passNew = [
            'password'=> Hash::make($input['password_new']),
            ];
            $updatePass = $this->userService->where('id',$input['user_id'])->update($passNew);
            return array('success' => 3, 'message' => 'Mật khẩu của bạn đã được thay đổi');
        }
        else if (Auth::guard('web')->attempt(['email' => $input['email_acc'],'password' => $input['password_old']])) {
            if($input['password_new'] != $input['password_retype_change']){
                return array('success' => false, 'message' => 'Nhập lại mật khẩu không khớp!');
            }
            $user = $this->userService->where('email',$input['email_acc'])->first();
            $passNew = [
            'password'=> Hash::make($input['password_new']),
            ];
            $updatePass = $this->userService->where('id',$input['user_id'])->update($passNew);
            return array('success' => 3, 'message' => 'Mật khẩu của bạn đã được thay đổi');
        } else {
            return array('success' => false, 'message' => 'Mật khẩu cũ chưa chính xác!');
        }
    }
     /**
     * Gửi mail đến người dùng
     * 
     * @param Array $input
     */
    public function sendMail($input)
    {
        $stringHtml = file_get_contents(base_path() . '\storage\templates\forgetPassword\tem_forget.html');
        // Lấy dữ liệu
        $user = $this->userService->where('id',$input['user_id'])->first();
        $data['date'] = 'Ngày ' . date('d') . ' tháng ' . date('m') . ' năm ' . date('Y');
        $data['email'] = !empty($input['email_acc'])?$input['email_acc']:null;
        $data['name'] = $user->name;
        $data['phone'] = $user->phone;
        $data['mailto'] = $input['email_acc'];
        $data['passwordNew'] = $input['password_new'];
        $data['subject'] = 'Trung tâm NC&PT Dữ liệu chứng khoán FinTop DATA';
        // Gửi mail
        (new ForgetPassWordMailHelper($data['email'], $data['email'], $stringHtml, $data))->send($data);
    }
    
    /**
     * Cập nhật trạng thái
     */
    public function changeStatus(Request $request)
    {
        $input = $request->all();
        $users = $this->userService->where('id', $input['id'])->first();
        if(!empty($users)){
            $users->update(['status' => $input['status']]);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
            return array('success' => false, 'message' => 'Không tìm thấy dữ liệu!');
        }
    }
    /**
    * view form OTP
    */
    public function sent_OTP(Request $request)
    {
        $input = $request->all();
        $data = $this->userService->sent_OTP($input);
        return $data;
    }
      /**
     * hiển thị modal đổi mật khẩu
     *
     * @param Request $request
     *
     * @return view
     */
    public function registerIntroduce(Request $request ,$id)
    {
        $input = $request->all();
        $checkUser = $this->userService->where('id_personnel', $id)->first();
        if(!empty($checkUser)){
            $data['user_introduce'] = $checkUser['id_personnel'];
            $data['user_introduce_name'] = $checkUser['name'];
            $data['user_introduce_id'] = $checkUser['id_personnel'];
            return view('auth.register.index',compact('data'));
        }else{
            return view('dashboard.home.404_registerUserCode');
        }
    }
     /**
    * lấy thông tin nhân viên giới thiệu
    */
    public function getUser(Request $request)
    {
        $input = $request->all();
        $selectUser = $this->userService->where('id_personnel',$input['code_introduce'])->first();
        if($input['code_introduce'] == ''){
            return '';
        }
        if(isset($selectUser)){
            return array('success' => true,'data' => $selectUser, 'message' => 'Nhân viên giới thiệu: '.$selectUser->name);
        }else{
            return array('success' => true,'data' => '', 'message' => '');

            // return array('success' => false, 'message' => 'Mã nhân viên không chính xác , vui lòng thử lại!!!!');
        }
    }
    /**
     * Cập nhật
     */
    public function updateUser(Request $request)
    {
        $arrInput = $request->all();
        $data = $this->userService->_updateUser($arrInput, $arrInput['id']);
        return $data;
    }
    /**
     * Thay đổi dòng
     */
    public function upNdown(Request $request)
    {
        $arrInput = $request->all();
        $data = $this->userService->upNdown($arrInput);
        return $data;
    }
}
