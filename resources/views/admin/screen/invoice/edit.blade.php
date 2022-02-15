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
                            <li class="breadcrumb-item"><a href="#">user</a></li>
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
                <form action="{{ isset($id) ? route('invoice.update', $id) : route('invoice.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($id))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="user_id">Tên và Email</label>
                            <select class="custom-select" required name="user_id">
                                @foreach ($dataForeign as $item)
                                    <option value="{{ $item->id }}"
                                        {{ isset($id) && $data->user_id == $item->id ? 'selected' : '' }}>
                                        Name: {{ $item->userDetail->name }} -> Email: {{ $item->email }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user_id">Phương thức thanh toán</label>
                            <select class="custom-select" required name="payment_methods">
                                @foreach (config('table.invoice.payment_methods') as $key => $item)
                                    <option value="{{ $key }}"
                                        {{ isset($id) && $data->payment_methods == $key ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Loại đơn</label>
                            <select class="custom-select" required name="status">
                                @foreach (config('table.invoice.status') as $key => $item)
                                    <option value="{{ $key }}"
                                        {{ isset($id) && $data->status == $key ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập Tên"
                                value="{{ isset($id) ? $data->userDetail->name : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email"
                                value="{{ isset($id) ? $data->email : '' }}">
                        </div>
                        @if(!isset($id))
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="text" class="form-control" id="password" name="password"
                                    placeholder="Nhập mật khẩu">
                            </div>
                        @endisset

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="gender" name="gender">
                                <label class="form-check-label" for="gender">Nam</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="number_phone">Số điện thoại</label>
                            <input type="number" class="form-control" id="number_phone" name="number_phone"
                                placeholder="Nhập số điện thoại"
                                value="{{ isset($id) ? $data->userDetail->number_phone : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Ngày sinh</label>
                            <input type="date" class="form-control" id="birthday" name="birthday"
                                placeholder="Nhập ngày sinh" value="{{ isset($id) ? $data->userDetail->birthday : '' }}">
                        </div>
                        <div class="form-group" style="height:254px;">
                            <label for="">Ảnh đại diện</label>
                            <div class="custom-file">
                                <input type="file" class="form-control" id="image_input_avatar"
                                    onchange="LoadImage(this, '#image_avatar')" name="avatar"
                                    accept="image/gif, image/jpeg, image/png">
                                <img id="image_avatar" src="#" alt="your image"
                                    style="border: 2px solid; display:none; height:200px;">
                            </div>
                        </div> --}}
                        {{-- <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div> --}}
                        {{-- <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> --}}
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
