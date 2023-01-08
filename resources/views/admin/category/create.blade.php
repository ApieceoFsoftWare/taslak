@extends('layouts.adminbase')

@section('title', 'Add Category')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori Ekleme</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Kategori İşlemleri</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Kategori Elementleri</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="/admin/category/store" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="form-control">Parent ID</label>
                        <select class="form-control" name="status">
                            <option>Enable</option>
                            <option>Disable</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter a title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Keywords</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Keywords" name="keywords">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                <label for="exampleInputFile" class="custom-file-label">Choose File</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="form-control">Status</label>
                        <select class="form-control" name="status">
                            <option>Enable</option>
                            <option>Disable</option>
                        </select>
                    </div>
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
