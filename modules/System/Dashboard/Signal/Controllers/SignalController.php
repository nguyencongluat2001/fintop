<?php

namespace Modules\System\Dashboard\Signal\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Signal\Services\SignalService;

class SignalController extends Controller
{
    public function __construct(
        SignalService $signalService
    ){
        $this->signalService = $signalService;
    }
    /**
     * Trang đích
     */
    public function index(Request $request)
    {
        return view('dashboard.signal.signalbuy.index');
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
        $input['type'] = 'MUA';
        $input['type_order'] = 'created_at';

        $objResult = $this->signalService->filter($input);
        $data['datas'] = $objResult;
        $data['type'] = $request->type;
        return view('dashboard.signal.signalbuy.loadList', $data)->render();
    }


        /**
     * Danh sách
     */
    public function loadListPass(Request $request)
    {
        $input = $request->input();
        $data = array();
        $input['sort'] = 'order';
        // $input['sortType'] = 1;
        $input['type'] = 'BAN';
        $input['type_order'] = 'created_at';

        $objResult = $this->signalService->filter($input);
        $data['datas'] = $objResult;
        $data['type'] = $request->type;
        return view('dashboard.signal.signalpass.loadList', $data)->render();
    }
     public function indexPass(Request $request)
    {
        return view('dashboard.signal.signalpass.index');
    }
    /**
     * Form thêm
     */
    public function create(Request $request)
    {
        $input = $request->all();
        $data['datas']['type'] = $input['type'];
        if($input['type'] == 'MUA'){
            $data['datas']['title'] = 'MUA xxx';
        }else{
            $data['datas']['title'] = 'BÁN xxx';
        }
        return view('dashboard.signal.add', $data);
    }
    /**
     * Form sửa
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        $signals = $this->signalService->where('id', $input['id'])->first();
        $data['datas'] = $signals;
        $data['order'] = $this->signalService->select('id')->count() + 1;
        return view('dashboard.signal.add', $data);
    }
    /**
     * Thêm hoặc Cập nhật
     */
    public function update(Request $request)
    {
        $input = $request->input();
        $create = $this->signalService->store($input); 
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
            $this->signalService->where('id', $id)->delete();
        }
        return array('success' => true, 'message' => 'Xóa thành công!');
    }
    /**
     * Cập nhật thông tin màn hình index
     */
    public function updateSignal(Request $request)
    {
        $input = $request->all();
        $data = $this->signalService->_updateSignal($input, $input['id']);
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatusSignal(Request $request)
    {
        $input = $request->all();
        $list = $this->signalService->where('id', $input['id']);
        if(!empty($list->first())){
            $list->update(['status' => $input['status']]);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
            return array('success' => false, 'message' => 'Không tìm thấy dữ liệu!');
        }
    }
}