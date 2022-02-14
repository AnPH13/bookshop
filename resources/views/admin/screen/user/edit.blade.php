@extends('admin.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create user</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">user</a></li>
                            <li class="breadcrumb-item active">{{ isset($id) ? 'Update' : 'Create' }}</li>
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
                    <h3 class="card-title">user</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ isset($id) ? route('user.update', $id) : route('user.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($id))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        @foreach ($translate['name-colum'] as $key => $value)
                            @if ($type['user'][$key] == 'text' || $type['user'][$key] == 'email')
                                <div class="form-group">
                                    <label for="{{ $key }}">{{ $value }}</label>
                                    <input type="{{ $type['user'][$key] }}" class="form-control"
                                        id="{{ $key }}" name="{{ $key }}"
                                        placeholder="Nhập {{ $value }}"
                                        value="{{ isset($id) ? $data->$key : '' }}">
                                </div>
                            @endif

                        @endforeach
                        @if (!isset($id))
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Nhập password">
                            </div>
                        @endif
                        @foreach ($translate['foreign'] as $key => $value)
                            @if ($type['user-detail'][$key] == 'check')
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="{{ $key }}"
                                            name="{{ $key }}">
                                        <label class="form-check-label"
                                            for="{{ $key }}">{{ $key == 'gender' ? 'Giới tính nam' : $value }}</label>
                                    </div>
                                </div>
                            @elseif ($type['user-detail'][$key] == 'image')
                                <div class="form-group" style="height:254px;">
                                    <label for="">{{ $value }}</label>
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="image_input_{{ $key }}"
                                            onchange="LoadImage(this, '#image_{{ $key }}')"
                                            name="{{ $key }}" accept="image/gif, image/jpeg, image/png">
                                        <img id="image_{{ $key }}" src="#" alt="your image"
                                            style="border: 2px solid; display:none; height:200px;">
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="{{ $key }}">{{ $value }}</label>
                                    <input type="{{ $type['user-detail'][$key] }}" class="form-control"
                                        id="{{ $key }}" name="{{ $key }}"
                                        placeholder="Nhập {{ $value }}"
                                        value="{{ isset($id) ? $data->userDetail->$key : '' }}">
                                </div>
                            @endif
                        @endforeach
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
