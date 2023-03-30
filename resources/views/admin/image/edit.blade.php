@extends('layouts.adminbase')
@php
    $titleGlobal='Resim Güncelleme';
@endphp
@section('title', $titleGlobal)

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $titleGlobal }}: {{ $data->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Anasayfa</a></li>
                        <li class="breadcrumb-item active">{{ $titleGlobal }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form role="form" action="/admin/category/update/{{$data->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="form-control">Parent Category</label>
                    <select class="form-control" name="parent_id">
                       @isset($data->parent_id)
                            @if(($data->parent_id) != 0)
                                <option value="0">Main Category</option>
                                <option selected value="{{$data->parent_id}}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($data, $data->title) }}</option>
                            @else
                                <option value="{{$data->parent_id}}" selected>{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($data, $data->title) }}</option>
                            @endif    
                            @foreach ($database as $item)
                                <option value="{{$item->id}}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($item, $item->title) }}</option> 
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Title*</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter a title" name="title" value="{{$data->title}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Keywords</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Keywords" name="keywords" value="{{$data->keywords}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Description" name="description" value="{{$data->title}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                            <label for="exampleInputFile" class="custom-file-label">Choose File</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="form-control">Status</label>
                    <select class="form-control" name="status">
                        <option selected="selected" value="1">Enable</option>
                        <option value="0">Disable</option>
                    </select>
                </div>
            </div>

            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
