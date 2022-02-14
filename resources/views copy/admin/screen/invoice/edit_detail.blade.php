@php
$list = config('table.list.invoice');
@endphp
@extends('admin.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ isset($id) ? 'Update' : 'Create' }} invoice</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">invoice</a></li>
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
                    <h3 class="card-title">invoice</h3>
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
                        @foreach ($translate['foreign'] as $key => $value)
                            <div class="form-group">
                                <label>{{ $value }}</label>
                                <select class="custom-select" required name="{{ $key }}">
                                    @foreach ($dataForeign as $item)
                                        <option value="{{ $item->id }}"
                                            {{ isset($id) && $data->user_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->$key }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                        @foreach ($translate['name-colum'] as $key => $value)
                            @if ($key == 'created_at')
                            @elseif ($type['invoice'][$key] == 'text' || $type['invoice'][$key] == 'email')
                                <div class="form-group">
                                    <label for="{{ $key }}">{{ $value }}</label>
                                    <input type="{{ $type['invoice'][$key] }}" class="form-control"
                                        id="{{ $key }}" name="{{ $key }}"
                                        placeholder="Nhập {{ $value }}"
                                        value="{{ isset($id) ? $data->$key : '' }}">
                                </div>
                                @elseif($type['invoice'][$key] == "list")
                                <div class="form-group">
                                    <label>{{ $value }}</label>
                                    <select class="custom-select" required name="{{ $key }}">
                                        @foreach ($list[$key] as $key1 => $item)
                                            <option value="{{ $key1 }}"
                                                {{ isset($id) && $data->$key == $key1 ? 'selected' : '' }}>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
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
