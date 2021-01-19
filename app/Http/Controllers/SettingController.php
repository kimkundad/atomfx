<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\setting;
use Auth;

class SettingController extends Controller
{
    //
        public function setting(){

            $objs = DB::table('settings')
                ->Where('id', 1)
                ->first();

            $data['objs'] = $objs;
            return view('admin.setting.index', $data);

        }
        
        public function post_setting(Request $request){

            $image = $request->file('image');
            $id = 1;
            $obj = setting::find($id);
            $obj->nme_website = $request['nme_website'];
            $obj->facebook = $request['facebook'];
            $obj->facebook_url = $request['facebook_url'];
            $obj->twitter = $request['twitter'];
            $obj->facebook_title = $request['facebook_title'];
            $obj->facebook_detail = $request['facebook_detail'];
            $obj->line_oa = $request['line_oa'];
            $obj->line_oa_url = $request['line_oa_url'];
            $obj->line_token = $request['line_token'];
            $obj->phone = $request['phone'];
            $obj->email = $request['email'];
            $obj->google_analytic = $request['google_analytic'];
            $obj->save();

           if($image != NULL){

           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
           $img = Image::make($image->getRealPath());
           $img->resize(800, 800, function ($constraint) {
           $constraint->aspectRatio();
           })->save('img/setting/'.$input['imagename']);

            $obj = setting::find($id);
            $obj->facebook_image = $input['imagename'];
            $obj->save();

            }

            return redirect(url('admin/setting/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

        }
        
}
