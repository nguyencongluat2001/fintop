<?php

namespace Modules\Client\Page\Privileges\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;

/**
 * Đặc quyền hội viên FinTop 
 *
 * @author Luatnc
 */
class PrivilegesController extends Controller
{

    public function __construct(){
    }

    /**
     * load màn hình đặc quyền hội viên
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('client.privileges.index');
    }
}
