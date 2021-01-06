@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Doanh thu
                    <small>Theo {{$fill}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Thời gian</th>
                        <th>Số lượng</th>
                        <th>Tiền trễ </th>
                        <th>Tiền bồi thường</th>
                        <th>Tiền thuê sách</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doanhthu as $dt)
                        <tr class="odd gradeX" align="center">
                            <td>@if($fill == 'ngày'){{$dt->NgayTra}} @endif @if($fill == 'tháng'){{$dt->nam}} - {{$dt->thang}} @endif @if($fill == 'năm') {{$dt->nam}} @endif </td>
                            <td>{{$dt->SLTraSach}}</td>
                            <td>{{$dt->TongTienTre}}</td>
                            <td>{{$dt->TongTienBoiThuong}}</td>
                            <td>{{$dt->TongTienThueSach}}</td>
                            <td>{{$dt->TongTien}}</td>
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