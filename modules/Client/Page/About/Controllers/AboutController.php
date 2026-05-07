<?php

namespace Modules\Client\Page\About\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Blog\Services\BlogDetailService;
use Modules\System\Dashboard\Blog\Services\BlogImagesService;
use Modules\System\Dashboard\Blog\Services\BlogService;
use Modules\System\Dashboard\Category\Services\CategoryService;

/**
 * cẩm nang
 *
 * @author Luatnc
 */
class AboutController extends Controller
{

    public function __construct(
        CategoryService $categoryService,
        BlogService $blogService,
        BlogDetailService $blogDetailService,
        BlogImagesService $blogImagesService
    ){
        $this->categoryService = $categoryService;
        $this->blogService = $blogService;
        $this->blogDetailService = $blogDetailService;
        $this->blogImagesService = $blogImagesService;
    }

    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function index(Request $request)
    {
        // dd('1');
        $categories = $this->categoryService->where('cate','DM_BLOG')->where('code_category', 'BAO_CAO_THTT')->where('status', 1)->get();
        // dd($categories);
        $data['categories'] = $categories;
        return view('client.about.home',$data);
    }
    /**
     * Danh sách Tổng hợp thị trường
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListTHTT(Request $request)
    { 
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $param['sort'] = 'created_at';
        $param['status'] = '1';
        $objResult = $this->blogService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.baocaoTTTH');
        return view("client.about.loadlistTHTT", $data)->render();
    }
    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function session(Request $request)
    {
        return view('client.about.session');
    }
    /**
     * Danh sách Tổng kết phiên
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListTKP(Request $request)
    { 
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $param['sort'] = 'created_at';
        $param['status'] = '1';
        $objResult = $this->blogService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return view("client.about.loadlistTKP", $data)->render();
    }
    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function industry(Request $request)
    {
        return view('client.about.industry');
    }
    /**
     * Danh sách Tổng kết phiên
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListPTN(Request $request)
    { 
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $param['sort'] = 'created_at';
        $param['status'] = '1';
        $objResult = $this->blogService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return view("client.about.loadListPTN", $data)->render();
    }
    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function stock(Request $request)
    {
        return view('client.about.stock');
    }
    /**
     * Danh sách Tổng kết phiên
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListPTDN(Request $request)
    { 
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $param['sort'] = 'created_at';
        $param['status'] = '1';
        $objResult = $this->blogService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return view("client.about.loadlistPTCP", $data)->render();
    }
    /**
     * Đọc bài viết
     */
    public function reader(Request $request, $id)
    {

        $check = $this->blogService->find($id);
        if($check->type_blog == 'VIP' && $_SESSION == []){
            // $data['message'] = "Đăng nhập để xem báo cáo vip!";
            // $data['link'] = url("/client/about/reader/").$id;
            return redirect('client/about/session');
        }
        if($check->type_blog == 'VIP' && !empty($_SESSION['id']) && $_SESSION['role'] == 'USERS' && $_SESSION['account_type_vip'] != 'VIP1' && $_SESSION['account_type_vip'] != 'VIP2'){
            return redirect('client/privileges/index');

        }
        $blog = $this->blogService->where('id', $id)->first();
        if($blog->view_click == '' || $blog->view_click == null){
            $view_click = 1;
        }else{
            $view_click = $blog->view_click + 1;
        }
        $update_view_click = $this->blogService->where('id', $id)->update(['view_click' => $view_click]);
        $blogDetail = $this->blogDetailService->where('code_blog', $blog->code_blog)->first();
        $blogImage = $this->blogImagesService->where('code_blog', $blog->code_blog)->first();
        $data['datas']['blog'] = $blog;
        $data['datas']['blogDetail'] = $blogDetail;
        $data['datas']['blogImage'] = $blogImage;
        $data['datas']['type'] = $blog->code_category;
        return view("client.about.reader", $data)->render();
    }
    /**
     * load thêm dữ liệu
     */
    public function loadMore(Request $request)
    {
        $arrInput = $request->all();
        $arrInput['sort'] = 'created_at';
        $arrInput['limit'] = 10;
        $objResult = $this->blogService->filter($arrInput);
        $results = array();
        Carbon::setLocale('vi');
        $now = Carbon::now();
        foreach($objResult as $key => $value){
            $created_at = Carbon::create($value->created_at);
            $results[$key] = $value;
            $results[$key]['title'] = $value->detailBlog->title;
            $results[$key]['user_name'] = $value->users->name;
            $results[$key]['link'] = url('/file-image-client/blogs/' . ($value->imageBlog[0]->name_image ?? ''));
            $results[$key]['created_at'] = $created_at->diffForHumans($now);
        }
        return \Response::json($results);
    }
    
}
