@extends('components.template')

@section('header-title')
<h1>Club Dashboard</h1>
@endsection

@section('header-breadcrumbs')
<li class="breadcrumb-item active">club dashboard</li>
@endsection

@section('content')
<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="card-title">Clubs Table</h3>

                    <div class="ml-auto">
                        <a href="{{ route('club.create') }}" class="btn btn-default">
                            Add New
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="clubs-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>State</th>
                            <th>Members</th>
                            <th>Coaches</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($clubs as $club)
                        <tr>
                            <td>{{ $club["name"] }}</td>
                            <td>{{ $club["state"] }}</td>
                            <td>{{ $club["member_count"] }}</td>
                            <td>{{ $club["coach_count"] }}</td>
                            <td>{{ $club["address"] }}</td>
                            <td>{{ $club["description"] }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('club.view', ['id' => $club['id']]) }}" class="btn btn-default">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('club.edit', ['id' => $club['id']]) }}" class="btn btn-default">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-default" onclick="confirmDelete('{{ $club["id"] }}')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>State</th>
                            <th>Members</th>
                            <th>Coaches</th>
                            <th>Address</th>
                            <th>Description</th>
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
        $("#clubs-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#clubs-table_wrapper .col-md-6:eq(0)');
        $('#clubs-table2').DataTable({
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

        this.swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/club/delete', data)
                    .then(response => {
                        if (response.status == 200) {
                            this.swal.fire(
                                'Deleted!',
                                response.data.message,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            this.swal({
                                icon: 'error',
                                title: 'Error!',
                                html: 'A server error occurred while deleting the club.<br><br>' + response.data.message,
                            })
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        this.swal({
                            icon: 'error',
                            title: 'Error!',
                            html: 'An error occurred while deleting the club.<br><br>' + error,
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