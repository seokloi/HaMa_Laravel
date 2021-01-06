@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết sản phẩm: {{$ct_sp->IDCTSP}}
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                @if(session('loi'))
                    <div class="alert alert-danger">
                        {{session('loi')}}
                    </div>
                @endif
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                <form action="admin/ct_sp/sua?IDCTSP={{$ct_sp->IDCTSP}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Màu</label>
                        <select class="form-control" name="Mau" id="Mau">
                            <option value="0">NULL</option>
                            @foreach(getMau() as $item)
                                <option value="{{$item->IDM}}" @if($item->IDM == $ct_sp->IDM) selected @endif>{{$item->Mau}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Size</label>
                        <select class="form-control" name="Size" id="Size">
                            <option value="0">NULL</option>
                            @foreach(getSize() as $item)
                                <option value="{{$item->IDS}}" @if($item->IDS == $ct_sp->IDS) selected @endif>{{$item->Size}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Só Lượng sản phẩm</label>
                        <input class="form-control" type="number" name="SoLuong" value="{{$ct_sp->SoLuongTon}}"/>
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
<!-- /#page-wrapper -->
@endsection

@section('script')
<script>
    $("#Hinh").change(function(e) {
        for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {        
            var file = e.originalEvent.srcElement.files[i];      
            var img = document.createElement("img");
            var reader = new FileReader();
            reader.onloadend = function() {
                img.src = reader.result;
                img.width = 300;
            }
            reader.readAsDataURL(file);
            $("input").after(img);
        }
    });

</script>
@endsection
