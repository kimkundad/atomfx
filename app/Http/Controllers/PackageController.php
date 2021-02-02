<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\package;
use Auth;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = DB::table('packages')
                ->Orderby('id', 'desc')
                ->paginate(15);

        $data['objs'] = $objs;
        return view('admin.package.index', $data);
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
        $data['url'] = url('admin/package');
        return view('admin.package.create', $data);
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
        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'type' => 'required'
        ]);

      $package = new package();
      $package->name = $request['name'];
      $package->detail = $request['detail'];
      $package->price = $request['price'];
      $package->type = $request['type'];
      $package->text_1 = $request['text_1'];
      $package->text_2 = $request['text_2'];
      $package->text_3 = $request['text_3'];
      $package->text_4 = $request['text_4'];
      $package->text_5 = $request['text_5'];
      $package->save();

      return redirect(url('admin/package/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

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
        $objs = package::find($id);

        $data['url'] = url('admin/package/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.package.edit', $data);
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

        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'type' => 'required'
        ]);

      $package = package::find($id);
      $package->name = $request['name'];
      $package->detail = $request['detail'];
      $package->price = $request['price'];
      $package->type = $request['type'];
      $package->text_1 = $request['text_1'];
      $package->text_2 = $request['text_2'];
      $package->text_3 = $request['text_3'];
      $package->text_4 = $request['text_4'];
      $package->text_5 = $request['text_5'];
      $package->save();

      return redirect(url('admin/package/'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_package($id)
    {
        //

        DB::table('packages')->where('id', $id)->delete();

        return redirect(url('admin/package'))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }
}
