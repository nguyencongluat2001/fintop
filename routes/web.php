<?php

//Client
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Modules\Client\Auth\Controllers\RegisterController;

use Modules\Client\Page\About\Controllers\AboutController;
use Modules\Client\Page\DataFinancial\Controllers\DataFinancialController as ClientDataFinancialController;
use Modules\Client\Page\Des\Controllers\DesController;
use Modules\Client\Page\Home\Controllers\HomeController as ClientHomeController;
use Modules\Client\Page\Introduce\Controllers\IntroduceController;
use Modules\Client\Page\Infor\Controllers\InforController;
use Modules\Client\Page\Library\Controllers\LibraryController;
use Modules\Client\Page\Notification\Controllers\ReadNotificationController;
use Modules\Client\Page\Privileges\Controllers\PrivilegesController;
use Modules\Client\Page\UpgradeAcc\Controllers\UpgradeAccController;


//Dashboard
use Modules\System\Dashboard\ApprovePayment\Controllers\ApprovePaymentController;
use Modules\System\Dashboard\BackupData\Controllers\BackupDataController;
use Modules\System\Dashboard\Dashboards\Controllers\DashboardController;
use Modules\System\Dashboard\Blog\Controllers\BlogController;
use Modules\System\Dashboard\Category\Controllers\CateController;
use Modules\System\Dashboard\Category\Controllers\CategoryController;
use Modules\System\Dashboard\DataFinancial\Controllers\DataFinancialController;
use Modules\System\Dashboard\Effective\Controllers\EffectiveController;
use Modules\System\Dashboard\Handbook\Controllers\HandbookController;
use Modules\System\Dashboard\Home\Controllers\HomeController;
use Modules\System\Dashboard\Recommended\Controllers\RecommendedController;
use Modules\System\Dashboard\Signal\Controllers\SignalController;
use Modules\System\Dashboard\Users\Controllers\UserController;
use Modules\System\Dashboard\Client\Controllers\ClientController;
use Modules\System\Dashboard\Permision\Controllers\PermisionController;
use Modules\System\Dashboard\UserLog\Controllers\UserLogController;
use Modules\System\Dashboard\Sql\Controllers\SqlController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });
// Route::get('/', function (\Modules\System\Dashboard\GoogleSheet\Services\GoogleSheet $googleSheet) {
//     $googleSheet->readGoogleSheet();
//     // return view('auth.login');
// });
// Route::get('/', [ClientHomeController::class, 'index']);
// Route::get('/login', function () {
//     return view('auth.signin');
// });
// Route::get('/register', function () {
//     return view('auth.register');
// });
//Login quan tri
// Route::get('/admin', [LoginController::class, 'logoutAdmin']);
Route::post('/system/homeAdmin', [LoginController::class, 'checkLoginAdmin'])->name('checkLoginAdmin');
// Route::post('/logoutAdmin', [LoginController::class, 'logoutAdmin'])->name('logoutAdmin');


Route::get('/404_notFound', function () {
    return view('dashboard.home.404_notFound');
})->name('404_notFound');
Route::post('/system/home', [LoginController::class, 'checkLogin'])->name('checkLogin');
Route::get('/login', [LoginController::class, 'logout'])->name('login');
Route::get('/system/login', [LoginController::class, 'logout'])->name('fromLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('register/send-otp/sent_OTP', [UserController::class, 'sent_OTP']);
// Route::post('register/send-otp/sent_OTP', [UserController::class, 'sent_OTP']);
// Route::get('/register', [RegisterController::class, 'registerIntroduce']);

Auth::routes();
Route::prefix('register')->group(function () {
    Route::get('', [RegisterController::class, 'index'])->name('register');
    Route::get('tab1', [RegisterController::class, 'tab1']);
    Route::get('tab2', [RegisterController::class, 'tab2']);
    Route::get('tab3', [RegisterController::class, 'tab3']);
    Route::get('tab4', [RegisterController::class, 'tab4']);
    Route::get('checkEmail', [RegisterController::class, 'checkEmail']);
});

Route::get('/dangky/{id}', [UserController::class, 'registerIntroduce']);

// Lấy mã nhân viên giới thiệu
Route::post('register/send-otp/getUser', [UserController::class, 'getUser']);
Route::post('client/infor/getUser', [UserController::class, 'getUser']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware('checkloginAdmin')->group(function () {
        // quản trị người dùng
        Route::prefix('/system/user')->group(function () {
            Route::get('/index', [UserController::class, 'index']);
            Route::get('/loadList',[UserController::class,'loadList']);
            Route::post('/edit', [UserController::class,'edit']);
            Route::post('/createForm', [UserController::class,'createForm']);
            Route::post('/create', [UserController::class,'create']);
            Route::post('/delete', [UserController::class,'delete']);
            Route::post('/updateUser', [UserController::class,'updateUser']);
            Route::post('/upNdown', [UserController::class,'upNdown']);
            // Cập nhật mật khẩu
            Route::post('/changeStatus', [UserController::class,'changeStatus']);
            Route::get('/changePass', [UserController::class,'changePass']);
            Route::post('/updatePass', [UserController::class,'updatePass']);
            Route::post('/getUser', [UserController::class, 'getUser']);

        });
        // quản trị người dùng
        Route::prefix('/system/client')->group(function () {
            Route::get('/index', [ClientController::class, 'index']);
            Route::get('/loadList',[ClientController::class,'loadList']);
            Route::get('/edit', [ClientController::class,'edit']);
            Route::post('/edit_data', [UserController::class,'edit']);
            Route::get('/edit_upgradeAcc', [ClientController::class,'edit_upgradeAcc']);
            Route::post('/createForm', [ClientController::class,'createForm']);
            Route::post('/create', [ClientController::class,'create']);
            Route::post('/create_upgradeAcc', [ClientController::class,'create_upgradeAcc']);
            // nnanag cấp user lên sale
            Route::post('/store_upgrade_ctv_sale', [ClientController::class,'store_upgrade_ctv_sale']);

            Route::post('/delete', [ClientController::class,'delete']);
            Route::post('/updateUser', [ClientController::class,'updateUser']);
            Route::post('/upNdown', [ClientController::class,'upNdown']);
            // Cập nhật mật khẩu
            Route::post('/changeStatus', [ClientController::class,'changeStatus']);
            Route::get('/changePass', [ClientController::class,'changePass']);
            Route::post('/updatePass', [ClientController::class,'updatePass']);
        });
         //dữ liệu chứng khoán
        Route::prefix('/system/datafinancial')->group(function () {
            //Handbook
            Route::get('/index', [DataFinancialController::class, 'index']);
            Route::get('/loadList',[DataFinancialController::class,'loadList']);
            Route::post('/createForm',[DataFinancialController::class,'createForm']);
            Route::post('/create',[DataFinancialController::class,'create']);
            Route::get('/changeUpdate',[DataFinancialController::class,'changeUpdate']);
            Route::post('/edit',[DataFinancialController::class,'edit']);
            Route::post('/delete',[DataFinancialController::class,'delete']);
            Route::post('/updateDataFinancial',[DataFinancialController::class,'updateDataFinancial']);
            Route::post('/upNdown',[DataFinancialController::class,'upNdown']);
        });
         //Quản trị quyền sủ dụng quản trị
         Route::prefix('/system/permision')->group(function () {
            //Handbook
            Route::get('/index', [PermisionController::class, 'index']);
            Route::get('/loadList',[PermisionController::class,'loadList']);
            Route::post('/createForm',[PermisionController::class,'createForm']);
            Route::post('/create',[PermisionController::class,'create']);
            Route::get('/changeUpdate',[PermisionController::class,'changeUpdate']);
            Route::post('/edit',[PermisionController::class,'edit']);
            Route::post('/delete',[PermisionController::class,'delete']);
            Route::post('/updateDataFinancial',[PermisionController::class,'updateDataFinancial']);
        });
        Route::prefix('/system')->group(function () {
            Route::get('/userInfo/changePass', [UserController::class,'changePass']);
            Route::post('/userInfo/updatePass', [UserController::class,'updatePass']);
    
            // quản trị danh mục - thể loại
            Route::prefix('/category')->group(function () {
                //Danh mục
                Route::post('/createForm',[CateController::class,'createForm']);
                Route::post('/create',[CateController::class,'create']);
                Route::post('/edit',[CateController::class,'edit']);
                Route::post('/delete',[CateController::class,'delete']);
                Route::get('/index', [CateController::class, 'index']);
                Route::get('/loadList',[CateController::class,'loadList']);
                Route::post('/updateCategory',[CateController::class,'updateCategory']);
                Route::post('/changeStatusCate',[CateController::class,'changeStatusCate']);
                //thể loại
                Route::get('/indexCategory', [CategoryController::class, 'indexCategory']);
                Route::get('/loadListCategory',[CategoryController::class,'loadListCategory']);
                Route::post('/createFormCategory',[CategoryController::class,'createFormCategory']);
                Route::post('/createCategory',[CategoryController::class,'createCategory']);
                Route::post('/editCategory',[CategoryController::class,'edit']);
                Route::post('/deleteCategory',[CategoryController::class,'delete']);
                Route::post('/updateCategoryCate',[CategoryController::class,'updateCategoryCate']);
                Route::post('/changeStatusCategoryCate',[CategoryController::class,'changeStatusCategoryCate']);
            });
            // quản trị Danh mục V.I.P
            Route::prefix('/recommended')->group(function () {
                //Danh mục V.I.P
                Route::get('/index', [RecommendedController::class, 'index']);
                Route::post('/add',[RecommendedController::class,'add']);
                Route::post('/create',[RecommendedController::class,'create']);
                Route::post('/edit',[RecommendedController::class,'edit']);
                Route::post('/delete',[RecommendedController::class,'delete']);
                Route::get('/loadList',[RecommendedController::class,'loadList']);
                Route::post('/updateColumn',[RecommendedController::class,'updateColumn']);
                Route::post('/changeStatus',[RecommendedController::class,'changeStatus']);
                Route::post('/upNdown',[RecommendedController::class,'upNdown']);

            });
            Route::prefix('/effectiveness')->group(function () {
                // Hiệu quả danh mục
                Route::get('/index', [EffectiveController::class, 'index']);
                Route::post('/add',[EffectiveController::class,'add']);
                Route::post('/create',[EffectiveController::class,'create']);
                Route::post('/edit',[EffectiveController::class,'edit']);
                Route::post('/delete',[EffectiveController::class,'delete']);
                Route::get('/loadList',[EffectiveController::class,'loadList']);
                Route::post('/updateColumn',[EffectiveController::class,'updateColumn']);
                Route::post('/changeStatus',[EffectiveController::class,'changeStatus']);
            });
            //bài viết 
            Route::prefix('/blog')->group(function () {
                Route::get('/index', [BlogController::class, 'index']);
                Route::get('/loadList',[BlogController::class,'loadList']);
                Route::post('/edit', [BlogController::class,'edit']);
                Route::post('/createForm', [BlogController::class,'createForm']);
                Route::post('/create', [BlogController::class,'create']);
                Route::post('/delete', [BlogController::class,'delete']);
                Route::get('/infor',[BlogController::class,'infor']);
                Route::post('/uploadFileCK',[BlogController::class,'uploadFileCK']);
                Route::post('/changeStatus',[BlogController::class,'changeStatus']);
            });
            // 
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            //Cập nhật giao diện sáng tối
            Route::get('/userInfo/index', [UserController::class, 'indexUserInfo'])->name('userInfoIndex');
            Route::post('/userInfo/editColorView', [UserController::class, 'editColorView']);
            // Trang chủ Admin
            Route::prefix('/home')->group(function () {
                Route::get('/index', [HomeController::class, 'index']);
                Route::get('/loadList',[HomeController::class,'loadList']);
                Route::get('/loadListTap1',[HomeController::class,'loadListTap1'])->name('loadListTap1');
                Route::get('/realTimeData',[HomeController::class,'realTimeData'])->name('realTimeData');
            });
            //Cẩm nâng
            Route::prefix('/handbook')->group(function () {
                //Handbook
                Route::get('/index', [HandbookController::class, 'index']);
                Route::get('/loadList',[HandbookController::class,'loadList'])->name('loadList');
                Route::post('/createForm',[HandbookController::class,'createForm']);
                Route::post('/create',[HandbookController::class,'create'])->name('create');
                Route::post('/edit',[HandbookController::class,'edit'])->name('edit');
                Route::post('/delete',[HandbookController::class,'delete'])->name('delete');
                Route::get('/seeVideo',[HandbookController::class,'seeVideo'])->name('seeVideo');
            });
            //Tín hiệu mua
            Route::prefix('signal')->group(function(){
                Route::get('index', [SignalController::class, 'index']);
                Route::post('loadList', [SignalController::class, 'loadList']);

                //pass
                Route::get('indexPass', [SignalController::class, 'indexPass']);
                Route::post('loadListPass', [SignalController::class, 'loadListPass']);


                Route::get('create', [SignalController::class, 'create']);
                Route::get('edit', [SignalController::class, 'edit']);
                Route::post('update', [SignalController::class, 'update']);
                Route::post('delete', [SignalController::class, 'delete']);
                Route::post('updateSignal', [SignalController::class, 'updateSignal']);
                Route::post('changeStatusSignal', [SignalController::class, 'changeStatusSignal']);
            });
            Route::prefix('signalpass')->group(function(){
                Route::get('index', [SignalController::class, 'indexPass']);
                Route::post('loadList', [SignalController::class, 'loadListPass']);
                Route::get('create', [SignalController::class, 'create']);
                Route::get('edit', [SignalController::class, 'edit']);
                Route::post('update', [SignalController::class, 'update']);
                Route::post('delete', [SignalController::class, 'delete']);
                Route::post('updateSignal', [SignalController::class, 'updateSignal']);
                Route::post('changeStatusSignal', [SignalController::class, 'changeStatusSignal']);
            });
            //Tín hiệu mua
            Route::prefix('approvepayment')->group(function(){
                Route::get('index', [ApprovePaymentController::class, 'index']);
                Route::post('loadList', [ApprovePaymentController::class, 'loadList']);
                Route::get('create', [ApprovePaymentController::class, 'create']);
                Route::get('edit', [ApprovePaymentController::class, 'edit']);
                Route::post('update', [ApprovePaymentController::class, 'update']);
                Route::post('delete', [ApprovePaymentController::class, 'delete']);
                Route::post('updateApprovePayment', [ApprovePaymentController::class, 'updateApprovePayment']);
                Route::post('changeStatusApprovePayment', [ApprovePaymentController::class, 'changeStatusApprovePayment']);
                Route::get('getUserVIP', [ApprovePaymentController::class, 'getUserVIP']);
            });
            
            // Backup data
            Route::prefix('/backupdata')->group(function () {
                //Danh mục
                Route::get('/index', [BackupDataController::class, 'index']);
                Route::get('/loadList',[BackupDataController::class,'loadList']);
                Route::post('/exportSQL',[BackupDataController::class,'exportSQL']);
                Route::post('/exportEXCEL',[BackupDataController::class,'exportEXCEL']);
            });
            // Kiểm soát đăng nhập
            Route::prefix('/userlog')->group(function () {
                //Danh mục
                Route::get('/index', [UserLogController::class, 'index']);
                Route::post('/loadList',[UserLogController::class,'loadList']);
                Route::get('/view',[UserLogController::class,'view']);
                // Route::post('/edit',[UserLogController::class,'edit']);
                // Route::post('/delete',[UserLogController::class,'delete']);
                // Route::post('/updateCategory',[UserLogController::class,'updateCategory']);
                // Route::post('/changeStatusCate',[UserLogController::class,'changeStatusCate']);
            });
             //quản trị data
             Route::prefix('/sql')->group(function () {
                //Hospital
                Route::get('/index', [SqlController::class, 'index']);
                Route::get('/loadList',[SqlController::class,'loadList']);
                Route::get('/create',[SqlController::class,'add']);
                Route::post('/update',[SqlController::class,'update']);
                Route::post('/delete',[SqlController::class,'delete']);
            });
        });
    });
});


Route::get('/', [ClientHomeController::class, 'index']);
// route phía người dùng
Route::prefix('/client')->group(function () {
    $arrModules = config('menuClient');
        $this->arrModules = $arrModules;
    view()->composer('*', function ($view) {
        $view->with('menuItems', $this->arrModules);
    });
   
    // Trang chủ client
    Route::get('/home/index', [ClientHomeController::class, 'index']);
    Route::get('/home/loadList',[ClientHomeController::class,'loadList']);
    Route::get('/home/loadListBlog',[ClientHomeController::class,'loadListBlog']);
    Route::get('/home/loadListTap1',[ClientHomeController::class,'loadListTap1']);
    Route::get('/home/loadListTop',[ClientHomeController::class,'loadListTop']);
    Route::get('/home/loadListChartNen',[ClientHomeController::class,'loadListChartNen']);
    Route::middleware('permissionCheckLoginClient')->group(function () {
        Route::get('introduce/index', [IntroduceController::class, 'index']);
        Route::prefix('infor')->group(function(){
            Route::get('/index', [InforController::class, 'index']);
            Route::post('update', [InforController::class, 'update']);
            Route::post('loadList', [InforController::class, 'loadList']);
            Route::post('updateCustomer', [InforController::class, 'updateCustomer']);
            Route::get('/changePass', [UserController::class,'changePass']);
            Route::post('/updatePass', [UserController::class,'updatePass']);
            Route::post('/uploadAvatar', [InforController::class,'uploadAvatar']);
            Route::get('/viewFormContact', [InforController::class, 'viewFormContact']);

        });
            Route::prefix('datafinancial')->group(function () {
                // Tra cứu cổ phiếu
                Route::get('/index', [ClientDataFinancialController::class, 'index']);
                Route::post('/loadData', [ClientDataFinancialController::class, 'loadData']);
                Route::post('/fireAntChart', [ClientDataFinancialController::class, 'fireAntChart']);
                // Route::middleware('checkloginDatafinancial')->group(function () {
                    Route::post('/searchDataCP', [ClientDataFinancialController::class, 'searchDataCP']);
                // });
                Route::get('/noteTaFa', [ClientDataFinancialController::class, 'noteTaFa']);
                // tín hiệu mua
                Route::get('/signalIndex', [ClientDataFinancialController::class, 'signalIndex']);
                Route::post('/loadList_signal', [ClientDataFinancialController::class, 'loadList_signal']);
                // Tín Hiệu V.I.P
                Route::get('/recommendationsIndex', [ClientDataFinancialController::class, 'recommendationsIndex']);
                Route::post('/loadList_recommendations', [ClientDataFinancialController::class, 'loadList_recommendations']);
                Route::post('/loadList_recommendations_tab', [ClientDataFinancialController::class, 'loadList_recommendations_tab']);

                
                // Danh mục Fintop
                Route::get('/categoryFintopIndex', [ClientDataFinancialController::class, 'categoryFintopIndex']);
                Route::post('/loadList_categoryFintop_vip', [ClientDataFinancialController::class, 'loadList_categoryFintop_vip']);
                Route::post('/loadList_categoryFintop_basic', [ClientDataFinancialController::class, 'loadList_categoryFintop_basic']);
            });

        Route::prefix('about')->group(function () {
            // báo cáo phân tích
            Route::get('/index', [AboutController::class, 'index']);
            Route::get('/loadListTHTT', [AboutController::class, 'loadListTHTT']);
            Route::get('/loadMore', [AboutController::class, 'loadMore']);
            Route::prefix('/session')->group(function(){
                Route::get('', [AboutController::class, 'session']);
                Route::get('/loadListTKP', [AboutController::class, 'loadListTKP']);
            });
            Route::prefix('/industry')->group(function(){
                Route::get('', [AboutController::class, 'industry']);
                Route::get('/loadListPTN', [AboutController::class, 'loadListPTN']);
            });
            Route::prefix('/stock')->group(function(){
                Route::get('', [AboutController::class, 'stock']);
                Route::get('/loadListPTDN', [AboutController::class, 'loadListPTDN']);
            });
            Route::get('/reader/{id}', [AboutController::class, 'reader']);
        });
        // Thư viện đầu tư
        Route::get('/library/index', [LibraryController::class, 'index']);
        Route::get('/library/loadList',[LibraryController::class,'loadList']);
        Route::get('/library/seeVideo',[LibraryController::class,'seeVideo']);
        // Đặc quyền hội viên
        Route::get('/privileges/index', [PrivilegesController::class, 'index']);

        // Nâng cấp tk 
        Route::get('/upgradeAcc/index', [UpgradeAccController::class, 'index']);
        Route::get('/upgradeAcc/viewForm', [UpgradeAccController::class, 'registerVip']);
        Route::get('/upgradeAcc/viewInfo', [UpgradeAccController::class, 'viewInfo']);
        Route::get('/upgradeAcc/viewFormContact', [UpgradeAccController::class, 'viewFormContact']);
        Route::get('/upgradeAcc/viewFormContact_zalo', [UpgradeAccController::class, 'viewFormContact_zalo']);
        Route::post('/upgradeAcc/updateVip', [UpgradeAccController::class, 'updateVip']);

        // Đọc thông báo
        Route::get('readNotification', [ReadNotificationController::class, 'readNotification']);
    });
    
    Route::prefix('des')->group(function () {
        Route::get('index', [DesController::class, 'index']);
        Route::get('list', [DesController::class, 'list']);
        Route::get('reader', [DesController::class, 'reader']);
    });
});
 
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/test/{userInfo_id}', [App\Http\Controllers\HomeController::class, 'editTest']);

