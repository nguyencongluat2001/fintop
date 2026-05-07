<?php

namespace Modules\System\Dashboard\DataFinancial\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\System\Dashboard\DataFinancial\Services\DataFinancialService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use DB;
use Modules\System\Dashboard\DataFinancial\Models\DataFinancialModel;

/**
 * cẩm nangg
 *
 * @author Luatnc
 */
class DataFinancialController extends Controller
{

    public function __construct(
        DataFinancialService $DataFinancialService,
        CategoryService $categoryService
    ){
        $this->DataFinancialService = $DataFinancialService;
        $this->categoryService      = $categoryService;
    }

    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function index(Request $request)
    {
        $getCategory = $this->categoryService->where('cate','DM_DATA_CK')
        // ->orderBy('LENGTH(name_category)', 'ASC')
        ->orderBy('name_category', 'ASC')
        ->get()->toArray();
        $data['category'] = $getCategory;
        return view('dashboard.datafinancial.index',compact('data'));
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
        $arrInput = $request->input();
        if($arrInput['code_category'] == null || $arrInput['code_category'] == ''){
            unset($arrInput['code_category']);
        }else{
            $explode = explode(',',$arrInput['code_category']);
            $arrInput['code_category'] = $explode;
        }
        if(isset($arrInput['act']) && ($arrInput['act'] == null || $arrInput['act'] == '')){
            unset($arrInput['act']);
        }
        if(isset($arrInput['type']) && $arrInput['type'] == 'TIN_HIEU'){
            $arrInput['type'] = ['MUA','MUA DẦN','MUA MẠNH'];
        }else{
            unset($arrInput['type']);
        }
        if(isset($arrInput['code_act'])){
            $explode = explode(',',$arrInput['code_act']);
            // foreach($explode as $val){
            //     $arrInput['code_act'][] = $val;
            // }
            $arrInput['code_act'] = $explode;

        }else{
            unset($arrInput['code_act']);
        }
        $data = array();
        $param = $arrInput;
        $param['sort'] = 'order';
        $param['limit'] = '500';
        $param['sortType'] = 1;
        $objResult = $this->DataFinancialService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return view("dashboard.datafinancial.loadlist", $data)->render();
    }
    /**
     * Load màn hình them thông tin
     *
     * @param Request $request
     *
     * @return view
     */
    public function changeUpdate(Request $request)
    {
        $input = $request->all();
        $getCategory = $this->categoryService->where('cate','DM_DATA_CK')->get();
        $data['category'] = $getCategory;
        if($input['id'] != null || $input['id'] != ''){
            $dataFinacial = $this->DataFinancialService->where('id',$input['id'])->first();
            $data['datas'] = $dataFinacial;
        }
        return view('dashboard.datafinancial.changeEdit',$data);
    }
    /**
     * them thông tin
     *
     * @param Request $request
     *
     * @return view
     */
    public function create (Request $request)
    {
        $input = $request->input();
        $create = $this->DataFinancialService->store($input); 
        return $create;
    }
    /**
     * Xóa
     *
     * @param Request $request
     *
     * @return Array
     */
    public function delete(Request $request)
    {
        $input = $request->all();
        $listids = trim($input['listitem'], ",");
        $ids = explode(",", $listids);
        foreach ($ids as $id) {
            if ($id) {
                $this->DataFinancialService->where('id',$id)->delete();
            }
        }
        return array('success' => true, 'message' => 'Xóa thành công');
    }
    /**
     * 
     */
    // updateDataFinancial
    
    /**
     * Cập nhật dữ liệu màn hình index
     */
    public function updateDataFinancial(Request $request)
    {
        $arrInput = $request->all();
        $data = $this->DataFinancialService->_updateDataFinancial($arrInput, $arrInput['id']);
        return $data;
    }
    /**
     * Thay đổi dòng
     */
    public function upNdown(Request $request)
    {
        $arrInput = $request->all();
        $dataFinacial = $this->DataFinancialService->where('id', $arrInput['id'])->first();
        try{
            if($arrInput['type'] == 'down' && (int)$dataFinacial->order > 1){
                $downOrder = DataFinancialModel::where('order', '>=', ((int)$dataFinacial->order + 1))->orderBy('order')->first();
                $order = (int)$dataFinacial->order + 1;
                $dataFinacial->order = (int)$dataFinacial->order + 1;
                $dataFinacial->save();
                if(!empty($downOrder)){
                    if(($order - $downOrder->order) == 1){
                        $downOrder->order = (int)$downOrder->order - 1;
                    }else{
                        $downOrder->order = (int)$dataFinacial->order - 1;
                    }
                    $downOrder->save();
                    return array('success' => true, $dataFinacial->id => $dataFinacial->order, $downOrder->id => $downOrder->order);
                }
            }elseif($arrInput['type'] == 'up'){
                $downOrder = DataFinancialModel::where('order', '<=', ((int)$dataFinacial->order - 1))->orderBy('order', 'desc')->first();
                $order = (int)$dataFinacial->order;
                $dataFinacial->order = (int)$dataFinacial->order - 1;
                $dataFinacial->save();
                if(!empty($downOrder)){
                    if(($order - $downOrder->order) == 1){
                        $downOrder->order = (int)$downOrder->order + 1;
                    }else{
                        $downOrder->order = (int)$dataFinacial->order + 1;
                    }
                    $downOrder->save();
                    return array('success' => true, $downOrder->id => $downOrder->order, $dataFinacial->id => $dataFinacial->order);
                }
            }
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}
