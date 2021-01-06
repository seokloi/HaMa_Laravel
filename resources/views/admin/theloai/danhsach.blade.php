@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11">
                <h1 class="page-header">Thể loại
                    <small>Danh sách các thể loại</small>
                </h1>
            </div>
            <div class="col-lg-1" style="padding-top:55px;">
                <button class="btn btn-default" onclick="window.location.href='admin/theloai/them'"> Add New </button>
            </div>
            <!-- /.col-lg-12 -->
            
            @if(session('thongbao'))
                <div class="alert alert-success col-lg-12">{{session('thongbao')}}</div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>IDTL</th>
                        <th>Tên Thể Loại</th>
                        <th>Hình Ảnh</th>
                        <th>Số Lượng Sản Phẩm</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($theloai as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{$item->IDTL}}</td>
                        <td>{{$item->TenTheLoai}}</td>
                        <td><img width="100px" src="user/images/category/{{$item->HinhTL}}"></td>
                        <td>{{$item->sanpham->count()}}</td>
                        <td class="center"> <a href="admin/theloai/sua?IDTL={{$item->IDTL}}"><i class="fa fa-pencil fa-fw"></i></a></td>
                        <td class="center"><a href="admin/theloai/xoa?IDTL={{$item->IDTL}}"><i class="fa fa-trash-o  fa-fw"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
