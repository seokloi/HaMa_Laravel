@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11">
                <h1 class="page-header">Sản Phẩm
                    <small>Danh sách</small>
                </h1>
            </div>
            <div class="col-lg-1" style="padding-top:55px;">
                <button class="btn btn-default" onclick="window.location.href='admin/sanpham/them'"> Add New </button>
            </div>
            <!-- /.col-lg-12 -->
            
            @if(session('thongbao'))
                <div class="alert alert-success col-lg-12">{{session('thongbao')}}</div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>IDSP</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Thể Loại</th>
                        <th>Giá</th>
                        <th>Sale</th>
                        <th>Hình Ảnh</th>
                        <th>Đánh Giá</th>
                        <th>Số lượng</th>
                        <th>Edit</th>
                        <th>Hidden</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($sanpham as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{$item->IDSP}}</td>
                        <td><a href="admin/ct_sp/danhsach?IDSP={{$item->IDSP}}">{{$item->TenSanPham}}</a></td>
                        <td>{{$item->theloai->TenTheLoai}}</td>
                        <td>{{$item->Gia}}</td>
                        <td>{{$item->Sale}}</td>
                        <td><img width="80px" src="user/images/product/{{$item->HinhChinh}}"></td>
                        <td>{{$item->DanhGia}}</td>
                        <td>{{$item->ct_sp->sum('SoLuongTon')}}</td>
                        <td class="center"> <a href="admin/sanpham/sua?IDSP={{$item->IDSP}}"> <i class="fa fa-pencil fa-fw"></i></a></td>
                        @if($item->Hidden == 0)
                        <td class="center"><a href="admin/sanpham/xoa?IDSP={{$item->IDSP}}"><i class="fa fa-trash-o  fa-fw"></i></a></td>
                        @else
                        <td class="center"><a href="admin/sanpham/khoiphuc?IDSP={{$item->IDSP}}"><i class="fa fa-undo  fa-fw"></i></a></td>
                        @endif
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
