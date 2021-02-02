<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\blog;
use App\bank_payment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slide = DB::table('slides')
        ->Where('status', 1)
        ->Orderby('id', 'desc')
        ->get();

        $data['slide'] = $slide;

       

        $blog = DB::table('categories')
        ->where('id', '!=', 1)
        ->get();

            foreach ($blog as $obj) {

              $count = DB::table('blogs')
                  ->where('type', $obj->id)
                  ->count();

                $obj->count = $count;
             
                $options = DB::table('blogs')
                  ->where('type', $obj->id)
                  ->get();

                $obj->option = $options;
              }
             // dd($blog);
              $data['blog'] = $blog;

        $pack = DB::table('packages')
        ->Orderby('id', 'desc')
        ->limit(3)
        ->get();

        $data['pack'] = $pack;

        return view('welcome', $data);
    }


    public function post_confirm_payment(Request $request){

      $image = $request->file('image');

      //dd($request->all());
      $this->validate($request, [
           'image' => 'required|max:8048',
           'name_c' => 'required',
           'email_c' => 'required',
           'phone_c' => 'required',
           'money_c' => 'required',
           'day_tran' => 'required',
           'order_id_c' => 'required'
       ]);


       $check = DB::table('orders')
       ->where('order_id', $request['order_id_c'])
       ->count();

       if($check > 0){

         $get_code = DB::table('orders')
         ->where('order_id', $request['order_id_c'])
         ->first();

         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

         $img = Image::make($image->getRealPath());
         $img->resize(800, 800, function ($constraint) {
         $constraint->aspectRatio();
       })->save('img/slip/'.$input['imagename']);

       $input['imagename_small'] = time().'_small.'.$image->getClientOriginalExtension();

        $img = Image::make($image->getRealPath());
        $img->resize(240, 240, function ($constraint) {
        $constraint->aspectRatio();
      })->save('img/slip/'.$input['imagename_small']);

         $package = new bank_payment();
          $package->order_id_c = $request['order_id_c'];
          $package->name_c = $request['name_c'];
          $package->email_c = $request['email_c'];
          $package->phone_c = $request['phone_c'];
          $package->bank = $request['bank'];
          $package->image = $input['imagename'];
          $package->money_c = $request['money_c'];
          $package->day_tran = $request['day_tran'];
          $package->time_tran = $request['time_tran'];
          $package->re_mark = $request['re_mark'];
          $package->save();



          $message = $request['name_c']." ได้ทำการแจ้งชำระเงินมาที่ Order ID : ".$request['order_id_c']." เบอร์ : ".$request['phone_c'];


              $image_thumbnail_url = url('img/slip/'.$input['imagename_small']);  // max size 240x240px JPEG
              $image_fullsize_url = url('img/slip/'.$input['imagename']); //max size 1024x1024px JPEG
              $imageFile = 'copy/240.jpg';
              $sticker_package_id = '';  // Package ID sticker
              $sticker_id = '';    // ID sticker

              $message_data = array(
              'imageThumbnail' => $image_thumbnail_url,
              'imageFullsize' => $image_fullsize_url,
              'message' => $message,
              'imageFile' => $imageFile,
              'stickerPackageId' => $sticker_package_id,
              'stickerId' => $sticker_id
              );

            $lineapi = 'IRiZbKU5DCvEF6HxEvGnKCD5hvLgYitFM0roVALMye8';

            $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$lineapi );
            $mms =  trim($message);
            $chOne = curl_init();
            curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
            curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($chOne, CURLOPT_POST, 1);
            curl_setopt($chOne, CURLOPT_POSTFIELDS, $message_data);
            curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($chOne);
            if(curl_error($chOne)){
            echo 'error:' . curl_error($chOne);
            }else{
            $result_ = json_decode($result, true);
          //  echo "status : ".$result_['status'];
          //  echo "message : ". $result_['message'];
            }
            curl_close($chOne);



          return redirect(url('confirm_payment_success/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

       }else{
          return redirect(url('แจ้งการชำระเงิน/'))->with('error_confirm','คุณทำการเพิ่มอสังหา สำเร็จ');
       }




    }

    public function user_pay(){
      $data['obj'] = 'confirm_payment';
      return view('user_pay', $data);
    }

    public function confirm_payment_success(){
      $data['obj'] = 'confirm_payment';
      return view('confirm_payment_success', $data);
    }

    

    public function package(){
      $pack = DB::table('packages')
        ->Orderby('id', 'desc')
        ->limit(3)
        ->get();

        $data['pack'] = $pack;

        return view('package', $data);
    }

   

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function terms()
    {
        return view('terms');
    }

    public function blog(){

        $slide = DB::table('blogs')
                ->Orderby('view', 'desc')
                ->limit(5)
                ->get();

               // dd($objs);

        $data['slide'] = $slide;

        $objs = DB::table('blogs')
                ->Orderby('id', 'desc')
                ->paginate(15);

               // dd($objs);

        $data['objs'] = $objs;

        return view('blog', $data);

    }

    

    public function blog_post($id){
        $slide = DB::table('blogs')
                ->Orderby('view', 'desc')
                ->limit(5)
                ->get();

               // dd($objs);

        $data['slide'] = $slide;

        $pre = DB::table('blogs')->where('id', $id+1)->first();
        $next = DB::table('blogs')->where('id', $id-1)->first();
        $data['pre'] = $pre;
        $data['next'] = $next;
        
        $objs = DB::table('blogs')->where('id', $id)->first();

        DB::table('blogs')
            ->where('id', $id)
            ->update(['view' => $objs->view+1]);

        $data['objs'] = $objs;

        return view('blog_post', $data);
    }



    public function add_contact(Request $request){

        $secret="6LdBOl8UAAAAAM-iNnghy4tPxFpCOPG6J1Hg8xLu";
    //  $response = $request['captcha'];

      $captcha = "";
      if (isset($request["g-recaptcha-response"]))
        $captcha = $request["g-recaptcha-response"];

    //  $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
      $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);
      //$captcha_success=json_decode($verify);

    //  dd($captcha_success);

    if($response["success"] == false) {

        return response()->json([
          'data' => [
            'status' => 100,
            'msg' => 'This user was not verified by recaptcha.'
          ]
        ]);

      }else{



        $message = $request['name'].", ".$request['email'].", ".$request['subject'].", ข้อความ : ".$request['comments'];
        $lineapi = setting()->line_token;

        $mms =  trim($message);
        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=$mms");
        curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);
        if(curl_error($chOne)){
        echo 'error:' . curl_error($chOne);
        }else{
        $result_ = json_decode($result, true);
    //    echo "status : ".$result_['status'];
    //    echo "message : ". $result_['message'];
        }
        curl_close($chOne);

        return response()->json([
            'data' => [
              'status' => 200,
              'msg' => 'This user is verified by recaptcha.'
            ]
          ]);

            }


    }

    
}
