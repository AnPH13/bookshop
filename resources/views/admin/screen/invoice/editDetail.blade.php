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
                <form action="{{ isset($id) ? route('invoice-detail.update', $id) : route('invoice-detail.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($id))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="product_id">Tên sản phẩm</label>
                            <select class="custom-select" required name="product_id">
                                @foreach ($dataForeign as $item)
                                    <option value="{{ $item->id }}"
                                        {{ isset($id) && $data->product_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->id }} {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_total">Số lượng sản phẩm</label>
                            <input type="number" min="0" step="1" class="form-control" id="product_total" name="product_total" placeholder="Nhập số lượng"
                                value="{{ isset($id) ? $data->product_total : '' }}">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="status" name="status">
                                <label class="form-check-label" for="status">Trạng thái</label>
                            </div>
                        </div>
                        <div class="form-group">
                            {{--  <label for="product_total">Số lượng sản phẩm</label>  --}}
                            <input type="hidden" class="form-control" id="invoice_id" name="invoice_id"
                                value="{{ $invoice_id ?? "" }}">
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
