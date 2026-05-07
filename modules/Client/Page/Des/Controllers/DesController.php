<?php

namespace Modules\Client\Page\Des\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Category\Services\CateService;
use Modules\System\Dashboard\Blog\Services\BlogService;
use Modules\System\Dashboard\Blog\Services\BlogDetailService;
use Modules\System\Dashboard\Blog\Services\BlogImagesService;

use DB;
use Response;

/**
 * cẩm nang
 *
 * @author Luatnc
 */
class DesController extends Controller
{

    public function __construct(
        BlogService $BlogService,
        BlogImagesService $BlogImagesService,
        BlogDetailService $BlogDetailService,
        CateService $CateService,
        CategoryService $CategoryService
    ){
        $this->BlogService = $BlogService;
        $this->BlogImagesService = $BlogImagesService;
        $this->BlogDetailService = $BlogDetailService;
        $this->CateService = $CateService;
        $this->CategoryService = $CategoryService;
    }

    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function index(Request $request)
    {
        $categories = $this->CategoryService->where('cate','DM_BLOG')->where('instruct',1)->orderBy('order','ASC')->get();
        if(isset($categories[0]->id)){
            $blogs = $this->BlogService->where('code_category', $categories[0]->code_category)->where('status', 1)->orderBy('created_at', 'desc')->get();
        }
        $data['datas'] =  $categories;
        $data['datasMenuDes'] =  $categories;
        $data['blogs'] = $blogs ?? [];
        return view('client.des.home',$data);
    }
    public function list(Request $request)
    {
        $id = $request->id;
        $categories = $this->CategoryService->where('id', $id)->first();
        $blogs = $this->BlogService->where('code_category', $categories->code_category)->where('type_blog','!=','VIP')->where('status', 1)->orderBy('created_at', 'desc')->get();
        if(!empty($_SESSION['id'])){
           $blogs = $this->BlogService->where('code_category', $categories->code_category)->where('status', 1)->orderBy('created_at', 'desc')->get(); 
        }
        $htmls = '';
        foreach($blogs as $blog){
            Carbon::setLocale('vi');
            $now = Carbon::now();
            $created_at = Carbon::create($blog->created_at);
            $htmls .= '<div class="col-sm-6 col-lg-12 text-decoration-none ' . $blog->code_category .'">';
            $htmls .= '<div class="pb-3 d-lg-flex gx-5">';
            $htmls .= '<div class="col-lg-3 " style="align-items: right;justify-content: right;position: relative;">';
            $htmls .= '<a href="javascript:;" onclick="reader(\'' . $blog->id .'\')">';
            if((isset($blog['type_blog']) && $blog['type_blog'] == 'VIP')){
                $htmls .= '<h1 style="position: absolute;right:0">';
                $htmls .= '<img src="'. url('/clients/img/vip.png') .'" alt="Image" style="height: 60px;width: 50px;object-fit: cover;">';
                $htmls .= '</h1>';
            }
            $htmls .= '<img class="card-img-top" src="'. url('/file-image-client/blogs/') . '/' .(!empty($blog->imageBlog[0]->name_image)?$blog->imageBlog[0]->name_image:'') . '" style="height: 170px;width: 100%;object-fit: cover;" alt="...">';
            $htmls .= '</a></div>';
            $htmls .= '<div style="width:20px"></div>';
            $htmls .= '<div class="col-lg-7">';
            $htmls .= '<a href="javascript:;" onclick="reader(\'' . $blog->id .'\')">';
            $htmls .= '<h5 class="card-title light-600 text-dark">' . $blog->detailBlog->title . '</h5>';
            $htmls .= '</a>';
            $htmls .= '<i>'.$created_at->diffForHumans($now) . '( '. !empty($created_at) ? date('H:i d/m/Y', strtotime($created_at)) : '' .' )</i>';
            $htmls .= '<p class="light-300">';
            $htmls .= '<div class="blogReader">'. $blog->detailBlog->decision .'</div>';
            $htmls .= '</p>';
            $htmls .= '<a href="javascript:;" onclick="reader(\'' . $blog->id .'\')">';
            $htmls .= '<span class="text-decoration-none light-300 btn rounded-pill" style="background: #32870b;color: #ffffff;">';
            $htmls .= 'Xem chi tiết</i>';
            $htmls .= '</span></a></div></div></div>';
            $htmls .= '<hr style="margin-bottom: 1rem;">';
        }
        // dd($htmls);
        return response()->json(['content' => $htmls]);
    }
    public function reader(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $blog = $this->BlogService->where('id', $id)->first();
        $blogDetail = $this->BlogDetailService->where('code_blog', $blog->code_blog)->first();
        $blogImage = $this->BlogImagesService->where('code_blog', $blog->code_blog)->first();
        $data['datas']['blog'] = $blog;
        $data['datas']['blogDetail'] = $blogDetail;
        $data['datas']['blogImage'] = $blogImage;
        $data['datas']['type'] = $blog->code_category;
        return view("client.des.reader", $data)->render();
    }
    
}
