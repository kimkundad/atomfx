<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\bank_payment;

class PaymentsController extends Controller
{
    //
    public function index()
    {
        //
      //  $objs = bank_payment::all();

        $objs = DB::table('bank_payments')
            ->orderby('id', 'desc')
            ->paginate(15);

        $data['objs'] = $objs;
        return view('admin.payment.index', $data);
    }

    public function pay_status(Request $request){
        //  dd($request->user_id);
        $user = bank_payment::findOrFail($request->user_id);
    
                  if($user->c_status == 1){
                      $user->c_status = 0;
                  } else {
                      $user->c_status = 1;
                  }
    
    
          return response()->json([
          'data' => [
            'success' => $user->save(),
          ]
        ]);
    
        }

        public function del_pay($id)
    {
        //
        $data_product = DB::table('bank_payments')
        ->where('id', $id)
        ->first();

        $file_path = 'img/slip/'.$data_product->image;
        unlink($file_path);

        DB::table('bank_payments')
        ->where('id', $id)
        ->delete();

        return redirect(url('admin/payment/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }

    
}
