<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\blog;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $objs = DB::table('blogs')
                ->Orderby('id', 'desc')
                ->paginate(15);

        $data['objs'] = $objs;
        return view('admin.blog.index', $data);
    }


    public function blog_index(){
      $objs = DB::table('blogs')
      ->Orderby('id', 'desc')
      ->paginate(15);

      $data['objs'] = $objs;
      return view('admin.blog.blog_index', $data);
    }

    public function blog_status(Request $request){

      //  dd($request->all());
  
        $user = blog::findOrFail($request->user_id);
  
                if($user->status == 1){
                    $user->status = 0;
                } else {
                    $user->status = 1;
                }
  
        return response()->json([
        'data' => [
          'success' => $user->save(),
        ]
      ]);
  
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['method'] = "post";
        $data['url'] = url('admin/blog');
        return view('admin.blog.create', $data);
    }

    public function upload_img(Request $request){

        $image = $request->file('image');
        $pathaa = 'img/all_image/';
              $filename = time()."-".$image->getClientOriginalName();
              $image->move($pathaa, $filename);

        echo url('img/all_image/'.$filename);
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $image = $request->file('image');

        $this->validate($request, [
             'image' => 'required',
             'title' => 'required',
             'detail' => 'required',
             'type' => 'required'
         ]);

         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
           $img = Image::make($image->getRealPath());
           $img->resize(1200, 1200, function ($constraint) {
           $constraint->aspectRatio();
         })->save('img/blog/'.$input['imagename']);

      $package = new blog();
      $package->title = $request['title'];
      $package->sub_title = $request['sub_title'];
      $package->detail = $request['detail'];
      $package->type = $request['type'];
      $package->image = $input['imagename'];
      $package->save();

      return redirect(url('admin/blog/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $objs = blog::find($id);

        $data['url'] = url('admin/blog/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.blog.edit', $data);

      

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $image = $request->file('image');

        $this->validate($request, [
             'title' => 'required',
             'detail' => 'required',
             'type' => 'required'
         ]);


      $package = blog::find($id);
      $package->title = $request['title'];
      $package->sub_title = $request['sub_title'];
      $package->detail = $request['detail'];
      $package->type = $request['type'];
      $package->save();

      if($image != NULL){

        $objs = DB::table('blogs')
               ->where('id', $id)
               ->first();

               if(isset($objs->image)){
                $file_path = 'img/blog/'.$objs->image;
                 unlink($file_path);
              }

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
           $img = Image::make($image->getRealPath());
           $img->resize(1200, 1200, function ($constraint) {
           $constraint->aspectRatio();
         })->save('img/blog/'.$input['imagename']);

         $package = blog::find($id);
          $package->image = $input['imagename'];
          $package->save();

      }

      return redirect(url('admin/blog/'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_blog($id)
    {
        //
        $objs = DB::table('blogs')
            ->where('id', $id)
            ->first();

            if(isset($objs->image)){
              $file_path = 'img/blog/'.$objs->image;
               unlink($file_path);
            }

             DB::table('blogs')->where('id', $id)->delete();

             return redirect(url('admin/blog'))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }
}
