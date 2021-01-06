@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Sửa</small>
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
                <form action="admin/nhanvien/sua?id={{$nhanvien->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="txtEmail" placeholder="Nhập email" value="{{$nhanvien->email}}" readonly />
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="changePassword" id="changePassword">
                        <label>Mật khẩu mới</label>
                        <input type="password" class="form-control password" name="txtPass" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control password" name="txtRePass" placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="form-group">
                        <label>Tên người dùng</label>
                        <input type="text" class="form-control" name="txtName" value="{{$nhanvien->TenNguoiDung}}" />
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" class="form-control" name="txtDateBirdth" value="{{$nhanvien->NgaySinh}}" />
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label><br>
                        <label class="radio-inline">
                            <input name="txtSex" @if($nhanvien->GioiTinh == "Nam" ) checked @endif value="Nam"  type="radio">Nam
                        </label>
                        <label class="radio-inline">
                            <input name="txtSex" @if($nhanvien->GioiTinh == "Nữ" ) checked @endif  value="Nữ" type="radio">Nữ
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" name="txtAddress" value="{{$nhanvien->DiaChi}}" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" name="txtPhone" value="{{$nhanvien->SDT}}" />
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
                    
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $(".password").attr('disabled', '');
        $("#changePassword").change(function(){
            if($(this).is(":checked")){
                $(".password").removeAttr('disabled');
            }
            else{
                $(".password").attr('disabled', '');
            }
        });
    });
</script>
@endsection
