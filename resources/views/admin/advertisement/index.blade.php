@extends('layouts.adminbase')

@section('title', 'İlan Sayfası')
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
            <h1>İlan Listesi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Anasayfa</a></li>
              <li class="breadcrumb-item active">İlan Listele</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">İlanlarin listesi aşağıdadır.</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="align-content: center">
                  <thead>
                  <tr>
                    <th style="width: 10px">ID</th>
                    <th style="width: 10px">Category ID</th>
                    <th style="width: 10px">User ID</th>
                    <th style="width: 100px">Title</th>
                    <th style="width: 100px">Status</th>
                    <th style="width: 100px">Image</th>
                    <th style="width: 100px">Gallery</th>
                    <th style="width: 70px">Progress Status</th>
                    <th style="width: 90px">Deadline</th>
                    <th>Updated Time</th>
                    <th style="width: 40px">Edit</th>
                    <th style="width: 40px">Delete</th>
                    <th style="width: 40px">Show</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                      <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->category_id}}</td>
                        <td>{{$item->user_id}}</td>
                        <td>{{$item->title}}</td>
                        @if ($item->status == 1)
                        <td class="text-success">Enable</td>
                        @elseif($item->status == 0)
                        <td class="text-danger">Disable</td>
                        @endif
                        <td align="center">
                          @if (isset($item->detail_image))
                            <img style="height: 50px; display: flex; float: left" src="{{ Storage::url($item->detail_image) }}">    
                            <a href="{{ route('admin.advertisement.destroyDetailImage',['id'=>$item->id]) }}" onclick="return confirm('Emin misin?')"><i style="color: red; line-height: 100px" class="fas fa-times"></i></a>
                          @endif
                        </td>
                        <td>
                          <button type="button" class="btn btn-block bg-gradient-secondary" style="display: block;">
                            <a href="{{ route('admin.image.index', ['pid'=> $item->id]) }}" style="color: white;text-decoration: none"><i class="fa fa-image"></i> Gallery</a>
                          </button>
                        </th>
                        <td class="project_progress">
                          <div class="progress progress-sm">
                              @php
                                   $progress_array = array(
                                    0 => "10",
                                    1 => "25",
                                    2 => "50",
                                    3 => "75",
                                    4 => "100" 
                                  );
                                  $keys = array_keys($progress_array);
                                  
                                  $progress_color_array = array(
                                    0 => "red",
                                    1 => "blue",
                                    2 => "yellow",
                                    3 => "orange",
                                    4 => "green"
                                  );
                                  $color_keys = array_keys($progress_color_array);
                              @endphp
                              
                              <div class="progress-bar bg-{{ $progress_color_array[$color_keys[$item->progress_status]] }}" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress_array[$keys[$item->progress_status]] }}%">
                              </div>
                          </div>
                          <small>
                              {{ $progress_array[$keys[$item->progress_status]] }}% Tamamlandı
                          </small>
                        </td>
                        <td>{{ $item->deadline }}</td>
                        <td style="width: 100px">{{ $item->updated_at }}</td>
                        <td><a href="{{ route('admin.advertisement.edit',['id'=> $item->id]) }}" class="btn btn-block btn-primary">Edit</a></td>
                        <td><a href="{{ route('admin.advertisement.destroy', ['id'=> $item->id]) }}" class="btn btn-block btn-danger"
                          onclick="return confirm('Silmekten emin misiniz?')">Delete</a></td>
                        <td><a href="{{ route('admin.advertisement.show',['id'=> $item->id]) }}" class="btn btn-block btn-info">Show</a></td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th style="width: 10px">Category ID</th>
                      <th style="width: 10px">User ID</th>
                      <th style="width: 100px">Title</th>
                      <th style="width: 100px">Status</th>
                      <th style="width: 100px">Image</th>
                      <th style="width: 100px">Gallery</th>
                      <th style="width: 100px">Progress Status</th>
                      <th style="width: 90px">Deadline</th>
                      <th>Updated Time</th>
                      <th style="width: 40px">Edit</th>
                      <th style="width: 40px">Delete</th>
                      <th style="width: 40px">Show</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
        // Summernote
        $('#summernote').summernote();
    });
    
    </script>
@endsection
