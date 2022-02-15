@extends('admin.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Chi tiết hoá đơn</a></li>
                            <li class="breadcrumb-item active">{{ isset($id) ? 'Sửa' : 'Tạo' }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Hoá đơn</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ isset($id) ? route('product-image.update', $id) : route('product-image.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($id))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group" style="height:254px;">
                            <label for="">Ảnh sản phẩm</label>
                            <div class="custom-file">
                                <input type="file" class="form-control" id="image_input_avatar"
                                    onchange="LoadImage(this, '#image_avatar')" name="avatar"
                                    accept="image/gif, image/jpeg, image/png">
                                <img id="image_avatar" src="#" alt="your image"
                                    style="border: 2px solid; display:none; height:200px;">
                            </div>
                        </div>
                        <div class="form-group">
                            {{--  <label for="product_total">Số lượng sản phẩm</label>  --}}
                            <input type="hidden" class="form-control" id="product_id" name="product_id"
                                value="{{ $product_id ?? "" }}">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
