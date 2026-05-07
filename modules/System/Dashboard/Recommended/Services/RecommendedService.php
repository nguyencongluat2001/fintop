<?php

namespace Modules\System\Dashboard\Recommended\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\Recommended\Repositories\RecommendedRepository;
use Str;

class RecommendedService extends Service
{

    public function __construct(
    ){
        parent::__construct();
    }

    public function repository()
    {
        return RecommendedRepository::class;
    }

    public function store($input){
        $price_range = '';
        foreach($input as $key => $value){
            if(strpos($key, 'price_range') !== false){
                $price_range .= ',' . $value;
            }
        }
        $arrData = [
            'code_cp' => isset($input['code_cp']) ? $input['code_cp'] : '',
            'code_category' => isset($input['code_category']) ? $input['code_category'] : '',
            'percent_of_assets' => isset($input['percent_of_assets']) ? $input['percent_of_assets'] : '',
            'price' => isset($input['price']) ? $input['price'] : '',
            'price_range' => trim($price_range, ','),
            'current_price' => isset($input['current_price']) ? $input['current_price'] : '',
            'profit_and_loss' => isset($input['profit_and_loss']) ? $input['profit_and_loss'] : '',
            'pickcolor' => isset($input['pickcolor']) ? $input['pickcolor'] : '#218838',
            'act' => isset($input['act']) ? $input['act'] : '',
            'stop_loss' => isset($input['stop_loss']) ? $input['stop_loss'] : '',
            'closing_percentage' => isset($input['closing_percentage']) ? $input['closing_percentage'] : '',
            'note' => isset($input['note']) ? $input['note'] : '',
            'status' => isset($input['status']) && !empty($input['status']) ? 1 : 0,
            'order' => isset($input['order']) && !empty($input['order']) ? $input['order'] : "",
            'created_at' => isset($input['created_at']) ? date('Y-m-d', strtotime($input['created_at'])) : date('Y-m-d'),
        ];
        // dd($arrData);
        if($input['id'] != ''){
            $Recommendations = $this->repository->where('id',$input['id'])->first();
            if(!empty($Recommendations) && empty($Recommendations->created_at)){
                // $arrData['created_at'] = date('Y-m-d H:i:s');
            }
            $arrData['updated_at'] = date('Y-m-d');
            $create = $Recommendations->update($arrData);
        }else{
            $Recommendations = $this->repository->select('*')->where('code_cp', $input['code_cp'])->count();
            if($Recommendations > 0){
                return array('success' => false, 'message' => 'Mã đối tượng đã tồn tại!');
            }
            // $arrData['created_at'] = date('Y-m-d H:i:s');
            $arrData['id'] = (string)Str::uuid();
            $create = $this->repository->create($arrData);
        }
        
        return array('success' => true, 'message' => 'Cập nhật thành công');
    }
    /**
     * Cập nhật và thêm mới màn hình danh sách
     */
    public function _updateColumn($input, $id)
    {
        $RecommendedSingle = $this->repository->where('id', $id)->first();
        $Recommendations = $this->repository->select('*')->get();
        $code_cp = !empty($RecommendedSingle) ? $RecommendedSingle->code_cp : '';
        $code_category = !empty($RecommendedSingle) ? $RecommendedSingle->code_category : '';
        $percent_of_assets = !empty($RecommendedSingle) ? $RecommendedSingle->percent_of_assets : '';
        $price = !empty($RecommendedSingle) ? $RecommendedSingle->price : '';
        $price_range = !empty($RecommendedSingle) ? $RecommendedSingle->price_range : '';
        $current_price = !empty($RecommendedSingle) ? $RecommendedSingle->current_price : '';
        $profit_and_loss = !empty($RecommendedSingle) ? $RecommendedSingle->profit_and_loss : '';
        $act = !empty($RecommendedSingle) ? $RecommendedSingle->act : '';
        $stop_loss = !empty($RecommendedSingle) ? $RecommendedSingle->stop_loss : '';
        $closing_percentage = !empty($RecommendedSingle) ? $RecommendedSingle->closing_percentage : '';
        $note = !empty($RecommendedSingle) ? $RecommendedSingle->note : '';
        $arrPricerange = [];
        $price_range = '';
        if(!empty($RecommendedSingle->price_range)){
            $arrPricerange = explode(',', $RecommendedSingle->price_range);
            for($i = 0; $i <= 2; $i++){
                if(isset($input['price_range_' . $i])){
                    if(empty($arrPricerange[$i])){
                        $arrPricerange[$i] .= ',' . $input['price_range_' . $i];
                    }else{
                        $arrPricerange[$i] = $input['price_range_' . $i];
                    }
                }
            }
        }else{
            foreach($input as $key => $value){
                if(strpos($key, 'price_range') !== false){
                    $price_range .= ',' . $value;
                }
            }
        }
        $param = [
            'code_cp' => isset($input['code_cp']) ? $input['code_cp'] : $code_cp,
            'code_category' => isset($input['code_category']) ? $input['code_category'] : $code_category,
            'percent_of_assets' => isset($input['percent_of_assets']) ? $input['percent_of_assets'] : $percent_of_assets,
            'price' => isset($input['price']) ? $input['price'] : $price,
            'price_range' => !empty($arrPricerange) ? trim(implode(',', $arrPricerange), ',') : (!empty($price_range) ? trim($price_range, ',') : $price_range),
            'current_price' => isset($input['current_price']) ? $input['current_price'] : $current_price,
            'profit_and_loss' => isset($input['profit_and_loss']) ? $input['profit_and_loss'] : $profit_and_loss,
            'act' => isset($input['act']) ? $input['act'] : $act,
            'stop_loss' => isset($input['stop_loss']) ? $input['stop_loss'] : $stop_loss,
            'closing_percentage' => isset($input['closing_percentage']) ? $input['closing_percentage'] : $closing_percentage,
            'note' => isset($input['note']) ? $input['note'] : $note,
            'status' => empty($RecommendedSingle) || isset($input['status']) ? 1 : 0,
        ];
        foreach($Recommendations as $value){
            if(isset($input['code_category']) && $input['code_category'] === $value->code_category){
                return array('success' => false, 'message' => 'Mã đối tượng đã tồn tại!');
            }
        }
        if(isset($RecommendedSingle) && !empty($RecommendedSingle)){
            $this->repository->where('id',$id)->update($param);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
            $param['status'] = 1;
            $param['id'] = $id;
            $this->repository->insert($param);
            return array('success' => true, 'message' => 'Thêm mới thành công!');
        }
    }

}
