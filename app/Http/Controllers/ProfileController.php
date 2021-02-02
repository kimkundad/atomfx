<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\package;
use App\order;
use Auth;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add_my_package($id)
    {
        $objs = package::find($id);

        $broker = DB::table('brokers')
                ->where('status', 1)
                ->get();

        $data['broker'] = $broker;

    

        $data['objs'] = $objs;
        return view('add_my_package', $data);
    }

    public function my_dashboard(){

        $objs = DB::table('orders')->select(
            'orders.*',
            'orders.id as id_q',
            'orders.created_at as create',
            'orders.status as status_x',
            'users.*',
            'users.name as name_u',
            'packages.*',
            'packages.name as name_p',
            'brokers.*',
            'brokers.name as name_b',
            'brokers.image as image_b'
            )
            ->leftjoin('users', 'users.id',  'orders.user_id')
            ->leftjoin('packages', 'packages.id',  'orders.package_id')
            ->leftjoin('brokers', 'brokers.id',  'orders.broker_id')
            ->where('users.id', Auth::user()->id)
            ->Orderby('orders.id', 'desc')
            ->get();

            $data['objs'] = $objs;

        return view('profile.dashboard', $data);
    }


    public function submit_edit_package(Request $request){

        $secret="6LdBOl8UAAAAAM-iNnghy4tPxFpCOPG6J1Hg8xLu";
    //  $response = $request['captcha'];

      $captcha = "";
      if (isset($request["g-recaptcha-response"]))
        $captcha = $request["g-recaptcha-response"];

    //  $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
      $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);
      //$captcha_success=json_decode($verify);

      $this->validate($request, [
        'cardType' => 'required',
        'email' => 'required',
        'pack_id' => 'required',
        'account' => 'required',
        'order_id' => 'required'
    ]);

    if($response["success"] == false) {

        return redirect(url('edit_my_package/'.$request['order_id']))->with('reject_data','คุณทำการเพิ่มอสังหา สำเร็จ');

    }else{
        $id = $request['order_id'];
        $package = order::find($id);
        $package->broker_id = $request['cardType'];
        $package->email_ac = $request['email'];
        $package->account_ac = $request['account'];
        $package->save();

      return redirect(url('my_dashboard'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    }

    public function submit_package(Request $request){

        $secret="6LdBOl8UAAAAAM-iNnghy4tPxFpCOPG6J1Hg8xLu";
    //  $response = $request['captcha'];

      $captcha = "";
      if (isset($request["g-recaptcha-response"]))
        $captcha = $request["g-recaptcha-response"];

    //  $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
      $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);
      //$captcha_success=json_decode($verify);

      //  dd($request->all());
        $this->validate($request, [
            'cardType' => 'required',
            'email' => 'required',
            'pack_id' => 'required',
            'account' => 'required'
        ]);

        if($response["success"] == false) {

            return redirect(url('add_my_package/'.$request['pack_id']))->with('reject_data','คุณทำการเพิ่มอสังหา สำเร็จ');
    
          }else{

      $package = new order();
      $package->order_id = 'AT-'.(\random_int(1000, 9999)).'-'.(\random_int(1000, 9999)).'-'.(\random_int(1000, 9999));
      $package->user_id = Auth::user()->id;
      $package->package_id = $request['pack_id'];
      $package->broker_id = $request['cardType'];
      $package->email_ac = $request['email'];
      $package->account_ac = $request['account'];
      $package->save();

      return redirect(url('my_dashboard'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

          }

    }


    public function del_my_package($id){

        DB::table('orders')
        ->where('user_id', Auth::user()->id)
        ->where('id', $id)
        ->delete();

        return redirect(url('my_dashboard'))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }


    public function edit_my_package($id){

        $broker = DB::table('brokers')
                ->where('status', 1)
                ->get();

        $data['broker'] = $broker;

        $count = DB::table('orders')->select(
            'orders.*',
            'orders.id as id_q',
            'orders.created_at as create',
            'orders.status as status_x',
            'users.*',
            'users.name as name_u',
            'packages.*',
            'packages.name as name_p',
            'packages.id as id_p',
            'brokers.*',
            'brokers.name as name_b',
            'brokers.image as image_b'
            )
            ->leftjoin('users', 'users.id',  'orders.user_id')
            ->leftjoin('packages', 'packages.id',  'orders.package_id')
            ->leftjoin('brokers', 'brokers.id',  'orders.broker_id')
            ->where('users.id', Auth::user()->id)
            ->where('orders.id', $id)
            ->count();

            if($count > 0){

                $objs = DB::table('orders')->select(
                    'orders.*',
                    'orders.id as id_q',
                    'orders.created_at as create',
                    'orders.status as status_x',
                    'users.*',
                    'users.name as name_u',
                    'packages.*',
                    'packages.name as name_p',
                    'packages.id as id_p',
                    'brokers.*',
                    'brokers.name as name_b',
                    'brokers.id as id_b',
                    'brokers.image as image_b'
                    )
                    ->leftjoin('users', 'users.id',  'orders.user_id')
                    ->leftjoin('packages', 'packages.id',  'orders.package_id')
                    ->leftjoin('brokers', 'brokers.id',  'orders.broker_id')
                    ->where('users.id', Auth::user()->id)
                    ->where('orders.id', $id)
                    ->first();
        
                    $data['objs'] = $objs;
        
                return view('profile.edit_package', $data);

            }else{
                return view('error.404');
            }

        

    }
}
