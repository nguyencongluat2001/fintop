<?php

namespace Modules\System\Dashboard\Users\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Modules\Base\Service;
use Modules\Base\Library;
use Modules\System\Dashboard\Users\Models\AuthenticationOTPModel;
use Modules\System\Dashboard\Users\Repositories\UserRepository;
use Modules\System\Dashboard\Users\Services\UserInfoService;
use Twilio\Rest\Client;
use Modules\Base\Helpers\ForgetPassWordMailHelper;
use Modules\System\Dashboard\Users\Models\UserModel;
use Str;

class UserService extends Service
{
    private $baseDis;
    public function __construct(
        UserInfoService $UserInfoService,
        UserRepository $UserRepository
        )
    {
        parent::__construct();
        $this->UserInfoService = $UserInfoService;
        $this->UserRepository = $UserRepository;
        $this->baseDis = public_path("file-image/avatar") . "/";
    }

    public function repository()
    {
        return UserRepository::class;
    }
     /**
     * cập nhật người dùng
     */
    public function store($input,$file){
        $password = 'fintop123';
        //check quyền chỉnh sửa
        // if(isset($input['role']) && $_SESSION['role'] != 'ADMIN' && $_SESSION['role'] != 'MANAGE' && $_SESSION['role'] != 'CV_ADMIN'){
        //     if($input['role'] == 'ADMIN' || $input['role'] == 'MANAGE' || $input['role'] == 'CV_ADMIN'){
        //         return array('success' => false, 'message' => 'Rất tiếc! bạn ko có quyền. Vui lòng liên hệ hỗ trợ FinTop.');
        //     }
        // }
        try{
            $countUser = $this->repository->select('id')->count();
            $image_old = null;
            if($input['id'] != ''){
                $user = $this->UserRepository->where('id',$input['id'])->first();
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
                $updateUser = $this->UserRepository->where('id',$input['id'])->update($arrData);
                $userInfo = $this->UserInfoService->where('user_id',$input['id'])->first();
                if(!empty($userInfo)){
                    $updateUserInfo = $this->UserInfoService->where('user_id',$input['id'])->update($arrInfo);
                }else{
                    $getUser = $this->UserRepository->where('email',$input['email'])->first();
                    $arrInfo['id']=(string)Str::uuid();
                    $arrInfo['user_id'] = $getUser->id;
                    $create = $this->UserInfoService->create($arrInfo);
                }
                return array('success' => true, 'message' => 'Cập nhật thành công');
            }else{
                $arrData['password'] = Hash::make($password);
                $createUser = $this->UserRepository->create($arrData);
                $getUser = $this->UserRepository->where('email',$input['email'])->first();
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
     * Tải file vào thư mục
     */
    public function uploadFile($input,$file,$image_old)
    {
            $path = $this->baseDis;
            $old_path = $path.$image_old;
            if (file_exists($old_path)) {
                @unlink($old_path);
            }
            $fileName = $_FILES['file-attack-0']['name'];
            $random = Library::_get_randon_number();
            $fileName = Library::_replaceBadChar($fileName);
            $fileName = Library::_convertVNtoEN($fileName);
            $sFullFileName = date("Y") . '_' . date("m") . '_' . date("d") . "_" . date("H") . date("i") . date("u") . $random . "!~!" . $fileName;
            move_uploaded_file($_FILES['file-attack-0']['tmp_name'], $path . $sFullFileName);
        return $sFullFileName;
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
        $getUserInfor = $this->repository->where('id',$arrInput['id'])->first()->toArray();
        $userInfo = $this->UserInfoService->where('user_id',$arrInput['id'])->first();
        $getUserInfor['company'] = !empty($userInfo->company)?$userInfo->company:null;
        $getUserInfor['position'] = !empty($userInfo->position)?$userInfo->position:null;
        $getUserInfor['date_join'] = !empty($userInfo->date_join)?$userInfo->date_join:null;
        $getUserInfor['arrQuyen'] = explode(',',$getUserInfor['role']);
        return $getUserInfor;
    }

    public function sent_OTP($input)
    {
        $selectOtp = AuthenticationOTPModel::where('phone',$input['phone'])->first();
        $zenData = [
            'phone'=> $input['phone'],
            'otp'=> 'FT'.rand(10,100).rand(10,100).rand(10,100),
            'created_at'=> date("Y/m/d H:i:s"),
            'updated_at'=> date("Y/m/d H:i:s"),
        ];
        if(isset($selectOtp)){
            $create = AuthenticationOTPModel::where('phone',$input['phone'])->update($zenData);
        }else{
            $zenData['id'] = (string)\Str::uuid();
            $create = AuthenticationOTPModel::create($zenData);
        }
        $otp_sms = $zenData['otp'];
        $phone = $zenData['phone'];
        // $sendOtp = $this->sendOtp($phone,$otp_sms);
        //gui mail
        $sendOtp = $this->sendMail_register($input,$zenData['otp']);
        if($sendOtp){
            return array('success' => true, 'message' => 'Mã xác thực của bạn đã được gửi qua số điện thoại: '.$input['phone'].'. Vui lòng kiểm tra tin nhắn!');
        }else{
            return array('success' => false, 'message' => 'Lỗi xảy ra - liên hệ đội ngũ hỗ trợ qua hotline: 0386358006');
        }
    }
    /**
    * Cập nhật trạng thái
    */
   public function sendOtp($phone,$otp_sms)
   {
       try{
           $param = [
               'phoneNumber'=> $phone,
               'message'=> 'FinTop - OTP của bạn là: '.$otp_sms,
           ];
        //    $dataConfig = config('apiConnect.financial');
        //    $urlApi = $dataConfig['api'].$dataConfig['apiChild']['send-sms'];
        //    $response = Http::withHeaders(['Authorization' => 'Bearer key0000'])->withToken($dataConfig['token'])
        //                    ->withBody(json_encode($param),'application/json')
        //                    ->post($urlApi);
        //    $response = $response->getBody()->getContents();
        //    $response = json_decode($response,true);

        //    $data['datas'] = $response;
        //    if($data['datas'] == null || $data['datas'] == ''){
        //        return false;
        //        // $data['datas']['message'] = [
        //        //     "message" => 'Lỗi xảy ra - liên hệ đội ngũ hỗ trợ qua hotline: 0386358006'
        //        // ];
        //    }
            $account_sid = config('twilioAccount.account.account_sid');
            $auth_token = config('twilioAccount.account.auth_token');
            $twilio_number = config('twilioAccount.account.twilio_number');
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($phone, [
                'from' => $twilio_number, 
                'body' => $param['message']]);
            $data['datas']['message'] = [
                "message" => 'Chúng tôi đã gửi mã OTP qua số điện thoại của bạn!'
            ];
           return $data;
       }catch (\Exception $e) {
            $data['datas']['message'] = [
                "message" => 'Lỗi xảy ra - liên hệ đội ngũ hỗ trợ qua hotline: 0386358006'
            ];
           return $data;
       }
   }
    /**
     * Gửi mail đến người dùng
     * 
     * @param Array $input
     */
    public function sendMail_register($input,$codeOtp)
    {
        // $stringHtml = file_get_contents(base_path() . '\storage\templates\registerOtp\tem.html');
        $stringHtml = '';
        // Lấy dữ liệu
        $data['date'] = 'Ngày ' . date('d') . ' tháng ' . date('m') . ' năm ' . date('Y');
        $data['mailto'] = $input['email'];
        $data['subject'] = 'Trung tâm NC&PT Dữ liệu chứng khoán FinTop DATA';
        $data['otp'] = $codeOtp;
        // Gửi mail
        (new ForgetPassWordMailHelper($data['mailto'], $data['mailto'], $stringHtml, $data))->send_otp($data);
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
}
