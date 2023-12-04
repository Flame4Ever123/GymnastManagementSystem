@extends('components.template')

@section('header-title')
<h1>Gymnast Profile</h1>
@endsection

@section('header-breadcrumbs')
<li class="breadcrumb-item active">gymnast profile</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="../../dist/img/anon.jpg" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $gymnast["name"] }} </h3>

                    <p class="text-muted text-center">{{ $gymnast["gymnast_id"] }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Grouping</b> <a class="float-right">{{ $gymnast["category"] }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Coach</b> <a class="float-right">{{ $gymnast["coach"] }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Club</b> <a class="float-right">{{ $gymnast["club_name"] }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Year of Birth</b> <a class="float-right">{{ $gymnast["year_of_birth"] }}</a>
                        </li>
                    </ul>

                    <div class="btn-group">
                        <a href="{{ route('gymnast.dashboard') }}" class="btn btn-default">
                            <i class="fas fa-eye"></i> Home
                        </a>
                        <a href="{{ route('gymnast.edit', ['id' => $gymnast['id']]) }}" class="btn btn-default">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a class="btn btn-default" onclick="confirmDelete('{{ $gymnast["id"] }}')">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <p class="text-muted">
                        {{ $gymnast["notes"] }}
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Competitions</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <table id="competition-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Gymnast ID</th>
                                        <th>Full Name</th>
                                        <th>Competition</th>
                                        <th>Ranking</th>
                                        <th>Total Marks</th>
                                        <th>Grouping</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>{{ $gymnast["gymnast_id"] }}</td>
                                        <td>{{ $gymnast["name"] }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-default" data-toggle="modal" data-target="#view-competition-details">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                                <a class="btn btn-default" data-toggle="modal" data-target="#edit-competition-details">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Gymnast ID</th>
                                        <th>Full Name</th>
                                        <th>Competition</th>
                                        <th>Ranking</th>
                                        <th>Total Marks</th>
                                        <th>Grouping</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                            <div class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-success">
                                        2015
                                    </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-trophy bg-warning"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 10 Feb. 2015</span>

                                        <h3 class="timeline-header"><a href="#">Gymnast</a> competed in this competition</h3>

                                        <div class="timeline-body">
                                            <ul class="list-group mb-3">
                                                <li class="list-group-item">
                                                    <b>Competition</b> <a class="float-right">Competition Junior High 2024</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Ranking</b> <a class="float-right">10</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Total Marks</b> <a class="float-right">150/300</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Grouping</b> <a class="float-right">{{ $gymnast["category"] }}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Apparatuses</b>
                                                    <a class="float-right">Cursed Technique | 50/100</a>
                                                    <br>
                                                    <a class="float-right">Barrier Technique | 20/100</a>
                                                    <br>
                                                    <a class="float-right">Innate Technique | 80/100</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-warning btn-flat">View More</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->

                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-trophy bg-warning"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 10 Feb. 2015</span>

                                        <h3 class="timeline-header"><a href="#">Gymnast</a> competed in this competition</h3>

                                        <div class="timeline-body">
                                            <ul class="list-group mb-3">
                                                <li class="list-group-item">
                                                    <b>Competition</b> <a class="float-right">Competition Junior High 2024</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Ranking</b> <a class="float-right">10</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Total Marks</b> <a class="float-right">150/300</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Grouping</b> <a class="float-right">{{ $gymnast["category"] }}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Apparatuses</b>
                                                    <a class="float-right">Cursed Technique | 50/100</a>
                                                    <br>
                                                    <a class="float-right">Barrier Technique | 20/100</a>
                                                    <br>
                                                    <a class="float-right">Innate Technique | 80/100</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-warning btn-flat">View More</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->

                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-success">
                                        2014
                                    </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-trophy bg-warning"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 3 Jan. 2014</span>

                                        <h3 class="timeline-header"><a href="#">Gymnast</a> competed in this competition</h3>

                                        <div class="timeline-body">
                                            <ul class="list-group mb-3">
                                                <li class="list-group-item">
                                                    <b>Competition</b> <a class="float-right">Competition Junior High 2024</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Ranking</b> <a class="float-right">10</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Total Marks</b> <a class="float-right">150/300</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Grouping</b> <a class="float-right">{{ $gymnast["category"] }}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Apparatuses</b>
                                                    <a class="float-right">Cursed Technique | 50/100</a>
                                                    <br>
                                                    <a class="float-right">Barrier Technique | 20/100</a>
                                                    <br>
                                                    <a class="float-right">Innate Technique | 80/100</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-warning btn-flat">View More</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <div>
                                    <i class="far fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

<div class="modal fade" id="edit-competition-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Competition</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Competition Details
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmButton">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="view-competition-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Competition</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Competition Details
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
            </div>
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
                                var routeUrl = "{{ route('gymnast.dashboard') }}";
                                window.location.href = routeUrl;
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
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection