<?php

namespace Modules\System\Dashboard\Client\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Modules\Base\Service;
use Modules\Base\Library;
use Modules\System\Dashboard\Client\Models\AuthenticationOTPModel;
use Modules\System\Dashboard\Client\Repositories\ClientRepository;
use Twilio\Rest\Client;
use Modules\Base\Helpers\ForgetPassWordMailHelper;
use Modules\System\Dashboard\Client\Models\UserModel;
use Modules\System\Dashboard\Users\Services\UserInfoService;
use Str;

class ClientService extends Service
{
    private $baseDis;
    public function __construct(
        UserInfoService $UserInfoService,
        ClientRepository $ClientRepository
        )
    {
        parent::__construct();
        $this->UserInfoService = $UserInfoService;
        $this->ClientRepository = $ClientRepository;
        $this->baseDis = public_path("file-image/avatar") . "/";
    }

    public function repository()
    {
        return ClientRepository::class;
    }
    public function loadList($arrInput){
        $data = array();
        $param = $arrInput;
        $objResult = $this->repository->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return $create;
    }
    public function editUser($arrInput){
        $getUserInfor = $this->repository->where('id',$arrInput['chk_item_id'])->first()->toArray();
        // $userInfo = $this->UserInfoService->where('user_id',$arrInput['chk_item_id'])->first();
        $getUserInfor['arrQuyen'] = explode(',',$getUserInfor['role']);
        return $getUserInfor;
    }

    
    /**
     * Cập nhật và thêm mới màn index
     */
    public function _updateUser($input, $id)
    {
        if(isset($input['order'])){
            $this->updateOrder($input);
        }
        $dataUser = $this->repository->where('id', $id)->first();
        $countUser = $this->repository->select('*')->get();
        
        // $code_cp = isset($dataUser->code_cp) ? $dataUser->code_cp : '';
        $order = isset($dataUser) && !empty($dataUser->order) ? $dataUser->order : count($countUser) + 1;
        $param = [
            // 'code_cp' => isset($input['code_cp']) ? $input['code_cp'] : $code_cp,
            'order' => isset($input['order']) ? $input['order'] : $order,
        ];
        if(isset($dataUser) && !empty($dataUser)){
            $param['updated_at'] = date('Y-m-d H:i:s');
            $this->repository->where('id',$id)->update($param);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }
    }
    /**
     * Cập nhật thứ tự
     */
    public function updateOrder($input)
    {
        $query = UserModel::select('*')->where('order', '>=', $input['order'])->orderBy('order');
        if(isset($input['id'])){
            $query = $query->where('id', '<>', $input['id']);
        }
        $order = $query->get();
        if(!empty($order)){
            $i = $input['order'];
            foreach($order as $value){
                $i++;
                $this->repository->where('id', $value->id)->update(['order' => $i]);
            }

        }
    }
    /**
     * Thay đổi dòng
     */
    public function upNdown($input)
    {
        $user = $this->repository->where('id', $input['id'])->first();
        try{
            if($input['type'] == 'down' && (int)$user->order > 1){
                $downOrder = UserModel::where('order', '>=', ((int)$user->order + 1))->orderBy('order')->first();
                $order = (int)$user->order + 1;
                $user->order = (int)$user->order + 1;
                $user->save();
                if(!empty($downOrder)){
                    if(($order - $downOrder->order) == 1){
                        $downOrder->order = (int)$downOrder->order - 1;
                    }else{
                        $downOrder->order = (int)$user->order - 1;
                    }
                    $downOrder->save();
                    return array('success' => true, $user->id => $user->order, $downOrder->id => $downOrder->order);
                }
            }elseif($input['type'] == 'up'){
                $downOrder = UserModel::where('order', '<=', ((int)$user->order - 1))->orderBy('order', 'desc')->first();
                $order = (int)$user->order;
                $user->order = (int)$user->order - 1;
                $user->save();
                if(!empty($downOrder)){
                    if(($order - $downOrder->order) == 1){
                        $downOrder->order = (int)$downOrder->order + 1;
                    }else{
                        $downOrder->order = (int)$user->order + 1;
                    }
                    $downOrder->save();
                    return array('success' => true, $downOrder->id => $downOrder->order, $user->id => $user->order);
                }
            }
        }catch(\Exception $e){
            return array('success' => true, 'message', $e->getMessage());
        }
    }
    /**
     * cập nhật người dùng
     */
    public function store($input){
        $password = 'fintop123';
        //check quyền chỉnh sửa
        // if($input['id_personnel'] == ''){
        //     return array('success' => false, 'message' => 'Mã cộng tác viên không được để trống!');
        // }
        // $check = $this->ClientRepository->where('id_personnel',$input['id_personnel'])->where('id','!=',$input['id'])->first();

        // if(!empty($check)){
        //     return array('success' => false, 'message' => 'Mã cộng tác viên đã tồn tại!');
        // }
        try{
            $countUser = $this->repository->select('id')->count();
            $image_old = null;
            if($input['id'] != ''){
                $user = $this->ClientRepository->where('id',$input['id'])->first();
                $image_old = $user->avatar;
            }
            if(isset($file) && $file != []){
                $arrFile = $this->uploadFile($input,$file,$image_old);
            }

            // array data users
            $arrData = [
                'name'=> $input['name'],
                'address'=> $input['address'],
                'phone'=> $input['phone'],
                'email'=> $input['email'],
                'dateBirth'=> $input['dateBirth'],
                'role'=>  $input['role'],
                'order'=> isset($input['order']) ? $input['order'] : (int)$countUser + 1,
                'account_tkck_vps'=> isset($input['account_tkck_vps'])?$input['account_tkck_vps']:'',
                'investment_time'=> isset($input['investment_time'])?$input['investment_time']:'',
                'investment_taste'=> isset($input['investment_taste'])?$input['investment_taste']:'',
                'investment_company'=> isset($input['investment_company'])?$input['investment_company']:'',
                'id_manage'=> isset($input['id_manage'])?$input['id_manage']:'F889',
                'user_introduce'=> isset($input['user_introduce'])?$input['user_introduce']:'F889',
                "status" => isset($input['status']) ? 1 : 1,
            ];
            if(!empty($input['id_personnel'])){
                $arrData['id_personnel'] = $input['id_personnel'];
            }
             // nếu có ảnh mới thì cập nhật
             if(!empty($arrFile)){
                $arrData['avatar'] = $arrFile;
            }
            // array user info
            $arrInfo = [
                'company'=> $input['company'], 
                'position'=> $input['position'], 
                'date_join'=> $input['date_join'], 
                'color_view'=> 1,
                'created_at'=> date("Y/m/d")
            ];
            if(isset($input['order'])){
                $this->updateOrder($input);
            }
            if($input['id'] != ''){
                $updateUser = $this->ClientRepository->where('id',$input['id'])->update($arrData);
                $userInfo = $this->UserInfoService->where('user_id',$input['id'])->first();
                if(!empty($userInfo)){
                    $updateUserInfo = $this->UserInfoService->where('user_id',$input['id'])->update($arrInfo);
                }else{
                    $getUser = $this->ClientRepository->where('email',$input['email'])->first();
                    $arrInfo['id']=(string)Str::uuid();
                    $arrInfo['user_id'] = $getUser->id;
                    $create = $this->UserInfoService->create($arrInfo);
                }
                return array('success' => true, 'message' => 'Cập nhật thành công');
            }else{
                $arrData['password'] = Hash::make($password);
                $createUser = $this->ClientRepository->create($arrData);
                $getUser = $this->ClientRepository->where('email',$input['email'])->first();
                $arrInfo['id']=(string)Str::uuid();
                $arrInfo['user_id'] = $getUser->id;
                $create = $this->UserInfoService->create($arrInfo);
                return array('success' => true, 'message' => 'Thêm mới thành công');
            }
            return true;
        } catch (\Exception $e) {
            return array('success' => false, 'message' => (string) $e->getMessage());
        }
    }
     /**
     * cập nhật người dùng
     */
    public function store_upgrade_ctv_sale($input){
        //check quyền chỉnh sửa
        try{
            // array data users
            $arrData = [
                'id_personnel'=> isset($input['id_personnel'])?$input['id_personnel']:'',
                'id_manage'=> isset($input['id_manage'])?$input['id_manage']:'',
                'role'=> 'SALE_BASIC'

            ];
            if($input['id'] != ''){
                $updateUser = $this->ClientRepository->where('id',$input['id'])->update($arrData);
                return array('success' => true, 'message' => 'Nâng cấp cộng tác viên thành công');
            }
            
            return true;
        } catch (\Exception $e) {
            return array('success' => false, 'message' => (string) $e->getMessage());
        }
    }
     /**
     * cập nhật người dùng
     */
    public function store_upgradeAcc($input){
        //check quyền chỉnh sửa
        try{
            // array data users
            $arrData = [
                'account_type_vip'=> isset($input['account_type_vip'])?$input['account_type_vip']:'',
            ];
            if($input['id'] != ''){
                $updateUser = $this->ClientRepository->where('id',$input['id'])->update($arrData);
                return array('success' => true, 'message' => 'Nâng cấp thành công');
            }
            
            return true;
        } catch (\Exception $e) {
            return array('success' => false, 'message' => (string) $e->getMessage());
        }
    }
}
