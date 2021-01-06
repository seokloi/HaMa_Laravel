@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin mượn sách</h1>
            </div>
            <!-- /.col-lg-12 -->
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Người mượn</th>
                        <th>Ngày mượn</th>
                        <th>Ngày trả</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($muonsach as $ms)
                    <tr class="odd gradeX" align="center">
                        <td>{{$ms->id}}</td>
                        <td>{{$ms->users->HoTen}}</td>
                        <td>{{$ms->NgayMuon}}</td>
                        <td>{{$ms->NgayTra}}</td>
                        <td>{{$ms->TongTien}}</td>
                        <td @if($ms->TrangThai==0) class="alert alert-warning" @else class="alert alert-success" @endif>
                            @if($ms->TrangThai==0) Chưa trả sách @else Đã trả sách @endif
                        </td>
                        <td><button class="btn btn-info" onclick="showDetail({{$ms->id}})">Xem</button></td>
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
                        <th>ID mượn sách</th>
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
        function showDetail(idMuonSach){
            $('.showDetail').show();
            $.get('admin/ajax/muonsach/' + idMuonSach, function (data) { 
                $('.detailHere').html("");
                $('.detailHere').html(data);
            })
        }
    </script>
@endsection
