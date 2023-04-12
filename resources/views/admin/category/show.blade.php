@extends('layouts.adminbase')

@section('title', 'Show Category')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori</h1>
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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Kategori Detayları</h3>
            
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-16 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"><b>ID</b></span>
                      <span class="info-box-number text-center text-muted mb-0">
                        <span class="info-box-number text-center text-success mb-0">
                            {{ $data->id }}
                        </span>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-16 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"><b>Status</b></span>
                      @if ($data->status == '1')
                        <span class="info-box-number text-center text-success mb-0">Enable</span>
                      @else
                        <span class="info-box-number text-center text-danger mb-0">Disable</span>  
                      @endif
                    </div>
                  </div>
                </div>
                <div class="col-16 col-sm-4">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted"><b>Updated Time</b></span>
                        <span class="info-box-number text-center mb-0">{{$data->updated_at}}</span>
                      </div>
                    </div>
                  </div>
                  
              </div>
              
              <hr>
              <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2" style="display: -webkit-inline-box;"> 
                <h3 class="text-primary">
                  <i class="fas fa-info" style="line-height:55px"></i>
                </h3>
                <p class="text-muted" style="margin-left: 20px;line-height:55px"><b>Parents Tree</b>: {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($data, $data->title)}}</p>
              </div>
              <hr>
              <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2" style="display: -webkit-inline-box;"> 
                <h3 class="text-primary"><i class="fas fa-info" style="line-height:55px"></i></h3>
                <p class="text-muted" style="margin-left: 20px;line-height: 55px"><b>Keywords</b>: {{$data->keywords}}</p>
              </div>
              <hr>
              <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2" style="display: -webkit-inline-box;"> 
                <h3 class="text-primary"><i class="fas fa-info" style="line-height:55px"></i></h3>
                <p class="text-muted" style="margin-left: 20px;line-height: 55px"><b>Description</b>: {{$data->description}}</p>
              </div>
              <hr>
              <div>
                <a class="btn btn-block btn-primary" href="{{route('admin.category.edit', ['id'=>$data->id])}}">Edit</a>
                <a class="btn btn-block btn-danger" href="{{ route('admin.category.destroy', ['id'=>$data->id]) }}" 
                onclick="return confirm('Silmekten emin misiniz?')">Delete</a>
              </div>
              <hr>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{ $data->title }}</h3>
                
                <br>
                <div class="text-muted">
                    <img style="max-width: -webkit-fill-available;" src="{{ Storage::url($data->image) }}">    
                </div>
                <br>
                
                <h5 class="mt-5 text-muted">Project files</h5>
                
                <ul class="list-unstyled">
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                  </li>
                </ul>
                
                <div class="text-center mt-5 mb-3">
                  <a href="#" class="btn btn-sm btn-primary">Add files</a>
                  <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                </div>
              
              </div>
            
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
