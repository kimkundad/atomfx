<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\setting;
use App\head_image;
use Auth;

class DashboardController extends Controller
{
    //
    public function index(){

        $blog = DB::table('blogs')
                ->count();

                $view = DB::table('blogs')
                ->sum('view');

                $data['view'] = $view;
                $data['blog'] = $blog;

                $slide = DB::table('slides')
                ->count();

                $data['slide'] = $slide;

                $man = DB::table('users')
                ->count();
                $data['man'] = $man;


        return view('admin.dashboard.index', $data);
    }
    public function docs(){

        $objs = DB::table('settings')
                ->Where('id', 1)
                ->first();

            $data['objs'] = $objs;

        return view('admin.dashboard.docs', $data);
    }

    public function pics(){

        $objs = DB::table('head_images')
                ->Where('id', 1)
                ->first();

            $data['objs'] = $objs;

        return view('admin.dashboard.pics', $data);
    }

    public function post_docs(Request $request){

        $id = 1;
        $obj = setting::find($id);
        $obj->get_my_file = $request['get_my_file'];
        $obj->save();

        return redirect(url('admin/docs/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

   

    
}
