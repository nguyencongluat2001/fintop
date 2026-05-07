<?php

namespace Modules\System\Dashboard\Handbook\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\Handbook\Repositories\HandbookRepository;
use Str;

class HandbookService extends Service
{

    public function __construct(
        HandbookRepository $HandbookRepository
        )
    {
        $this->HandbookRepository = $HandbookRepository;
        parent::__construct();
    }

    public function repository()
    {
        return HandbookRepository::class;
    }

    public function store($input){
        if(isset($input['order'])){
            $this->updateOrder($input);
        }
        if($input['id'] != ''){
            $arrData = [
                'name_handbook'=>$input['name_handbook'],
                'category_handbook'=>$input['category_handbook'],
                'type_handbook'=>$input['type_handbook'],
                'url_link'=>$input['url_link'],
                'decision'=>$input['decision'],
                'current_status'=> !empty($input['is_checkbox_status'])?$input['is_checkbox_status']:0,
                'order' => $input['order'] ?? $this->repository->select('id')->count() + 1,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $create = $this->HandbookRepository->where('id',$input['id'])->update($arrData);
        }else{
            $arrData = [
                'id'=>(string)Str::uuid(),
                'name_handbook'=>$input['name_handbook'],
                'category_handbook'=>$input['category_handbook'],
                'type_handbook'=>$input['type_handbook'],
                'url_link'=>$input['url_link'],
                'decision'=>$input['decision'],
                'current_status'=> !empty($input['is_checkbox_status'])?$input['is_checkbox_status']:0,
                'order' => $input['order'] ?? $this->repository->select('id')->count() + 1,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $create = $this->HandbookRepository->create($arrData);
        }
        
        return $create;
    }
    public function edit($arrInput){
        $getUserInfor = $this->repository->where('id',$arrInput['id'])->first()->toArray();
        return $getUserInfor;
    }
    /**
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
