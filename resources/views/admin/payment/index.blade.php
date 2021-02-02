@extends('admin.layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')

@stop('stylesheet')

@section('content')



<div class="row">
                
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">บทความทั้งหมด</h4>

                      <div class="table-responsive">


                      <table class="table">
                        <thead>

                          <tr>
                          <th>วันที่</th>
                            <th>#order id</th>
                            <th>ลูกค้า</th>
                            <th>ประเภทโอน</th>
                            <th>ยอดโอน</th>
                            <th>สถานะ เช็ค</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                      
						@if(isset($objs))
                      @foreach($objs as $u)
                          <tr access_id="{{$u->id}}">
                          <td>
                            #{{$u->day_tran}} : {{$u->time_tran}}
                            </td>
                            <td>
                                {{$u->order_id_c}}
                            </td>
                            <td>
                                {{$u->name_c}}
                            </td>

                            <td>
                                โอนผ่านบัญชีธนาคาร
                            </td>
                            <td>
                            {{$u->money_c}}
                            </td>
                            <td>
                              <div class="form-check form-check-flat">
                              <label class="form-check-label">
                                <input class="checkbox" type="checkbox" @if($u->c_status == 1)
                                  checked="checked"
                                  @endif>
                                ปิด / เปิด
                              </label>
                            </div>
                            <td>
                              <a data-toggle="modal" data-target="#exampleModal-{{$u->id}}" class="btn btn-outline-primary btn-sm">ดูข้อมูล</a>
                              <a href="{{ url('api/del_pay/'.$u->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-sm">ลบ</a>
                            </td>
                          </tr>

                          

                          @endforeach
                          @endif


                        </tbody>
                      </table>
                      </div>
					  {{ $objs->links() }}
                    </div>
                  </div>
                </div>


              </div>
@if(isset($objs))
                      @foreach($objs as $u)
              <div class="modal fade" id="exampleModal-{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{$u->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel-{{$u->id}}">ข้อมูล แจ้งชำระเงิน</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                
                                
                                <div class="modal-body table-responsive">
                              <table class="table table-hover">

                                <tbody>
                                  <tr>
                                    <td>หมายเลขสั่งซื้อ</td>
                                    <td>{{$u->order_id_c}}</td>
                                  </tr>
                                  <tr>
                                    <td>ชื่อ-นามสกุล</td>
                                    <td>{{$u->name_c}}</td>
                                  </tr>
                                  <tr>
                                    <td>อีเมล</td>
                                    <td>{{$u->email_c}}</td>
                                  </tr>
                                  <tr>
                                    <td>เบอร์ติดต่อ</td>
                                    <td>{{$u->phone_c}}</td>
                                  </tr>
                                  <tr>
                                    <td>ยอดโอน</td>
                                    <td>{{$u->money_c}}</td>
                                  </tr>

                                  <tr>
                                    <td>วัน-เวลาที่โอน</td>
                                    <td>{{$u->day_tran}} {{$u->time_tran}}</td>
                                  </tr>


                                  <tr>
                                    
                                    <td colspan="3"><img class="img-responsive" src="{{url('img/slip/'.$u->image)}}" style="width:100%;border-radius: 0%;height:400px;"></td>
                                  </tr>

                                  <tr>
                                    <td>หมายเหตุ</td>
                                    <td>{{$u->re_mark}}</td>
                                  </tr>


                                </tbody>
                              </table>
                            </div>
                                  
                            
                            </div>
                                <div class="modal-footer">
                                
                                <button type="button" class="btn btn-light" data-dismiss="modal">ปิดหน้าตาง</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- Modal Ends -->
                        @endforeach
                          @endif

@endsection

@section('scripts')

<script>

$(document).ready(function(){


	$("input.checkbox").change(function(event) {

	var course_id = $(this).closest('tr').attr('access_id');

	console.log('fea : '+course_id);
	$.ajax({
					type:'POST',
					url:'{{url('api/pay_status')}}',
					headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
					data: { "user_id" : course_id },
					success: function(data){
						if(data.data.success){


              $.toast({
                heading: 'Success',
                text: 'ระบบทำการแก้ไขข้อมูลให้แล้ว.',
                showHideTransition: 'slide',
                icon: 'success',
                loaderBg: '#f96868',
                position: 'top-right'
              })



						}
					}
			});
	});

  	});






</script>


@stop('scripts')