@extends('admin.layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')
<style>
.note-editor.note-frame .note-editing-area .note-editable {
    padding: 35px;
    overflow: auto;
    color: #000;
    background-color: #fff;
}
</style>
@stop('stylesheet')

@section('content')



<div class="row">

<div class="col-md-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">ข้อมูล broker</h4>
      <p class="card-description">
        กรอกข้อมูลให้ครบ ในส่วนที่มีเครื่องหมาย <span class="text-danger">*</span>
      </p>

      <form class="forms-sample" method="POST" action="{{$url}}" enctype="multipart/form-data">
        {{ method_field($method) }}
        {{ csrf_field() }}


        <div class="form-group">
          <label for="exampleInputUsername1">Order id </label>
          <input type="text" class="form-control" name="email_ac" value="{{ $objs->order_id }}">
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">จำนวนวันที่เหลือ </label>
          <input type="text" class="form-control" name="email_ac" value="{{ $objs->total }}">
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlSelect2">ผู้ใช้งาน <span class="text-danger">*</span></label>
            <select class="form-control" name="user_id">
                <option value="">เลือกผู้ใช้งาน</option>
                @if(isset($user))
                    @foreach($user as $u)
                        <option value="{{ $u->id }}" 
                        @if( $objs->user_id == $u->id)
                            selected='selected'
                        @endif >{{ $u->name }} ( {{ $u->email }} )</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect2">Package <span class="text-danger">*</span></label>
            <select class="form-control" name="package_id">
                <option value="">เลือก Package</option>
                @if(isset($package))
                    @foreach($package as $u)
                        <option value="{{ $u->id }}" 
                        @if( $objs->package_id == $u->id)
                            selected='selected'
                        @endif
                        >{{ $u->name }} ( {{ $u->price }} )</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect2">Broker <span class="text-danger">*</span></label>
            <select class="form-control" name="broker_id">
                <option value="">เลือก Broker</option>
                @if(isset($broker))
                    @foreach($broker as $u)
                        <option value="{{ $u->id }}" 
                        @if( $objs->broker_id == $u->id)
                            selected='selected'
                        @endif
                        >{{ $u->name }} </option>
                    @endforeach
                @endif
            </select>
        </div>

        <p class="card-description">วันที่เริ่มใช้งาน ( FREE ไม่ต้องใส่นะ )</p>
        <div id="datepicker-popup" class="input-group date datepicker">
            <input type="text" class="form-control" name="start" value="{{ $objs->start }}">
                <span class="input-group-addon input-group-append border-left">
                    <span class="icon-calendar input-group-text"></span>
                </span>
        </div>
        <br>


        <p class="card-description">วันที่สิ้นสุด ( FREE ไม่ต้องใส่นะ )</p>
        <div id="datepicker-popup2" class="input-group date datepicker">
            <input type="text" class="form-control" name="end" value="{{ $objs->end }}">
                <span class="input-group-addon input-group-append border-left">
                    <span class="icon-calendar input-group-text"></span>
                </span>
        </div>
        <br>



        <div class="form-group">
          <label for="exampleInputUsername1">Email ที่ใช้งาน <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="email_ac" value="{{ $objs->email_ac }}">
        </div>


        <div class="form-group">
          <label for="exampleInputUsername1">Account ที่ใช้งาน <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="account_ac" value="{{ $objs->account_ac }}">
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">รายละเอียด </label>
          <textarea class="form-control" rows="5" name="detail" >{{ $objs->detail }}</textarea>
        </div>


        <div class="form-group">
            <label for="exampleFormControlSelect2">สถานะการใช้งาน <span class="text-danger">*</span></label>
            <select class="form-control" name="status">
                <option value="">เลือกประเถท</option>
                <option value="0" 
                @if( $objs->status_x == 0)
                            selected='selected'
                        @endif
                        >รอการตรวจสอบ</option>
                <option value="1"
                @if( $objs->status_x == 1)
                            selected='selected'
                        @endif
                        >พร้อมใช้งาน</option>
                <option value="2"
                @if( $objs->status_x == 2)
                            selected='selected'
                        @endif
                        >หมดอายุ</option>
                <option value="3"
                @if( $objs->status_x == 3)
                            selected='selected'
                        @endif
                        >ปิดการใช้งาน</option>
            </select>
        </div>

    

        
        
        
        
        <br />


        <div style="text-align: right;">
        <br /><br /><br />
        <button type="submit" class="btn btn-primary mr-2">บันทึก</button>
        <button class="btn btn-light">ยกเลิก</button>
        </div>

      </form>
    </div>
  </div>
</div>

</div>



@endsection

@section('scripts')


<script>

$(document).ready(function() {

    $('#datepicker-popup').datepicker({
        format: 'yyyy-mm-dd',
      todayHighlight: true
    });

    $('#datepicker-popup2').datepicker({
        format: 'yyyy-mm-dd',
      todayHighlight: true
    });

});

</script>
@stop('scripts')