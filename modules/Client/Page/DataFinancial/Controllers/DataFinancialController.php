<?php

namespace Modules\Client\Page\DataFinancial\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\System\Dashboard\DataFinancial\Services\DataFinancialService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Signal\Services\SignalService;
use Modules\System\Dashboard\Effective\Services\EffectiveService;
use Modules\System\Dashboard\Recommended\Services\RecommendedService;
use Illuminate\Support\Facades\Auth;
use DB;


/**
 * cẩm nang
 *
 * @author Luatnc
 */
class DataFinancialController extends Controller
{

    public function __construct(
        RecommendedService $recommendedService,
        EffectiveService $effectiveService,
        SignalService $SignalService,
        DataFinancialService $DataFinancialService,
        CategoryService $categoryService
    ){
        $this->recommendedService = $recommendedService;
        $this->effectiveService = $effectiveService;
        $this->SignalService = $SignalService;
        $this->DataFinancialService = $DataFinancialService;
        $this->categoryService = $categoryService;
    }

    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function index(Request $request)
    {
        // dd('1');
        $getCategory = $this->categoryService->where('cate','DM_DATA_CK')->get()->toArray();
        $data['category'] = $getCategory;
        return view('client.dataFinancial.home',compact('data'));
    }
    /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadData(Request $request)
    { 
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $objResult = $this->DataFinancialService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return view("client.dataFinancial.dataFintop", $data)->render();
    }
     /**
     * tra cứu cổ phiếu
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function searchDataCP(Request $request)
    { 
        $arrInput = $request->input();
        $result = $this->DataFinancialService->where('code_cp',$arrInput['code_cp'])->first();
        if($arrInput['code_cp'] != ''){
            if(!Auth::check()){
                $data=[
                    'status' => 401,
                    'message' => 'Vui lòng đăng nhập để tra cứu!',
                ];
                return response()->json($data);
            }
            if(!isset($result)){
                $data=[
                    'status' => 2,
                    'message' => 'Chưa có dữ liệu cổ phiếu này, vui lòng tiếp tục tra cứu!',
                ];
                return response()->json($data);
            }
            $getCategory = $this->categoryService->where('code_category',$result->code_category)->first();
            $data = [
                'id'=>$arrInput['id'],
                'code_cp'=>$result->code_cp,
                'exchange'=>$result->exchange,
                'code_category'=>isset($getCategory->name_category)?$getCategory->name_category:'',
                'ratings_TA'=>$result->ratings_TA,
                'identify_trend'=>$result->identify_trend,
                'act'=>$result->act,
                'trading_price_range'=>$result->trading_price_range,
                'stop_loss_price_zone'=>$result->stop_loss_price_zone,
                'ratings_FA'=>$result->ratings_FA,
                'url_link'=>$result->url_link,
                'status'=>$result->status,
                'created_at'=> date('H:i:s', strtotime($result->created_at)),
                'created_at_day'=> date('d/m', strtotime($result->created_at)),
                // 'created_at'=>$result->created_at,
                'updated_at'=>$result->updated_at
            ];
            // dd($data);
            return response()->json($data);
        }
        
    }
    /**
     * them thông tin
     *
     * @param Request $request
     *
     * @return view
     */
    public function fireAntChart (Request $request)
    {
        $input = $request->input();
        return view('client.dataFinancial.fireAntChart');
    }
     /**
     * hiển thị ghi chú
     *
     * @param Request $request
     *
     * @return view
     */
    public function noteTaFa (Request $request)
    {
        $input = $request->input();
        return view('client.dataFinancial.noteTaFa');
    }
     /**
     * index tín hiệu mua
     *
     * @param Request $request
     *
     * @return view
     */
    public function signalIndex (Request $request)
    {
        return view('client.dataFinancial.signal');
    }
     /**
     * danh sách tín hiệu mua
     *
     * @param Request $request
     *
     * @return view
     */
    public function loadList_signal (Request $request)
    {
        $arrInput = $request->input();
        $result['datas'] = $this->DataFinancialService->where('status','1')->orderBy('order')->whereIn('act',['MUA','MUA DẦN','MUA MẠNH'])->get();
        return view('client.dataFinancial.loadlist-signal',$result);
    }
     /**
     * Tín Hiệu V.I.P
     *
     * @param Request $request
     *
     * @return view
     */
    public function recommendationsIndex (Request $request)
    {
        return view('client.dataFinancial.recommendations.index');
    }
     /**
     * list Tín Hiệu V.I.P
     *
     * @param Request $request
     *
     * @return view
     */
    public function loadList_recommendations (Request $request)
    {
        $arrInput = $request->input();
        $result['datas']= [];
        if(isset($arrInput['type']) && $arrInput['type'] == 'box'){
            $arrData = $this->SignalService->where('status','1')->orderBy('created_at','desc')->take(3)->get();
            foreach($arrData as $val){
                if(!Auth::check()){
                    $title = $val['title'];
                }else{
                    $val['title'] = str_replace('xxx',$val['code'],$val['title']);
                }
                $result['datas'][] = [
                    'user_id' => $val['user_id'],
                    'title' => $val['title'],
                    'code' => $val['code'],
                    'type' => $val['type'],
                    'target' => $val['target'],
                    'stop_loss' => $val['stop_loss'],
                    'price_buy' => $val['price_buy'],
                    'order' => $val['order'],
                    'status' => $val['status'],
                    'created_at' => date('Y-m-d H:i:s', strtotime($val['created_at'])),
                    'updated_at' => date('Y-m-d H:i:s', strtotime($val['updated_at']))
                ];
            }
            return view('client.layouts.loadListBox',$result);
        }else{
            $result['datas'] = $this->recommendedService->where('status','1')->get()->toArray();
            return view('client.dataFinancial.recommendations.loadlist',$result);
        }
    }
/**
     * list Tín Hiệu V.I.P
     *
     * @param Request $request
     *
     * @return view
     */
    public function loadList_recommendations_tab (Request $request)
    {
        $arrInput = $request->input();
        $result['datas'] = [];
        if(isset($arrInput['type']) && $arrInput['type'] == 'box'){
            $result['datas'] = $this->SignalService->where('status','1')->orderBy('created_at','desc')->get()->get();
            return view('client.layouts.loadListBox',$result);
        }else{
            $arrData = $this->SignalService->where('status','1')->orderBy('created_at','desc')->get();
            // $arrData = $this->SignalService->where('status','1')->orderBy('created_at','desc')->take(3)->get();
            foreach($arrData as $val){
                if(!Auth::check()){
                    $title = $val['title'];
                }else{
                    $val['title'] = str_replace('xxx',$val['code'],$val['title']);
                }
                $result['datas'][] = [
                    'user_id' => $val['user_id'],
                    'title' => $val['title'],
                    'code' => $val['code'],
                    'type' => $val['type'],
                    'target' => $val['target'],
                    'stop_loss' => $val['stop_loss'],
                    'price_buy' => $val['price_buy'],
                    'order' => $val['order'],
                    'status' => $val['status'],
                    'created_at' => date('Y-m-d H:i:s', strtotime($val['created_at'])),
                    'updated_at' => date('Y-m-d H:i:s', strtotime($val['updated_at']))
                ];
            }
            return view('client.dataFinancial.recommendations.loadlist',$result);
        }
    }
      /**
     * Danh mục Fintop
     *
     * @param Request $request
     *
     * @return view
     */
    public function categoryFintopIndex (Request $request)
    {
        return view('client.dataFinancial.categoryfintop.index');
    }
     /**
     * list Danh mục FinTop vip
     *
     * @param Request $request
     *
     * @return view
     */
    public function loadList_categoryFintop_vip (Request $request)
    {
        $arrInput = $request->input();
        $result['datas'] = $this->recommendedService->where('status','!=','')->orderBy('order','ASC')->get()->toArray();

        $data['datas'] = [];
        foreach($result['datas'] as $item){
            if(isset($item['price_range'])){
                $ta = explode(',',$item['price_range']);
            }
            $getCate = $this->categoryService->where('code_category',$item['code_category'])->first();
            $data['datas'][] = [
                "code_cp" => !empty($item['code_cp'])?$item['code_cp']:'',
                "name_category" => !empty($getCate->name_category)?$getCate->name_category:'',
                "code_category" => !empty($item['code_category'])?$item['code_category']:'',
                "percent_of_assets" => !empty($item['percent_of_assets'])?$item['percent_of_assets']:'',
                "price" => !empty($item['price'])?$item['price']:'',

                "ta1" => !empty($ta[0])?$ta[0]:'',
                "ta2" => !empty($ta[1])?$ta[1]:'',
                "ta3" => !empty($ta[2])?$ta[2]:'',

                "current_price" => !empty($item['current_price'])?$item['current_price']:'',
                "profit_and_loss" => !empty($item['profit_and_loss'])?$item['profit_and_loss']:'',
                "pickcolor" => !empty($item['pickcolor'])?$item['pickcolor']:'#218838',
                "act" => !empty($item['act'])?$item['act']:'',
                "stop_loss" => !empty($item['stop_loss'])?$item['stop_loss']:'',
                "closing_percentage" => !empty($item['closing_percentage'])?$item['closing_percentage']:'',
                "note" => !empty($item['note'])?$item['note']:'',
                "status" => !empty($item['status'])?$item['status']:'',
                "created_at" => !empty($item['created_at'])?$item['created_at']:'',
                "updated_at" => !empty($item['updated_at'])?$item['updated_at']:'',
            ];
        }
        return view('client.dataFinancial.categoryfintop.loadlist_vip',$data);
    }
     /**
     * list Danh mục FinTop basic
     *
     * @param Request $request
     *
     * @return view
     */
    public function loadList_categoryFintop_basic (Request $request)
    {
        $arrInput = $request->input();
        $data = [];
        $result['datas'] = $this->effectiveService->where('status','!=','')->orderBy('date_close','DESC')->get();
        foreach($result['datas'] as $item){
            $getCate = $this->categoryService->where('code_category',$item['code_category'])->first();
            $data['datas'][] = [
                "closing_percentage" => !empty($item['closing_percentage'])?$item['closing_percentage']:'',
                "name_category" => !empty($getCate->name_category)?$getCate->name_category:'',
                "code_category" => !empty($item['code_category'])?$item['code_category']:'',
                "percent_of_assets" => !empty($item['percent_of_assets'])?$item['percent_of_assets']:'',
                "pickcolor" => !empty($item['pickcolor'])?$item['pickcolor']:'',
                "code_cp" => !empty($item['code_cp'])?$item['code_cp']:'',
                "price" => !empty($item['price'])?$item['price']:'',
                "price_close" => !empty($item['price_close'])?$item['price_close']:'',
                "profit_and_loss" => !empty($item['profit_and_loss'])?$item['profit_and_loss']:'',
                "stop_loss" => !empty($item['stop_loss'])?$item['stop_loss']:'',
                "note" => !empty($item['note'])?$item['note']:'',
                "date_close" => !empty($item['date_close'])?$item['date_close']:'',
                "created_at" => !empty($item['created_at'])?$item['created_at']:'',
            ];
        }

        return view('client.dataFinancial.categoryfintop.loadlist',$data);
    }
    
}
