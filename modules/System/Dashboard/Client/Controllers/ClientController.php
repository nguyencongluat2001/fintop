<?php

namespace Modules\System\Dashboard\Client\Controllers;

use App\Http\Controllers\Controller;
use Modules\System\Dashboard\Client\Services\ClientService;
use Modules\System\Helpers\PaginationHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Modules\Base\Helpers\ForgetPassWordMailHelper;
use Modules\System\Dashboard\Category\Services\CategoryService;

/**
 *
 * @author Luatnc
 */
class ClientController extends Controller
{
    public function __construct(
        ClientService $ClientService,
        CategoryService $CategoryService
    ){
        $this->ClientService  = $ClientService;
        $this->CategoryService  = $CategoryService;
    }

    /**
     * màn hình danh sách người dùng
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('dashboard.client.index');
    }
    /**
     * user_info
     *
     * @return view
     */
    public function indexUserInfo(Request $request)
    {
        $data = $this->ClientService->where('id',$_SESSION["id"])->first();
        $userInfo = $this->userInfoService->where('user_id',$_SESSION['id'])->first();
        $data['company'] = !empty($userInfo->company)?$userInfo->company:null;
        $data['position'] = !empty($userInfo->position)?$userInfo->position:null;
        $data['date_join'] = !empty($userInfo->date_join)?$userInfo->date_join:null;
        return view('dashboard.client.index',compact('data'));
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
        $data = $this->ClientService->addUserDisplay($input);
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
            $data['arr_quanly'] = $this->ClientService->where('role','ADMIN')->orWhere('role','MANAGE')->orWhere('role','CV_ADMIN')->orWhere('role','SALE_ADMIN')->orWhere('role','LIKE','%SALE_ADMIN%')->orWhere('role','LIKE','%CV_ADMIN%')->orderBy('order','asc')->get()->toArray();
        }else{
            $data['arr_quanly'] = $this->ClientService->where('id_personnel',$_SESSION['id_personnel'])->get();
        }
        return view('dashboard.client.edit',compact('data'));
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
        $create = $this->ClientService->store($input); 
        return $create;
    }
    /**
     * Thêm thông tin người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function create_upgradeAcc (Request $request)
    {
        $input = $request->input();
        $create = $this->ClientService->store_upgradeAcc($input); 
        return $create;
    }
        /**
     * nâng cấp use lên ctv
     *
     * @param Request $request
     *
     * @return view
     */
    public function store_upgrade_ctv_sale (Request $request)
    {
        $input = $request->input();
        $create = $this->ClientService->store_upgrade_ctv_sale($input); 
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
        $data = $this->ClientService->editUser($input);
        $data['cate_quyen'] = $this->CategoryService->where('cate','DM_QUYEN')->where('code_category','SALE_BASIC')->orderBy('order','asc')->get();
        if($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'MANAGE'){
            $data['arr_quanly'] = $this->ClientService->where('role','ADMIN')->orWhere('role','MANAGE')->orWhere('role','CV_ADMIN')->orWhere('role','SALE_ADMIN')->orWhere('role','LIKE','%SALE_ADMIN%')->orWhere('role','LIKE','%CV_ADMIN%')->orderBy('order','asc')->get()->toArray();
        }else{
            $data['arr_quanly'] = $this->ClientService->where('id_personnel',$_SESSION['id_personnel'])->get();
        }
        return view('dashboard.client.edit',compact('data'));
    }
    /**
     * Load màn hình chỉnh sửa thông tin người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function edit_upgradeAcc(Request $request)
    {
        $input = $request->all();
        $data = $this->ClientService->editUser($input);
        $data['type_vip'] = [
            [
                'code'=> '',
                'name' => 'Tiêu chuẩn'
            ],
            [
                'code'=> 'VIP1',
                'name' => 'Bạc'
            ],
            [
                'code'=> 'VIP2',
                'name' => 'Vàng'
            ],
            [
                'code'=> 'KIM_CUONG',
                'name' => 'Kim cương'
            ]
        ];
        // dd($data);
        return view('dashboard.client.upgradeAcc',compact('data'));
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
                $this->ClientService->where('id',$id)->delete();
            }
        }
        return array('success' => true, 'message' => 'Xóa thành công');
    }
     /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadList(Request $request)
    { 
        $paginationHelper = new PaginationHelper();
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $param['sort'] = 'order';
        $param['sortType'] = 1;
        $param['role'] = ['USERS'];
        // dd($_SESSION['role']);
        if($_SESSION['role'] == 'CV_ADMIN' || $_SESSION['role'] == 'CV_ADMIN,SALE_ADMIN' || $_SESSION['role'] == 'CV_ADMIN,SALE_BASIC' 
        || $_SESSION['role'] == 'SALE_ADMIN' || $_SESSION['role'] == 'SALE_ADMIN,SALE'){
            $getUser_child_goc = [$_SESSION['id_personnel']];
            $getUser_child = $this->ClientService->where('id_manage',$_SESSION['id_personnel'])->where('role','!=','USERS')->pluck('id_personnel')->toArray();
            $id_manage = array_merge($getUser_child_goc,$getUser_child);
            $param['id_manage'] = $id_manage;
        }
        $objResult = $this->ClientService->filter($param);

        $data['datas'] = $objResult;
        return view("dashboard.client.loadlist", $data);
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
        $users = $this->ClientService->where('id',$input['id'])->first();
        $data['email_acc'] = $users['email'];
        return view('dashboard.users.userInfor.edit',compact('data'));
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatus(Request $request)
    {
        $input = $request->all();
        $users = $this->ClientService->where('id', $input['id'])->first();
        if(!empty($users)){
            $users->update(['status' => $input['status']]);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
            return array('success' => false, 'message' => 'Không tìm thấy dữ liệu!');
        }
    }
}
