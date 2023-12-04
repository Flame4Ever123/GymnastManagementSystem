@extends('components.template')

@section('header-title')
<h1>Update Gymnast</h1>
@endsection

@section('header-breadcrumbs')
<li class="breadcrumb-item active">update gymnast</li>
@endsection

@section('content')
<div class="mx-5">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Gymnast Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="update-gymnast-form" action="gymnast.form.update" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="inputName">Full Name</label>
                        <input value="{{ $gymnast["name"] }}" type="text" name="name" class="form-control" id="inputName" placeholder="Enter name">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="inputClub">Gymnast ID</label>
                        <input value="{{ $gymnast["member_id"] }}" type="text" name="member_id" class="form-control" id="inputClub" placeholder="Enter ID">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Coach</label>
                            <select name="coach" class="form-control">
                                @foreach($coaches as $coach)
                                <option value="{{ $coach['id'] }}" @if($gymnast["coach_id"]==$coach['id']) selected @endif>
                                    {{ $coach["name"] }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Club</label>
                            <select name="club" class="form-control">
                                @foreach($clubs as $club)
                                <option value="{{ $club['id'] }}" @if($gymnast["club_id"]==$club['id']) selected @endif>
                                    {{ $club["club_name"] }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Grouping</label>
                            <select name="grouping" class="form-control">
                                @foreach($groupings as $grouping)
                                <option @if($gymnast["category"]==$grouping["name"]) selected @endif>
                                    {{ $grouping["name"] }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="inputName">Year of Birth</label>
                        <input value="{{ $gymnast["year_of_birth"] }}" type="text" name="year_of_birth" class="form-control" id="inputName2" placeholder="Enter Year of Birth">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Notes</label>
                            <textarea name="note" class="form-control" rows="3" placeholder="Enter ...">{{ $gymnast["notes"] }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer row">
                    <div class="col-6 d-flex">
                        <a href="{{ route('gymnast.dashboard') }}" type="button" class="btn btn-primary">Back</a>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" id="submit-button">Submit</button>
                    </div>
                </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('submit-button').addEventListener('click', function(event) {
        var formData = new FormData(document.getElementById('update-gymnast-form'));
        formData.append('id', "{{ $gymnast["id"] }}");

        Swal.fire({
            title: 'Are you sure?',
            text: "You'll save the new info!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/gymnast/edit', formData)
                    .then(response => {
                        if (response.status == 200) {
                            Swal.fire(
                                'Updated!',
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
                                html: 'A server error occurred while updating the gymnast.<br><br>' + response.data.message,
                            })
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: 'An error occurred while updating the gymnast.<br><br>' + error,
                        })
                    });
            }
        })
    });
</script>
@endsection

@section('stylesheets')
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
</head>
@endsection