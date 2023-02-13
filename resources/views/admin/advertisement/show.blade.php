@extends('layouts.adminbase')

@section('title', 'Show Advertisement')

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
            <div class="col-12 col-md-9 col-lg-12 order-2 order-md-1">
              <div class="row">
                <div class="col-16 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Kategori Seviyesi</span>
                      <span class="info-box-number text-center text-muted mb-0">
                        @if (($data->parent_id) == 0 )
                            <span class="info-box-number text-center text-success mb-0">Ana Kategori</span>
                        @else
                            <span class="info-box-number text-center text-secondary mb-0">Alt Kategori</span>
                        @endif
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-16 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Status</span>
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
                        <span class="info-box-text text-center text-muted">Updated Time</span>
                        <span class="info-box-number text-center text-muted mb-0">{{$data->updated_at}}</span>
                      </div>
                    </div>
                  </div>
                  
              </div>
              <a class="btn btn-block btn-primary" href="{{route('admin.category.edit', ['id'=>$data->id])}}">Edit</a>
              <a class="btn btn-block btn-danger" href="{{ route('admin.category.destroy', ['id'=>$data->id]) }}" 
                onclick="return confirm('Silmekten emin misiniz?')">Delete</a>
              <hr>
              
              <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2" style="display: -webkit-inline-box;"> 
                <h3 class="text-primary"><i class="fas fa-info" style="line-height:55px"></i></h3>
                <p class="text-muted" style="margin-left: 20px;line-height: 55px"><b>Description</b>: {{$data->description}}</p>
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
