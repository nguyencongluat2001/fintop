<?php

namespace Modules\System\Dashboard\Handbook\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Handbook\Services\HandbookService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use DB;

/**
 * cẩm nang
 *
 * @author Luatnc
 */
class HandbookController extends Controller
{

    public function __construct(
        HandbookService $handbookService,
        CategoryService $categoryService
    ){
        $this->handbookService = $handbookService;
        $this->categoryService = $categoryService;
    }

    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function index(Request $request)
    {
        $getCategory = $this->categoryService->where('cate','CNK_001')->orderBy('order')->get()->toArray();
        $data['category'] = $getCategory;
        return view('dashboard.handbook.index',compact('data'));
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
        if($arrInput['cate'] == null || $arrInput['cate'] == ''){
            $arrInput['cate'] = 'TU_SACH_DAU_TU';
        }
        $data = array();
        $param = $arrInput;
        // $param['sort'] = 'order';
        $param['sortType'] = 1;
        $objResult = $this->handbookService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        // $data['pagination'] = $data['datas']->links('pagination.default');
        return view("dashboard.handbook.loadlist", $data)->render();
    }
     /**
     * Load màn hình them thông tin
     *
     * @param Request $request
     *
     * @return view
     */
    public function createForm(Request $request)
    {
        $input = $request->all();
        $getCategory = $this->categoryService->where('cate','CNK_001')->get()->toArray();
        $data['category'] = $getCategory;
        $data['order'] = $this->handbookService->select('id')->count() + 1;
        $data['detail']['category_handbook'] = $input['cate'];
        return view('dashboard.handbook.edit',compact('data'));
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
        $create = $this->handbookService->store($input); 
        return array('success' => true, 'message' => 'Cập nhật thành công');
    }
     /**
     * Load màn hình chỉnh sửa thông tin thể loại
     *
     * @param Request $request
     *
     * @return view
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        $data['detail'] = $this->handbookService->edit($input);
        $data['category'] = $this->categoryService->where('cate','CNK_001')->get()->toArray();
        return view('dashboard.handbook.edit',compact('data'));
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
                $this->handbookService->where('id',$id)->delete();
            }
        }
        return array('success' => true, 'message' => 'Xóa thành công');
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
        return view('dashboard.handbook.video',compact('data'));
    }
}
