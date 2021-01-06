@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin trả sách</h1>
            </div>
            <!-- /.col-lg-12 -->
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Người mượn</th>
                        <th>Ngày trả</th>
                        <th>Số ngày trễ</th>
                        <th>Tiền trễ</th>
                        <th>Tiền bồi thường</th>
                        <th>Tiền thuê sách</th>
                        <th>Tổng tiền</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trasach as $ts)
                    <tr class="odd gradeX" align="center">
                        <td>{{$ts->id}}</td>
                        <td>{{$ts->users->HoTen}}</td>
                        <td>{{$ts->NgayTra}}</td>
                        <td>{{$ts->SoNgayTre}}</td>
                        <td>{{$ts->TienTre}}</td>
                        <td>{{$ts->TienBoiThuong}}</td>
                        <td>{{$ts->TienThueSach}}</td>
                        <td>{{$ts->TongTien}}</td>
                        <td><button class="btn btn-info" onclick="showDetail({{$ts->id}})">Xem</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <div class="showDetail">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết mượn sách</h1>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID trả sách</th>
                        <th>Tên sách</th>
                        <th>Thể loại</th>
                    </tr>
                </thead>
                <tbody class="detailHere">
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
</div>
<!-- /#page-wrapper -->
@endsection

@section('script')
    <script>
        $('.showDetail').hide();
        function showDetail(idTraSach){
            $('.showDetail').show();
            $.get('admin/ajax/trasach/' + idTraSach, function (data) { 
                $('.detailHere').html("");
                $('.detailHere').html(data);
            })
        }
    </script>
@endsection