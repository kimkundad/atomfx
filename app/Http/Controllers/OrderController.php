<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\broker;
use App\User;
use App\package;
use App\order;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'brokers.name as name_b'
                )
                ->leftjoin('users', 'users.id',  'orders.user_id')
                ->leftjoin('packages', 'packages.id',  'orders.package_id')
                ->leftjoin('brokers', 'brokers.id',  'orders.broker_id')
                ->Orderby('orders.id', 'desc')
                ->paginate(15);

        $data['objs'] = $objs;
        return view('admin.order.index', $data);
    }


    public function user_search(Request $request){

        $this->validate($request, [
            'search' => 'required'
          ]);
          $search = $request->get('search');

          $count = DB::table('users')->where('name', 'like', "%$search%")
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
                    'brokers.*',
                    'brokers.name as name_b'
                    )
                    ->leftjoin('users', 'users.id',  'orders.user_id')
                    ->leftjoin('packages', 'packages.id',  'orders.package_id')
                    ->leftjoin('brokers', 'brokers.id',  'orders.broker_id')
                    ->where('users.name', 'like', "%$search%")
                    ->get();
                    $data['objs'] = $objs;

            }else{
                $objs = null;
                $data['objs'] = $objs;
            }

            $data['search'] = $search;

          return view('admin.order.search', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = User::all();
        $data['user'] = $user;

        $package = package::all();
        $data['package'] = $package;

        $broker = broker::all();
        $data['broker'] = $broker;
        

        $data['method'] = "post";
        $data['url'] = url('admin/order');
        return view('admin.order.create', $data);
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
            'user_id' => 'required',
            'package_id' => 'required',
            'email_ac' => 'required',
            'account_ac' => 'required',
            'status' => 'required',
            'broker_id' => 'required'
        ]);

        $datediff = strtotime(($request['end'])) - strtotime(($request['start']));
        $days = floor($datediff / (60 * 60 * 24));

      $package = new order();
      $package->order_id = 'AT-'.(\random_int(1000, 9999)).'-'.(\random_int(1000, 9999)).'-'.(\random_int(1000, 9999));
      $package->user_id = $request['user_id'];
      $package->package_id = $request['package_id'];
      $package->broker_id = $request['broker_id'];
      $package->start = $request['start'];
      $package->end = $request['end'];
      $package->email_ac = $request['email_ac'];
      $package->account_ac = $request['account_ac'];
      $package->status = $request['status'];
      $package->detail = $request['detail'];
      $package->total = $days;
      $package->save();

      return redirect(url('admin/order/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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

        $user = User::all();
        $data['user'] = $user;

        $package = package::all();
        $data['package'] = $package;

        $broker = broker::all();
        $data['broker'] = $broker;

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
            'brokers.name as name_b'
            )
            ->leftjoin('users', 'users.id',  'orders.user_id')
            ->leftjoin('packages', 'packages.id',  'orders.package_id')
            ->leftjoin('brokers', 'brokers.id',  'orders.broker_id')
            ->where('orders.id', $id)
            ->first();

            //dd($objs);

        $data['url'] = url('admin/order/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.order.edit', $data);
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
            'user_id' => 'required',
            'package_id' => 'required',
            'email_ac' => 'required',
            'account_ac' => 'required',
            'status' => 'required',
            'broker_id' => 'required'
        ]);

        $datediff = strtotime(($request['end'])) - strtotime(($request['start']));
        $days = floor($datediff / (60 * 60 * 24));

      $package = order::find($id);
      $package->user_id = $request['user_id'];
      $package->package_id = $request['package_id'];
      $package->broker_id = $request['broker_id'];
      $package->start = $request['start'];
      $package->end = $request['end'];
      $package->email_ac = $request['email_ac'];
      $package->account_ac = $request['account_ac'];
      $package->status = $request['status'];
      $package->detail = $request['detail'];
      $package->total = $days;
      $package->save();

      return redirect(url('admin/order/'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_order($id)
    {
        //
        DB::table('orders')->where('id', $id)->delete();

             return redirect(url('admin/order'))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }
}
