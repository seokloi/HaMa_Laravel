@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhân viên
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                    @foreach($errors as $err)
                    <div class="alert alert-danger">
                        {{$err}} <br>
                    </div>
                    @endforeach
                @endif
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <form action="admin/nhanvien/them" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="txtEmail" placeholder="Nhập email" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="txtPass" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="txtRePass" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" class="form-control" name="txtName" placeholder="Nhập họ tên" />
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" class="form-control" name="txtDateBirdth" placeholder="Chọn ngày sinh" />
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label><br>
                        <label class="radio-inline">
                            <input name="txtSex" value="Nam" checked="checked" type="radio">Nam
                        </label>
                        <label class="radio-inline">
                            <input name="txtSex" value="Nữ" type="radio">Nữ
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" name="txtPhone" placeholder="Nhập số điện thoại" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" name="txtAddress" placeholder="Nhập địa chỉ" />
                    </div>
                    <button type="submit" class="btn btn-default">Thêm mới</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
                    
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
