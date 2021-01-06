@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11">
                <h1 class="page-header">{{$sanpham->TenSanPham}}
                    <small>Danh Sách</small>
                </h1>
            </div>
            <div class="col-lg-1" style="padding-top:55px;">
                <button class="btn btn-default" onclick="window.location.href='admin/ct_sp/them?IDSP={{$sanpham->IDSP}}'"> Add New </button>
            </div>
            <!-- /.col-lg-12 -->
            
            @if(session('thongbao'))
                <div class="alert alert-success col-lg-12">{{session('thongbao')}}</div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>IDCTSP</th>
                        <th>Màu</th>
                        <th>Size</th>
                        <th>Số lượng tồn</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ct_sp as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{$item->IDCTSP}}</td>
                        <td>@if(isset($item->IDM))
                            {{$item->mau->Mau}}
                            @else NULL
                            @endif
                        </td>
                        <td>@if(isset($item->IDS))
                            {{$item->size->Size}}
                            @else NULL
                            @endif
                        </td>
                        <td>{{$item->SoLuongTon}}</td>
                        <td class="center"> <a href="admin/ct_sp/sua?IDCTSP={{$item->IDCTSP}}"> <i class="fa fa-pencil fa-fw"></i></a></td>
                        <td class="center"><a href="admin/ct_sp/xoa?IDCTSP={{$item->IDCTSP}}"><i class="fa fa-trash-o  fa-fw"></i></a></td>
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
