@extends('admin.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Thêm sản phẩm</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">sản phẩm</a></li>
                            <li class="breadcrumb-item active">{{ isset($id) ? 'Sửa' : 'Thêm' }}</li>
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
                    <h3 class="card-title">Sản phẩm</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ isset($id) ? route('product.update', $id) : route('product.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($id))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập Tên"
                                value="{{ isset($id) ? $data->name : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input type="number" min="0" class="form-control" id="price" name="price" placeholder="Nhập giá"
                                value="{{ isset($id) ? $data->price : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="total">Số lượng</label>
                            <input type="number" min="0" class="form-control" id="total" name="total" placeholder="Nhập số lượng"
                                value="{{ isset($id) ? $data->total : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="total_sold">Số lượng đã bán</label>
                            <input type="number" min="0" class="form-control" id="total_sold" name="total_sold" placeholder="Nhập số lượng đã bán"
                                value="{{ isset($id) ? $data->total_sold : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="type">Loại sản phẩm</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="Nhập loại sản phẩm"
                                value="{{ isset($id) ? $data->type : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="provider">Nhà cung cấp</label>
                            <input type="text" class="form-control" id="provider" name="provider" placeholder="Nhập nhà cung cấp"
                                value="{{ isset($id) ? $data->provider : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="author">Tác giả</label>
                            <input type="text" class="form-control" id="author" name="author" placeholder="Nhập tác giả"
                                value="{{ isset($id) ? $data->author : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Nhập mô tả"
                                value="{{ isset($id) ? $data->description : '' }}">
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
