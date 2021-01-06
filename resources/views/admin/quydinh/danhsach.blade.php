@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quy định
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Nội dung</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quydinh as $qd)
                    <tr class="odd gradeX" align="center">
                        <td>{{$qd->id}}</td>
                        <td>{{$qd->NoiDung}}</td>
                        <td class="center"><a href="admin/quydinh/xoa/{{$qd->id}}"> <i class="fa fa-trash-o  fa-fw"></i></a></td>
                        <td class="center"><a href="admin/quydinh/sua/{{$qd->id}}"> <i class="fa fa-pencil fa-fw"></i></a></td>
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