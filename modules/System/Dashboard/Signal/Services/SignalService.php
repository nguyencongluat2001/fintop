<?php

namespace Modules\System\Dashboard\Signal\Services;

use Modules\Base\Service;
use Modules\Client\Page\Notification\Models\NotificationModel;
use Modules\Client\Page\Notification\Models\ReadNotificationModel;
use Modules\System\Dashboard\Signal\Models\SignalModel;
use Modules\System\Dashboard\Signal\Repositories\SignalRepository;
use Modules\System\Notifications\SendNotification;
use Pusher\Pusher;

class SignalService extends Service
{
    public function __construct(

    ){
        parent::__construct();
    }
    public function repository()
    {
        return SignalRepository::class;
    }
    /**
     * Cập nhật tín hiệu mua
     */
    public function store($input)
    {
        $id = (string)\Str::uuid();
        $signals = $this->repository->select('*')->get();
        $params = [
            "user_id" => $_SESSION['id'],
            "title" => isset($input['title']) ? $input['title'] : '',
            "code" => isset($input['code']) ? $input['code'] : '',
            "type" => isset($input['type']) ? $input['type'] : '',
            "target" => isset($input['target']) ? $input['target'] : '',
            "stop_loss" => isset($input['stop_loss']) ? $input['stop_loss'] : '',
            "price_buy" => isset($input['price_buy']) ? $input['price_buy'] : '',
            // "order" => isset($input['order']) ? $input['order'] : count($signals) + 1,
            "status" => isset($input['status']) ? 1 : 0,
        ];
        if(isset($input['_id']) && !empty($input['_id'])){
            $params['updated_at'] = date('Y-m-d H:i:s');
            $this->repository->where('id',$input['_id'])->update($params);
            $signalsNoti = $this->repository->where('id', $input['_id'])->first();
        }else{
            $params['id'] = $id;
            $params['created_at'] = date('Y-m-d H:i:s');
            $this->repository->insert($params);
            $signalsNoti = $this->repository->where('id', $id)->first();
        }
        $signalsNoti->notify(new SendNotification($params));
        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY', 'b53fd6585787820b39e9'),
            env('PUSHER_APP_SECRET', 'ee4268678cfb8ecbee92'),
            env('PUSHER_APP_ID', '1811180'),
            $options
        );
        if(isset($_SESSION['id'])){
            $idRead = ReadNotificationModel::select('notification_id')->where('user_id', $_SESSION['id'])->get()->toArray();
            $notification = NotificationModel::select('*')->whereNotIn('id', $idRead)->get();
            $params['count'] = count($notification);
            $pusher->trigger('NotificationEvent', 'send-message', $params);
        }
        if(isset($input['_id']) && !empty($input['_id'])){
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
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
        $signalSingle = $this->repository->where('id', $id)->first();
        $signals = $this->repository->select('*')->get();
        $title = !empty($signalSingle) ? $signalSingle->title : '';
        $code = !empty($signalSingle) ? $signalSingle->code : '';
        $type = !empty($signalSingle) ? $signalSingle->type : '';
        $target = !empty($signalSingle) ? $signalSingle->target : '';
        $stop_loss = !empty($signalSingle) ? $signalSingle->stop_loss : '';
        $price_buy = !empty($signalSingle) ? $signalSingle->price_buy : '';
        $status = isset($signalSingle->status) && $signalSingle->status !== null ? $signalSingle->status : 1;
        $order = isset($signalSingle) && !empty($signalSingle->order) ? $signalSingle->order : count($signals) + 1;
        $param = [
            'user_id' => $_SESSION['id'],
            'title' => isset($input['title']) ? $input['title'] : $title,
            'code' => isset($input['code']) ? $input['code'] : $code,
            'type' => isset($input['type']) ? $input['type'] : $type,
            'target' => isset($input['target']) ? $input['target'] : $target,
            'stop_loss' => isset($input['stop_loss']) ? $input['stop_loss'] : $stop_loss,
            'price_buy' => isset($input['price_buy']) ? $input['price_buy'] : $price_buy,
            'order' => isset($input['order']) ? $input['order'] : $order,
            'status' => isset($input['status']) ? 1 : $status,
        ];
        foreach($signals as $value){
            if(isset($input['code_category']) && $input['code_category'] === $value->code_category){
                return array('success' => false, 'message' => 'Mã đối tượng đã tồn tại!');
            }
        }
        if(isset($signalSingle) && !empty($signalSingle)){
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