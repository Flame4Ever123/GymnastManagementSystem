@extends('components.template')

@section('header-title')
<h1>Dashboard</h1>
@endsection

@section('header-breadcrumbs')
<li class="breadcrumb-item active">dashboard</li>
@endsection

@section('content')
<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="card-title">Gymnasts Table</h3>

                    <div class="ml-auto">
                        <a href="{{ route('gymnast.create') }}" class="btn btn-default">
                            Add New
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="gymnasts-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Gymnast ID</th>
                            <th>Full Name</th>
                            <th>Club</th>
                            <th>Coach</th>
                            <th>Grouping</th>
                            <th>Year Of Birth</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($gymnasts as $gymnast)
                        <tr>
                            <td>{{ $gymnast["gymnast_id"] }}</td>
                            <td>{{ $gymnast["name"] }}</td>
                            <td>{{ $gymnast["club_name"] }}</td>
                            <td>{{ $gymnast["coach"] }}</td>
                            <td>{{ $gymnast["category"] }}</td>
                            <td>{{ $gymnast["year_of_birth"] }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('gymnast.view', ['id' => $gymnast['id']]) }}" class="btn btn-default">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('gymnast.edit', ['id' => $gymnast['id']]) }}" class="btn btn-default">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-default" onclick="confirmDelete('{{ $gymnast["id"] }}')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Gymnast ID</th>
                            <th>Full Name</th>
                            <th>Club</th>
                            <th>Coach</th>
                            <th>Grouping</th>
                            <th>Year Of Birth</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

</div>
@endsection

@section('scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- Page specific script -->
<script>
    $(function() {
        $("#gymnasts-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#gymnasts-table_wrapper .col-md-6:eq(0)');
        $('#gymnasts-table2').DataTable({
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

<script>
    function confirmDelete(id) {
        const data = {
            id: id
        };

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/gymnast/delete', data)
                    .then(response => {
                        if (response.status == 200) {
                            Swal.fire(
                                'Deleted!',
                                response.data.message,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                html: 'A server error occurred while deleting the gymnast.<br><br>' + response.data.message,
                            })
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: 'An error occurred while deleting the gymnast.<br><br>' + error,
                        })
                    });
            }
        })
    }
</script>
@endsection

@section('stylesheets')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection