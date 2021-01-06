@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11">
                <h1 class="page-header">Nhân viên
                    <small>Danh sách</small>
                </h1>
            </div>
            <div class="col-lg-1" style="padding-top:55px;">
                <button class="btn btn-default" onclick="window.location.href='admin/nhanvien/them'"> Add New </button>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
            @if(session('thongbao'))
                <div class="alert alert-success">{{session('thongbao')}}</div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Email</th>
                        <th>Tên người dùng</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Cập nhật mới nhất</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($nhanvien as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{$item->id}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->TenNguoiDung}}</td>
                        <td>{{$item->NgaySinh}}</td>
                        <td>{{$item->GioiTinh}}</td>
                        <td>{{$item->SDT}}</td>
                        <td>{{$item->DiaChi}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td class="center"> <a href="admin/nhanvien/sua?id={{$item->id}}"> <i class="fa fa-pencil fa-fw"></i></a></td>
                        <td class="center"><a href="admin/nhanvien/xoa?id={{$item->id}}"> <i class="fa fa-trash-o  fa-fw"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
