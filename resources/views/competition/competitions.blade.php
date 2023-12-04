@extends('components.template')

@section('header-title')
<h1>Competition Dashboard</h1>
@endsection

@section('header-breadcrumbs')
<li class="breadcrumb-item active">competition dashboard</li>
@endsection

@section('content')
<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="card-title">Competitions Table</h3>

                    <div class="ml-auto">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-create-form">
                            Add New
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="competitions-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Participant</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($competitions as $competition)
                        <tr>
                            <td>{{ $competition["name"] }}</td>
                            <td>{{ $competition["start_date"] }}</td>
                            <td>{{ $competition["end_date"] }}</td>
                            <td>{{ $competition["participant"] }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('competition.view', ['id' => $competition['id']]) }}" class="btn btn-default">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <button type="button" class="btn btn-default edit-competition" data-competition-id="{{ $competition["id"] }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <a class="btn btn-default" onclick="confirmDelete('{{ $competition["id"] }}')">
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
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Participant</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->

            <!-- edit form model -->
            <div class="modal fade" id="modal-edit-form">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Competition Form</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- form start -->
                            <form id="edit-competition-form" action="competition.form.edit" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="inputNameEdit">Full Name</label>
                                            <input type="text" name="name" class="form-control" id="inputNameEdit" placeholder="Enter name">
                                        </div>

                                        <div class="form-group  col-sm-12 col-md-6">
                                            <label>Date range:</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="date_range" class="form-control float-right" id="inputDateEdit">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" rows="3" id="inputDescEdit" placeholder="Enter description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="submit-edit-button">Submit</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <!-- create form modal -->
            <div class="modal fade" id="modal-create-form">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Create Competition Form</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- form start -->
                            <form id="create-competition-form" action="competition.form.create" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="inputName">Full Name</label>
                                            <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter name">
                                        </div>

                                        <div class="form-group  col-sm-12 col-md-6">
                                            <label>Date range:</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="date_range" class="form-control float-right" id="inputDate">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="address" class="form-control" rows="3" placeholder="Enter address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="submit-button">Submit</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

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
        $("#competitions-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#competitions-table_wrapper .col-md-6:eq(0)');
        $('#competitions-table2').DataTable({
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

<!-- delete -->
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
                axios.post('/competition/delete', data)
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
                                html: 'A server error occurred while deleting the competition.<br><br>' + response.data.message,
                            })
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: 'An error occurred while deleting the competition.<br><br>' + error,
                        })
                    });
            }
        })
    }
</script>

<!-- create form -->
<script>
    document.getElementById('submit-button').addEventListener('click', function(event) {
        var formData = new FormData(document.getElementById('create-competition-form'));
        console.log(formData);
        Swal.fire({
            title: 'Are you sure?',
            text: "You'll create a new record!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/competition/create', formData)
                    .then(response => {
                        if (response.status == 200) {
                            Swal.fire(
                                'Created!',
                                response.data.message,
                                'success'
                            ).then(() => {
                                var routeUrl = "{{ route('competition.dashboard') }}";
                                window.location.href = routeUrl;
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                html: 'A server error occurred while creating the record.<br><br>' + response.data.message,
                            })
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: 'An error occurred while creating the record.<br><br>' + error,
                        })
                    });
            }
        })
    });
</script>

<!-- edit form -->
<script>
    document.getElementById('submit-edit-button').addEventListener('click', function(event) {
        var formData = new FormData(document.getElementById('edit-competition-form'));
        console.log(formData);
        Swal.fire({
            title: 'Are you sure?',
            text: "You'll update the record!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/competition/edit', formData)
                    .then(response => {
                        if (response.status == 200) {
                            Swal.fire(
                                'Updated!',
                                response.data.message,
                                'success'
                            ).then(() => {
                                var routeUrl = "{{ route('competition.dashboard') }}";
                                window.location.href = routeUrl;
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                html: 'A server error occurred while updating the record.<br><br>' + response.data.message,
                            })
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: 'An error occurred while updating the record.<br><br>' + error,
                        })
                    });
            }
        })
    });
</script>

<!-- date range picker -->
<script>
    $('#inputDate').daterangepicker()
    $('#inputDateEdit').daterangepicker()

</script>

<!-- edit form axios get -->
<script>
    $(document).ready(function () {
        $('.edit-competition').click(function () {
            var competitionId = $(this).data('competition-id');

            axios.get('/competition/competition-data/' + competitionId)
                .then(function (response) {
                    // Assuming the response contains competition data
                    var competitionData = response.data;

                    // Populate the form fields with the data
                    $('#inputNameEdit').val(competitionData.name);
                    $('#inputDescEdit').val(competitionData.description);
                    $('#inputDateEdit').val(competitionData.date_range);
                    $('#edit-competition-form').val(competitionData.id);
                    // Set date, description, and other fields similarly

                    // Open the modal
                    $('#modal-edit-form').modal('show');
                })
                .catch(function (error) {
                    console.error(error);
                });
        });
    });
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