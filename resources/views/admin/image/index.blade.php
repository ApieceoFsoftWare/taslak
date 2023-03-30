@extends('layouts.adminbase')

@section('title', 'Galeri Sayfası')
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
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title"><b>{{ $data_advertisement->title }}</b> Detay ve Liste Resimleri</h4>
          </div>
          <div class="card-body">
            <div class="row">
              @if(Storage::exists($data_advertisement->detail_image || $data_advertisement->list_image))
              <div class="col-sm-2">
                <a  href="{{ Storage::url($data_advertisement->detail_image) }}" data-toggle="lightbox" data-title="Detay Resmi" data-gallery="gallery">
                  <img src="{{ Storage::url($data_advertisement->detail_image) }}" class="img-fluid mb-2" alt="{{ $data_advertisement->title }} Detay Resmi">
                </a>
                <a href="{{ route('admin.advertisement.destroyDetailImage', ['id'=>$data_advertisement->id,'pid'=>$data_advertisement->id]) }}" onclick="return confirm('Emin misin?')" class="btn btn-block btn-danger">Resmi Sil</a>
              </div>
              <div class="col-sm-2">
                <a  href="{{ Storage::url($data_advertisement->list_image) }}" data-toggle="lightbox" data-title="Liste Resmi" data-gallery="gallery">
                  <img src="{{ Storage::url($data_advertisement->list_image) }}" class="img-fluid mb-2" alt="{{ $data_advertisement->title }} Liste Resmi">
                </a>
                <a href="{{ route('admin.advertisement.destroyListImage', ['id'=>$data_advertisement->id,'pid'=>$data_advertisement->id]) }}" onclick="return confirm('Emin misin?')" class="btn btn-block btn-danger">Resmi Sil</a>
              </div>
                 
                
              @else
                <div class="info-box mb-3 bg-info">
                  <span class="info-box-icon"><i class="far fa-comment"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Gösterilecek resim yok!</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              @endif
              
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title"><b>{{ $data_advertisement->title }}</b> Galerisi</h4>
          </div>
          <div class="card-body">
            <div class="row">
              @if(count($data) != 0)
                @foreach ($data as $item)
                  <div class="col-sm-2">
                    <a  href="{{ Storage::url($item->image) }}" data-toggle="lightbox" data-title="{{ $item->title }}" data-gallery="gallery">
                      <img src="{{ Storage::url($item->image) }}" class="img-fluid mb-2" alt="white sample">
                    </a>
                    <a href="{{ route('admin.image.destroy', ['id'=>$item->id,'pid'=>$data_advertisement->id]) }}" onclick="return confirm('Emin misin?')" class="btn btn-block btn-danger">Resmi Sil</a>
                  </div>
                @endforeach
              @else
                <div class="info-box mb-3 bg-info">
                  <span class="info-box-icon"><i class="far fa-comment"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Gösterilecek resim yok!</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              @endif
              
            </div>
          </div>
        </div>
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Galeriye Yeni Bir Resim Ekle</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('admin.image.store', ['pid'=>$data_advertisement->id] ) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Resim Başlığı Giriniz*</label>
              <input required type="text" class="form-control" id="exampleInputText1" placeholder="Başlık yazın" name="title">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Eklenecek Resim</label>
              <div class="input-group">
                <div class="custom-file">
                  <input required type="file" class="custom-file-input" id="exampleInputFile" name="image">
                  <label class="custom-file-label" for="exampleInputFile">Dosya Seç</label>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
    
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Kaydet</button>
          </div>
        </form>
      </div>
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
