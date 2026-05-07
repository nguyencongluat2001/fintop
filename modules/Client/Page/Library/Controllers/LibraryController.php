<?php

namespace Modules\Client\Page\Library\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Handbook\Services\HandbookService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Category\Services\CateService;
use Illuminate\Support\Facades\Http;
use DB;

/**
 * thư viện đầu tư
 *
 * @author Luatnc
 */
class LibraryController extends Controller
{

    public function __construct(
        CateService $cateService,
        CategoryService $categoryService,
        HandbookService $handbookService
    ){
        $this->cateService = $cateService;
        $this->categoryService = $categoryService;
        $this->handbookService = $handbookService;
    }

    /**
     * khởi tạo dữ liệu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        $getCategory = $this->categoryService->where('cate','CNK_001')->orderBy('order')->get()->toArray();
        $data['category'] = $getCategory;
        return view('client.Library.home',compact('data'));
    }

     /**
     * load màn hình danh sách lấy chỉ số thị trường
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadList(Request $request)
    { 
        $arrInput = $request->input();
        // dd($arrInput);
        // if(!empty($arrInput['cate']) && $arrInput['cate'] == null || $arrInput['cate'] == ''){
        //     unset($arrInput['cate']);
        // }
        $data = array();
        $param['sortType'] = 1;
        $param = $arrInput;
        if(!empty($arrInput['cate'])){
            $objResult = $this->handbookService->where('category_handbook',$arrInput['cate'])->orderBy('order')->get();
        }else{
            $objResult = $this->handbookService->where('category_handbook', 'TU_SACH_DAU_TU')->where('current_status',1)->orderBy('order')->get();

        }
        $data['datas'] = $objResult;
        $data['param'] = $param;
        return view("client.Library.loadlist",  $data)->render();
    }
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
        $data = $this->handbookService->loadList($arrInput);
        return view("client.Library.loadlist-tap1", $data);
    }
     /**
     * Load màn hình xem video trực tuyến
     *
     * @param Request $request
     *
     * @return view
     */
    public function seeVideo(Request $request)
    {
        $input = $request->all();
        $data = $this->handbookService->where('id',$input['id'])->first();
        return view('client.Library.video',compact('data'));
    }
}
