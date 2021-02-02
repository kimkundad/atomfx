@extends('admin.layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')

@stop('stylesheet')

@section('content')



<div class="row">
                <div class="col-md-12">
                  <a href="{{ url('admin/category/create') }}" class="btn btn-success btn-fw" style="float:right"><i class="icon-plus"></i>เพิ่มหมวดหมู่</a>
                  <br /><br />
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">บทความทั้งหมด</h4>

                      <div class="table-responsive">


                      <table class="table">
                        <thead>

                          <tr>
                          <th>#</th>
                            <th>ชื่อหมวดหมู่</th>
                            <th>จำนวนบทความ</th>
                            <th>วันที่สร้าง</th>
                            <th>จัดการ</th>
                          </tr>
                        </thead>
                        <tbody>
                      
						@if(isset($objs))
                      @foreach($objs as $u)
                          <tr>
                          <td>{{$u->id}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->options}}</td>
                            <td>{{$u->created_at}}</td>
                            <td>
                              <a href="{{ url('admin/category/'.$u->id.'/edit') }}" class="btn btn-outline-primary btn-sm">แก้ไข</a>
                              <a href="{{ url('api/del_category/'.$u->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-sm">ลบ</a>
                            </td>
                          </tr>
                          @endforeach
                          @endif


                        </tbody>
                      </table>
                      </div>
					 
                    </div>
                  </div>
                </div>


              </div>



@endsection

@section('scripts')




@stop('scripts')