<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\blog;

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

        $blog = DB::table('blogs')
        ->Orderby('id', 'desc')
        ->limit(3)
        ->get();

        $data['blog'] = $blog;

        return view('welcome', $data);
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
