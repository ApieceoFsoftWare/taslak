@extends('layouts.adminbase')

@section('title', 'Kategori Sayfası')
@section('head')
<!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ayar Listesi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ayarları Listele</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="col-12 col-sm-12">
        <div class="card card-warning card-tabs">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-general-tab" data-toggle="pill" href="#custom-tabs-one-general" role="tab" aria-controls="custom-tabs-one-general" aria-selected="true">General</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-smtp-tab" data-toggle="pill" href="#custom-tabs-one-smtp" role="tab" aria-controls="custom-tabs-one-smtp" aria-selected="false">Smtp Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-socialmedia-tab" data-toggle="pill" href="#custom-tabs-one-socialmedia" role="tab" aria-controls="custom-tabs-one-socialmedia" aria-selected="false">Social Media</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-aboutus-tab" data-toggle="pill" href="#custom-tabs-one-aboutus" role="tab" aria-controls="custom-tabs-one-contact" aria-selected="false">About Us Page</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-contact-tab" data-toggle="pill" href="#custom-tabs-one-contact" role="tab" aria-controls="custom-tabs-one-contact" aria-selected="false">Contact Page</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-references-tab" data-toggle="pill" href="#custom-tabs-one-references" role="tab" aria-controls="custom-tabs-one-references" aria-selected="false">References</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade active show" id="custom-tabs-one-general" role="tabpanel" aria-labelledby="custom-tabs-one-general-tab">
                <div class="card card-danger">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" id="exampleInputTitle1" placeholder="Enter Title" name="title">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Keywords</label>
                        <input type="text" class="form-control" id="exampleInputKeywords1" placeholder="Enter Keywords" name="keywords">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" class="form-control" id="exampleInputDescription1" placeholder="Enter Description" name="description">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Company</label>
                        <input type="text" class="form-control" id="exampleInputCompany1" placeholder="Enter a Company Name" name="company">
                      </div>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-smtp" role="tabpanel" aria-labelledby="custom-tabs-one-smtp-tab">
                <div class="card card-danger">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Smtp Server</label>
                      <input type="text" class="form-control" id="exampleInputSmtpServer" placeholder="Enter a Smtp Server" name="smtpserver">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Smtp Email</label>
                      <input type="text" class="form-control" id="exampleInputSmtpMail" placeholder="Enter a Smtp Mail" name="smtpemail">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Smtp Password</label>
                      <input type="password" class="form-control" id="exampleInputSmtpPassword" placeholder="Enter a Password" name="smtppassword">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Smtp Port</label>
                      <input type="text" class="form-control" id="exampleInputSmtpPort" placeholder="Enter a Smtp Port" name="smtpport">
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-socialmedia" role="tabpanel" aria-labelledby="custom-tabs-one-socialmedia-tab">
                 <div class="card card-danger">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Facebook <i class="fa-brands fa-square-facebook"></i></label>
                      <input type="text" class="form-control" id="exampleInputFacebook" placeholder="Enter a Facebook Link" name="facebook">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Instagram</label>
                      <input type="text" class="form-control" id="exampleInputInstagram" placeholder="Enter a Instagram Link" name="instagram">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Github</label>
                      <input type="text" class="form-control" id="exampleInputGithub" placeholder="Enter a Github Link" name="github">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Twitter</label>
                      <input type="text" class="form-control" id="exampleInputTwitter" placeholder="Enter a Twitter Link" name="twitter">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Linkedin</label>
                      <input type="text" class="form-control" id="exampleInputLinkedIn" placeholder="Enter a Linkedin Link" name="linkedin">
                    </div>
                  </div>
                 </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-aboutus" role="tabpanel" aria-labelledby="custom-tabs-one-aboutus-tab">
                 <div class="card card-danger">
                  <div class="card-body">
                    <textarea name="aboutus" id="aboutus" cols="30" rows="10"></textarea>
                  </div>
                 </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-contact" role="tabpanel" aria-labelledby="custom-tabs-one-contact-tab">
                <div class="card card-danger">
                  <div class="card-body">
                    <textarea name="contact" id="contact" cols="30" rows="10"></textarea>
                  </div>
                </div>
             </div>
             <div class="tab-pane fade" id="custom-tabs-one-references" role="tabpanel" aria-labelledby="custom-tabs-one-references-tab">
              <div class="card card-danger">
                <div class="card-body">
                  <textarea name="references" id="references" cols="30" rows="10"></textarea>
                </div>
              </div>
           </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>


    <!-- /.container-fluid -->
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>

    $(document).ready(function() {
      $('#aboutus').summernote();
      $('#contact').summernote();
      $('#references').summernote();
    });


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
