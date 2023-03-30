@extends('layouts.adminbase')

@section('title', 'Ana Sayfa İçerikleri')

@section('content')
<div class="content-wrapper" style="min-height: 628px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ana Sayfa İçerikleri</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
              <li class="breadcrumb-item active">Ana Sayfa İçerikleri</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Buraya bir banner resmi bölümü eklenmesi lazım -->

      <div class="row">
        
        <div class="col-md-6">
          <div class="card card-default">
            <div class="card-header">
              <h2 class="card-title">
                <b>Banner Resmi</b>
              </h2>
            </div>
            <div class="card-body">
              <img style="width: 100%" src="{{ Storage::url($data->banner_image) }}" alt="Banner Resmi">
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-bullhorn"></i>
                Banner Bölümündeki İçerikler
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="callout callout-danger">
                <h5><b>Ana Başlık</b>: {{ $data->main_title }}</h5>
                <h5><b>Ana Alt Başlık</b>: {{ $data->main_sub_title }}</h5>
                <p><b><i>Ana Özet </i></b>: {{ $data->main_summary}}</p>
              </div>
            </div>
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-bullhorn"></i>
                Sayfa içinde kullanılabilecek 2 Bölüm
              </h3>
            </div>
            <div class="card-body">
              <div class="callout callout-info">
                <h5>İkinci Başlık 1 : {{ $data->second_title1 }}</h5>
                <h5>İkinci Başlık 2 : {{ $data->second_title2 }}</h4>
                <h5>İkinci Başlık 3 : {{ $data->second_title3 }}</h4>
                <h5>İkinci Başlık 4 : {{ $data->second_title4 }}</h4>
              </div>
            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-bullhorn"></i>
                Sayfa İçinde Kullanılabilecek 3 Bölüm
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="callout callout-warning">
                <h5>Üçüncü Bölüm Başlık 1  :{{ $data->third_title1 }}</h4>
                <p>Üçüncü Bölüm Açıklama 1 : {{ $data->third_explanation1 }}</p>
                <img style="width: 200px; height: 200px" src="{{ Storage::url($data->third_image1) }}" alt="Üçüncü Bölüm Resim 1">

              </div>
              <div class="callout callout-success">
                <h5>Üçüncü Bölüm Başlık 2  :{{ $data->third_title2 }}</h4>
                <p>Üçüncü Bölüm Açıklama 2 : {{ $data->third_explanation2 }}</p>
                <img style="width: 200px; height: 200px" src="{{ Storage::url($data->third_image2) }}" alt="Üçüncü Bölüm Resim 2">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-bullhorn"></i>
                Sayfa İçinde Kullanılabilecek 3 Bölüm
              </h3>
            </div>
            <div class="card-body">
              <div class="callout callout-danger">
                <h5>Üçüncü Bölüm Başlık 3  :{{ $data->third_title3 }}</h4>
                <p>Üçüncü Bölüm Açıklama 3 : {{ $data->third_explanation3 }}</p>
                <img style="width: 200px; height: 200px" src="{{ Storage::url($data->third_image3) }}" alt="Üçüncü Bölüm Resim 3">
              </div>
              <div class="callout callout-info">
                <h5>Üçüncü Bölüm Başlık 4  :{{ $data->third_title4 }}</h4>
                <p>Üçüncü Bölüm Açıklama 4 : {{ $data->third_explanation4 }}</p>
                <img style="width: 200px; height: 200px" src="{{ Storage::url($data->third_image4) }}" alt="Üçüncü Bölüm Resim 4">
              </div>
            </div>
          </div>
        
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-body">
                <a href="{{ route('admin.home.edit',['id'=>$data->id] ) }}" class="btn btn-block btn-outline-warning btn-lg">İçerikleri Değiştir</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col -->
        
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection

