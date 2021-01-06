@extends('user.layout.index')
@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
      <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
          <div class="breadcrumb ptb_20">
            <h1>Đăng Ký</h1>
            <ul>
              <li><a href="././">Trang Chủ</a></li>
              <li class="active">Đăng Ký</li>
            </ul>
          </div>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-8 col-lg-9 mtb_20">
          <!-- contact  -->
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="panel-login panel">
                <div class="panel-heading">
                  <div class="row mb_20">
                    <div class="col-xs-6">
                      <a href="login">Đăng Nhập</a>
                    </div>
                    <div class="col-xs-6">
                      <a href="register" class="active" id="login-form-link">Đăng Ký</a>
                    </div>
                  </div>
                  <hr>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <form id="login-form" action="register" method="post">
                        <div class="form-group">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Địa chỉ email" value="">
                        </div>
                        <div class="form-group">
                          <input type="text" name="username" id="username" tabindex="2" class="form-control" placeholder="Tên người dùng" value="">
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" id="password2" tabindex="3" class="form-control" placeholder="Mật khẩu">
                        </div>
                        <div class="form-group">
                          <input type="password" name="confirm-password" id="confirm-password" tabindex="4" class="form-control" placeholder="Nhập lại mật khẩu">
                        </div>
                        <div class="form-group">
                        Ngày sinh: <input type="date" name="ngaysinh" id="ngaysinh" tabindex="5" class="form-control">
                        </div>
                        <div class="form-group">
                        	<input name="txtSex" value="Nam" checked="checked" type="radio">Nam &nbsp;&nbsp;&nbsp
                            <input name="txtSex" value="Nữ" type="radio">Nữ
                        </div>
                        <div class="form-group">
                          <input type="text" name="sdt" id="sdt" tabindex="6" class="form-control" placeholder="Số điện thoại" value="">
                        </div>
                        <div class="form-group">
                          <input type="text" name="diachi" id="diachi" tabindex="7" class="form-control" placeholder="Địa chỉ">
                        </div>
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $er)
                                    {{$er}} <br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-danger">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                              <input type="submit" name="register-submit" id="register-submit" tabindex="8" class="form-control btn btn-register" value="Đăng ký">
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Single Blog  -->
  <!-- End Blog   -->
  <!-- =====  CONTAINER END  ===== -->
@endsection
