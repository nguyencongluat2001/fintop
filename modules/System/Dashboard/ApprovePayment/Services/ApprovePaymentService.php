<?php

namespace Modules\System\Dashboard\ApprovePayment\Services;

use Modules\Base\Service;
use Modules\System\Dashboard\ApprovePayment\Repositories\ApprovePaymentRepository;

class ApprovePaymentService extends Service
{
    public function __construct(

    ){
        parent::__construct();
    }
    public function repository()
    {
        return ApprovePaymentRepository::class;
    }
    /**
     *nâng cấp tài khoản
     */
    public function store($input)
    {
        $approvePayments = $this->repository->select('*')->get();
        $params = [
            "user_id" => isset($input['user_id']) ? $input['user_id'] : '',
            "user_id_introduce" => isset($input['user_id_introduce']) ? $input['user_id_introduce'] : '',
            "role_client" => isset($input['role_client']) ? $input['role_client'] : '',
            "order" => isset($input['order']) ? $input['order'] : count($approvePayments) + 1,
            "status" => isset($input['status']) ? 1 : 0,
        ];
        if(isset($input['_id']) && !empty($input['_id'])){
            $params['updated_at'] = date('Y-m-d H:i:s');
            $this->repository->where('id',$input['_id'])->update($params);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
            $params['id'] = (string)\Str::uuid();
            $params['created_at'] = date('Y-m-d H:i:s');
            $this->repository->insert($params);
            return array('success' => true, 'message' => 'Thêm mới thành công!');
        }
    }
    /**
     * Cập nhật và thêm mới màn hình danh sách
     */
    public function _updateSignal($input, $id)
    {
        if(isset($input['order']) && !empty($input['order'])){
            $this->updateOrder($input);
        }
        $approvePaymentSingle = $this->repository->where('id', $id)->first();
        $approvePayments = $this->repository->select('*')->get();
        $title = !empty($approvePaymentSingle) ? $approvePaymentSingle->title : '';
        $type = !empty($approvePaymentSingle) ? $approvePaymentSingle->type : '';
        $target = !empty($approvePaymentSingle) ? $approvePaymentSingle->target : '';
        $stop_loss = !empty($approvePaymentSingle) ? $approvePaymentSingle->stop_loss : '';
        $status = isset($approvePaymentSingle->status) && $approvePaymentSingle->status !== null ? $approvePaymentSingle->status : 1;
        $order = isset($approvePaymentSingle) && !empty($approvePaymentSingle->order) ? $approvePaymentSingle->order : count($approvePayments) + 1;
        $param = [
            'user_id' => $_SESSION['id'],
            'title' => isset($input['title']) ? $input['title'] : $title,
            'type' => isset($input['type']) ? $input['type'] : $type,
            'target' => isset($input['target']) ? $input['target'] : $target,
            'stop_loss' => isset($input['stop_loss']) ? $input['stop_loss'] : $stop_loss,
            'order' => isset($input['order']) ? $input['order'] : $order,
            'status' => isset($input['status']) ? 1 : $status,
        ];
        foreach($approvePayments as $value){
            if(isset($input['code_category']) && $input['code_category'] === $value->code_category){
                return array('success' => false, 'message' => 'Mã đối tượng đã tồn tại!');
            }
        }
        if(isset($approvePaymentSingle) && !empty($approvePaymentSingle)){
            $this->repository->where('id',$id)->update($param);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
            $param['id'] = $id;
            // $param['status'] = 1;
            $this->repository->insert($param);
            return array('success' => true, 'message' => 'Thêm mới thành công!');
        }
    }/**
     * Cập nhật thứ tự
     */
    public function updateOrder($input)
    {
        $query = $this->repository->select('*')->where('order', '>=', $input['order'])->orderBy('order');
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
}