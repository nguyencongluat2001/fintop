<?php

namespace Modules\Client\Page\infor\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;
use Modules\System\Dashboard\Users\Services\UserInfoService;
use Modules\System\Dashboard\Users\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Modules\System\Dashboard\ApprovePayment\Services\ApprovePaymentService;

/**
 * thông tinnguowif dùng
 *
 * @author Luatnc
 */
class InforController extends Controller
{

    public function __construct(
        UserService $userService,
        UserInfoService $userInfoService,
        ApprovePaymentService $ApprovePaymentService
    ){
        $this->userService = $userService;
        $this->userInfoService = $userInfoService;
        $this->ApprovePaymentService = $ApprovePaymentService;
        $this->baseDis = public_path("file-image/avatar") . "/";
    }

    /**
     * khởi tạo dữ liệu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        $users = $this->userService->where('id', $_SESSION['id'])->first();
        $user_infor = $this->userInfoService->where('user_id', $_SESSION['id'])->first();
        $users['user_infor'] = $user_infor;
        $data['datas'] = $users;
        $data['vip'] = $this->ApprovePaymentService->select()->where('user_id', $_SESSION['id'])->get()->unique('role_client');
        $data['data']['user_introduce_name'] = '';
        if(!empty($data['datas']->id_manage)){
            $tt = $this->userService->where('id_personnel', $data['datas']->id_manage)->first();
            if(!empty($tt->name)){
                $data['data']['user_introduce_name'] = $tt->name;
            }
        }
        // dd($data);
        return view('client.infor.index', $data);
    }

     /**
     * load màn hình thông tin người dùng
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadList(Request $request)
    { 
        $users = $this->userService->where('id', $_SESSION['id'])->first();
        $user_infor = $this->userInfoService->where('user_id', $_SESSION['id'])->first();
        $users['user_infor'] = $user_infor;
        $data['datas'] = $users;
        return view('client.infor.index', $data);
    }
    
     /**
     * Cập nhật thông tin
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function update(Request $request)
    {
        $arrInput = $request->input();
        $data = $this->userInfoService->_update($arrInput);
        return back();
    }
    /**
     * Cập nhật client
     */
    public function updateCustomer(Request $request)
    {
        $arrInput = $request->all();
        $data = $this->userService->store($arrInput, []);
        return $data;
    }
    /**
     * Cập nhật ảnh đại diện
     */
    public function uploadAvatar(Request $request)
    {
        $arrInput = $request->all();
        $path = $this->baseDis;
        $users = $this->userService->where('id', $arrInput['id'])->first();
        if(isset($users->avatar) && file_exists($path . $users->avatar)){
            unlink($path . $users->avatar);
        }
        $result = [];
        if($_FILES != [] && isset($_FILES['upload'])){
            $fileName = $_FILES['upload']['name'];
            $random = Library::_get_randon_number();
            $fileName = Library::_replaceBadChar($fileName);
            $fileName = Library::_convertVNtoEN($fileName);
            $sFullFileName = date("Y") . '_' . date("m") . '_' . date("d") . "_" . date("H") . date("i") . date("u") . $random . "!~!" . $fileName;
            move_uploaded_file($_FILES['upload']['tmp_name'], $path . $sFullFileName);
            $this->userService->where('id', $arrInput['id'])->update(['avatar' => $sFullFileName]);
            $result = [
                'url' => url('file-image/avatar') . '/' . $sFullFileName,
            ];
        }
        if($result != []){
            return array('success' => true, 'message' => 'Cập nhật thành công.', 'data' => $result);
        }else{
            return array('success' => false, 'message' => 'Cập nhật thất bại!');
        }
    }
      // 
    /**
     * Hiển thị màn liên hệ
     *
     * @return view
     */
    public function viewFormContact(Request $request)
    {
        return view('client.infor.viewFormContact');
    } 
}
