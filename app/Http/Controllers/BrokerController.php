<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\broker;
use Auth;

class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = DB::table('brokers')
                ->Orderby('id', 'desc')
                ->paginate(15);

        $data['objs'] = $objs;
        return view('admin.broker.index', $data);
    }

    public function broker_status(Request $request){

        //  dd($request->all());
    
          $user = broker::findOrFail($request->user_id);
    
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
        $data['url'] = url('admin/broker');
        return view('admin.broker.create', $data);
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
             'name' => 'required',
             'url' => 'required'
         ]);

         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
           $img = Image::make($image->getRealPath());
           $img->resize(400, 400, function ($constraint) {
           $constraint->aspectRatio();
         })->save('img/broker/'.$input['imagename']);

      $package = new broker();
      $package->name = $request['name'];
      $package->url = $request['url'];
      $package->detail = $request['detail'];
      $package->image = $input['imagename'];
      $package->save();

      return redirect(url('admin/broker/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
        $objs = broker::find($id);

        $data['url'] = url('admin/broker/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.broker.edit', $data);
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
            'name' => 'required',
            'url' => 'required'
        ]);


      $package = broker::find($id);
      $package->name = $request['name'];
      $package->url = $request['url'];
      $package->detail = $request['detail'];
      $package->save();

      if($image != NULL){

        $objs = DB::table('brokers')
               ->where('id', $id)
               ->first();

               if(isset($objs->image)){
                $file_path = 'img/broker/'.$objs->image;
                 unlink($file_path);
              }

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
           $img = Image::make($image->getRealPath());
           $img->resize(400, 400, function ($constraint) {
           $constraint->aspectRatio();
         })->save('img/broker/'.$input['imagename']);

         $package = broker::find($id);
          $package->image = $input['imagename'];
          $package->save();

      }

      return redirect(url('admin/broker/'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_broker($id)
    {
        //

        $objs = DB::table('brokers')
            ->where('id', $id)
            ->first();

            if(isset($objs->image)){
              $file_path = 'img/broker/'.$objs->image;
               unlink($file_path);
            }

             DB::table('brokers')->where('id', $id)->delete();

             return redirect(url('admin/broker'))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }
}
