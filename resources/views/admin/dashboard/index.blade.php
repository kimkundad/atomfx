@extends('admin.layouts.template')

@section('ga')

@endsection

@section('stylesheet')

@stop('stylesheet')

@section('content')



<div class="row">
            <div class="col-12 grid-margin">
              <div class="card card-statistics">
                <div class="card-body p-0">
                  <div class="row">
                    <div class="col-md-6 col-lg-3">
                      <div class="d-flex justify-content-between border-right card-statistics-item">
                        <div>
                          <h1>{{ $blog }}</h1>
                          <p class="text-muted mb-0">บทความ ทั้งหมด</p>
                        </div>
                        <i class="icon-pin  text-primary icon-lg"></i>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="d-flex justify-content-between border-right card-statistics-item">
                        <div>
                          <h1>{{ $slide }}</h1>
                          <p class="text-muted mb-0">รูปสไลด์</p>
                        </div>
                        <i class="icon-disc text-primary icon-lg"></i>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="d-flex justify-content-between border-right card-statistics-item">
                        <div>
                          <h1>{{ $view }}</h1>
                          <p class="text-muted mb-0">เข้าชมบทความ</p>
                        </div>
                        <i class="icon-people  text-primary icon-lg"></i>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="d-flex justify-content-between card-statistics-item">
                        <div>
                          <h1>{{ $man }}</h1>
                          <p class="text-muted mb-0">สมาชิกทั้งหมด</p>
                        </div>
                        <i class="icon-calculator text-primary icon-lg"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



@endsection

@section('scripts')

@stop('scripts')