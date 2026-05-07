<?php

namespace Modules\System\Dashboard\Home\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\Api\Services\Admin\PositionService;
use Modules\System\Dashboard\Home\Services\HomeService;
use DB;

/**
 * Phân quyền người dùng 
 *
 * @author Luatnc
 */
class HomeController extends Controller
{

    public function __construct(
        HomeService $homeService
    ){
        $this->homeService = $homeService;
    }

    /**
     * khởi tạo dữ liệu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('dashboard.home.index');
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
        $data = $this->homeService->loadList($arrInput);
        return view("client.home.loadlist", $data);
    }
    // public function realTimeData(Request $request)
    // { 
    //     $arrInput = $request->input();
    //     $param = [
    //         'code'=> 'VNINDEX',
    //         'startDate'=> '2020-01-01',
    //         'endDate'=> '2023-04-28',
    //         'limit'=> '500',
    //     ];
    //     $response = Http::withBody(json_encode($param),'application/json')->get('192.168.1.5:7500/api/list-coin-code/');
    //     $response = $response->getBody()->getContents();
    //     $response = json_decode($response,true);
    //     foreach($response as $value){
    //         $data[] = [
    //             'time'=> substr($value['date'], 0, 10) ,
    //             'open'=> $value['priceOpen'],
    //             'high'=> $value['priceHigh'],
    //             'low'=> $value['priceLow'],
    //             'close'=> $value['priceClose'],
    //         ];
    //     }
    //     // dd($data);

    //     return response()->json($data);
    // }
    /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListTap1(Request $request)
    { 
        $arrInput = $request->input();
        $data = $this->homeService->loadListTap1($arrInput);
        return view("dashboard.home.loadlist-tap1", $data);
    }
}
