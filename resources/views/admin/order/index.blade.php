@extends('admin.layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')

@stop('stylesheet')

@section('content')


<div class="row">
                <div class="col-md-12">
                <form action="{{url('api/user_search')}}" method="GET" enctype="multipart/form-data">
                          {{ csrf_field() }}
                <div class="form-group">
                @error('search')
                <div class="alert alert-danger" role="alert">
                {{ $message }}
                  </div>
                @enderror
                    <div class="input-group">
                      <input type="text" class="form-control" name="search" placeholder="ค้นหาชื่อผู้ใช้งาน" >
                      <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="submit">Search</button>
                      </div>
                    </div>
                  </div>
                  </form>

                  <a href="{{ url('admin/order/create') }}" class="btn btn-success btn-fw" style="float:right"><i class="icon-plus"></i>เพิ่ม Orders</a>
                  <br /><br />
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Orders ทั้งหมด</h4>

                      <div class="table-responsive">


                      <table class="table">
                        <thead>

                          <tr>
                            <th>#</th>
                            <th>ผู้ใช้</th>
                            <th>ชื่อแพ็คเกจ</th>
                            <th>Broker</th>
                            <th>เหลือ</th>
							              <th>สถานะ</th>
                            <th>ดำเนินการ</th>
                          </tr>
                        </thead>
                        <tbody>
                      
						@if(isset($objs))
                      @foreach($objs as $u)
                         
                          <tr>
                          <td> {{$u->order_id}}</td>
                            <td>
                            <img src="{{ url('assets/img/avatar/'.$u->avatar) }}" alt="profile"/> {{$u->name_u}} 
                            </td>
                            <td>
                              {{$u->name_p}}
                            </td>
                            <td>
                              {{$u->name_b}}
                            </td>
                            <td>
                            {{$u->total}} วัน
                            </td>
                            <td>
                              @if($u->status_x == 0)
                               <label class="badge badge-warning">รอการตรวจสอบ</label>
                              @elseif($u->status_x == 1)
                               <label class="badge badge-success">พร้อมใช้งาน</label>
                               @elseif($u->status_x == 2)
                               <label class="badge badge-success">หมดอายุ</label>
                              @else
                               <label class="badge badge-danger">ปิดการใช้งาน</label>
                              @endif
                            </td>
							
                            <td>
                              <a href="{{ url('admin/order/'.$u->id_q.'/edit') }}" class="btn btn-outline-primary btn-sm">แก้ไข</a>
                              <a href="{{ url('api/del_order/'.$u->id_q) }}" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-sm">ลบ</a>
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



@endsection

@section('scripts')




@stop('scripts')