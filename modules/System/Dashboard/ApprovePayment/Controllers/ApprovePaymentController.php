<?php

namespace Modules\System\Dashboard\ApprovePayment\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\ApprovePayment\Services\ApprovePaymentService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Users\Services\UserService;

class ApprovePaymentController extends Controller
{
    public function __construct(
        ApprovePaymentService $approvePaymentService,
        CategoryService $categoryService,
        UserService $userService
    ){
        $this->approvePaymentService = $approvePaymentService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
    }
    /**
     * Trang đích
     */
    public function index(Request $request)
    {
        return view('dashboard.approvePayment.index');
    }
    /**
     * Danh sách
     */
    public function loadList(Request $request)
    {
        $input = $request->input();
        $data = array();
        $input['sort'] = 'order';
        // $input['sortType'] = 1;
        $objResult = $this->approvePaymentService->filter($input);
        foreach($objResult as $key => $value){
            $users = $this->userService->where('id', $value->user_id)->first();
            $objResult[$key]->user_name = isset($users->name) ? $users->name : '';
            $role_name = 'Người dùng'; 
            if($value->role_client == 'VIP1'){
                $role_name = 'Vip 1';
            }else if($value->role_client == 'VIP2'){
                $role_name = 'Vip 2';
            }
            $objResult[$key]->role = $role_name;

            if($value->status == '0'){
                $status_name = 'Chờ phê duyệt';
            }else if($value->status == '1'){
                $status_name = 'Đã phê duyệt';
            }
            $objResult[$key]->status_name = $status_name;
            $objResult[$key]->phone = $users->phone;
            $objResult[$key]->address = $users->address;
            $objResult[$key]->email = $users->email;
            $dataJson = json_decode($value['package']);
            $vat = 0;
            $money_vat = 0;
            if(!empty($dataJson->money) && $dataJson->money > 0){
                $vat = $dataJson->money/10; 
                $money_vat = $dataJson->money+$vat;
            }
            $objResult[$key]->money_vat = $money_vat;
        }
        $data['datas'] = $objResult;
        return view('dashboard.approvePayment.loadList', $data)->render();
    }
    /**
     * Form thêm
     */
    public function create(Request $request)
    {
        $data['roles'] = $this->categoryService->where('cate', 'DM_VIP')->orderBy('order')->get();
        $data['order'] = $this->approvePaymentService->select('id')->count() + 1;
        return view('dashboard.approvePayment.add', $data);
    }
    /**
     * Form sửa
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        $approvePayment = $this->approvePaymentService->where('id', $input['id'])->first();
        $input['chk_item_id'] = $approvePayment['user_id'];
        $data['data'] = $this->userService->editUser($input);
        $data['approvePayment'] = $approvePayment['image'];
        $data['type_payment'] = $approvePayment['type_payment'];
        return view('dashboard.approvePayment.add', $data);
    }
    /**
     * Thêm hoặc Cập nhật
     */
    public function update(Request $request)
    {
        $input = $request->input();
        $create = $this->approvePaymentService->store($input); 
        return $create;
    }
    /**
     * Xoá
     */
    public function delete(Request $request)
    {
        $input = $request->input();
        $arrId = explode(',', $input['listitem']);
        foreach($arrId as $id){
            $this->approvePaymentService->where('id', $id)->delete();
        }
        return array('success' => true, 'message' => 'Xóa thành công!');
    }
    /**
     * Cập nhật thông tin màn hình index
     */
    public function updateApprovePayment(Request $request)
    {
        $input = $request->all();
        $data = $this->approvePaymentService->_updateApprovePayment($input, $input['id']);
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatusApprovePayment(Request $request)
    {
        $input = $request->all();
        $list = $this->approvePaymentService->where('id', $input['id']);
        if(!empty($list->first())){ 
            $data = $list->first();
            if($input['status'] == 1){
                $arrUser = [
                    'account_type_vip'=> $data['role_client'],
                    'date_update_vip'=> date("Y/m/d H:i:s")
                ];
            }else{
                $arrUser = [
                    'account_type_vip'=> null,
                    'date_update_vip'=> null
                ];
            }
            $checkUser = $this->userService->where('id',$data['user_id'])->first();
            if(isset($checkUser)){
                $this->userService->where('id',$data['user_id'])->update($arrUser);
            }else{
                return array('success' => false, 'message' => 'Không tồn tại đối tượng!');
            }
            $list->update(['status' => $input['status']]);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
            return array('success' => false, 'message' => 'Không tìm thấy dữ liệu!');
        }
    }
    /**
     * Lấy thông tin người dùng theo loại VIP
     */
    public function getUserVIP(Request $request)
    {
        $input = $request->all();
        $html = '';
        if(isset($input['role_client'])){
            $users = $this->userService->where('role', $input['role_client'])->where('status', 1)->get();
            $html .= '<option>--Chọn khách hàng--</option>';
            foreach($users as $user){
                $html .= '<option value="'.$user->id.'">'.$user->name.'</option>';
            }
        }
        return $html;
    }
}