@extends('layouts.adminbase')

@section('title', 'Ana Sayfası')
@section('head')
<!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection


@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ana Sayfa Yapılandırması</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Ana sayfa İşlemleri</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ana sayfa İçeriklerini Değiştirebilirsin! </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('admin.home.update',['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Banner için içerikler  -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputText1">Ana Başlık</label>
                    <input type="text" class="form-control" id="exampleInputText1" value="{{ $data->main_title }}" name="main_title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText2">Ana Alt Başlık</label>
                    <input type="text" class="form-control" id="exampleInputText2" value="{{ $data->main_sub_title }}" name="main_sub_title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText3">Ana Başlık Özeti</label>
                    <input type="text" class="form-control" id="exampleInputText3" value="{{ $data->main_summary }}" name="main_summary">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Banner Resmi</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="banner_image">
                        <label class="custom-file-label" for="exampleInputFile">Banner Resmi Seçin</label>
                      </div>
                    </div>
                  </div>
                  <!-- Banner için içerikler sonu -->

                  <!-- İkini bölüm için içerikler -->
                  <div class="form-group">
                    <label for="exampleInputText4">İkinci Bölüm Başlık 1</label>
                    <input type="text" class="form-control" id="exampleInputText4" value="{{ $data->second_title1 }}" name="second_title1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText5">İkinci Bölüm Başlık 2</label>
                    <input type="text" class="form-control" id="exampleInputText5" value="{{ $data->second_title2 }}" name="second_title2">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText6">İkinci Bölüm Başlık 3</label>
                    <input type="text" class="form-control" id="exampleInputText6" value="{{ $data->second_title3 }}" name="second_title3">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText7">İkinci Bölüm Başlık 4</label>
                    <input type="text" class="form-control" id="exampleInputText7" value="{{ $data->second_title4 }}" name="second_title4">
                  </div>
                  <!-- İkinci bölüm için içeriklerin sonu -->

                  <!-- Üçüncü bölüm için içerikler  -->
                  <!-- 1 -->
                  
                  <div class="form-group">
                    <label for="exampleInputText8">Üçünü Bölüm Başlık 1</label>
                    <input type="text" class="form-control" id="exampleInputText8" value="{{ $data->third_title1 }}" name="third_title1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText9">Üçünü Bölüm Açıklama 1</label>
                    <input type="text" class="form-control" id="exampleInputText9" value="{{ $data->third_explanation1 }}" name="third_explanation1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Üçünü Bölüm için Resim 1</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="third_image1">
                        <label class="custom-file-label" for="exampleInputFile">Üçünü Bölüm için Resim 1 Seçin</label>
                      </div>
                    </div>
                  </div>
                  <!-- ************************************************************************************************************* -->
                  <!-- 2 -->
                  <div class="form-group">
                    <label for="exampleInputText10">Üçünü Bölüm Başlık 2</label>
                    <input type="text" class="form-control" id="exampleInputText10" value="{{ $data->third_title2 }}" name="third_title2">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText11">Üçünü Bölüm Açıklama 2</label>
                    <input type="text" class="form-control" id="exampleInputText11" value="{{ $data->third_explanation2 }}" name="third_explanation2">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Üçünü Bölüm için Resim 2</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="third_image2">
                        <label class="custom-file-label" for="exampleInputFile">Üçünü Bölüm için Resim 2 Seçin</label>
                      </div>
                    </div>
                  </div>
                  <!-- ************************************************************************************************************* -->
                  <!-- 3 -->
                  <div class="form-group">
                    <label for="exampleInputText12">Üçünü Bölüm Başlık 3</label>
                    <input type="text" class="form-control" id="exampleInputText12" value="{{ $data->third_title3 }}" name="third_title3">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText13">Üçünü Bölüm Açıklama 3</label>
                    <input type="text" class="form-control" id="exampleInputText13" value="{{ $data->third_explanation3 }}" name="third_explanation3">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Üçünü Bölüm için Resim 3</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="third_image3">
                        <label class="custom-file-label" for="exampleInputFile">Üçünü Bölüm için Resim 3 Seçin</label>
                      </div>
                    </div>
                  </div>
                  <!-- ************************************************************************************************************* -->
                  <!-- 4 -->
                  <div class="form-group">
                    <label for="exampleInputText14">Üçünü Bölüm Başlık 4</label>
                    <input type="text" class="form-control" id="exampleInputText14" value="{{ $data->third_title4 }}" name="third_title4">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText15">Üçünü Bölüm Açıklama 4</label>
                    <input type="text" class="form-control" id="exampleInputText15" value="{{ $data->third_explanation4 }}" name="third_explanation4">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Üçünü Bölüm için Resim 4</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="third_image4">
                        <label class="custom-file-label" for="exampleInputFile">Üçünü Bölüm için Resim 4 Seçin</label>
                      </div>
                    </div>
                  </div>
                  <!-- Üçünü Bölüm için içeriklerin sonu -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('foot')

    <!-- jQuery -->
    <script src="{{asset('assets')}}/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets')}}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('assets')}}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('assets')}}/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('assets')}}/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('assets')}}/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('assets')}}/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('assets')}}/admin/plugins/jszip/jszip.min.js"></script>
    <script src="{{asset('assets')}}/admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('assets')}}/admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{asset('assets')}}/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('assets')}}/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('assets')}}/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets')}}/admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('assets')}}/admin/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <!-- jQuery -->
    <script src="{{asset('assets')}}/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{asset('assets')}}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Ekko Lightbox -->
    <script src="{{asset('assets')}}/admin/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets')}}/admin/dist/js/adminlte.min.js"></script>
    <!-- Filterizr-->
    <script src="{{asset('assets')}}/admin/plugins/filterizr/jquery.filterizr.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('assets')}}/admin/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
      $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
          event.preventDefault();
          $(this).ekkoLightbox({
            alwaysShowClose: true
          });
        });

        $('.filter-container').filterizr({gutterPixels: 3});
        $('.btn[data-filter]').on('click', function() {
          $('.btn[data-filter]').removeClass('active');
          $(this).addClass('active');
        });
      });
    </script>
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>
@endsection
