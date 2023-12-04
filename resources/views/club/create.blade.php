@extends('components.template')

@section('header-title')
<h1>Create Club</h1>
@endsection

@section('header-breadcrumbs')
<li class="breadcrumb-item active">create club</li>
@endsection

@section('content')
<div class="mx-5">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Club Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="create-club-form" action="club.form.create" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="inputName">Full Name</label>
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter name">
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>States</label>
                            <select name="state" class="form-control">
                                <option disabled selected>Select a State</option>
                                @foreach($states as $state)
                                <option>{{ $state["name"] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Addresss</label>
                            <textarea name="address" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
        var formData = new FormData(document.getElementById('create-club-form'));
        console.log(formData);
        Swal.fire({
            title: 'Are you sure?',
            text: "You'll create a new club!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/club/create', formData)
                    .then(response => {
                        if (response.status == 200) {
                            Swal.fire(
                                'Created!',
                                response.data.message,
                                'success'
                            ).then(() => {
                                var routeUrl = "{{ route('club.dashboard') }}";
                                window.location.href = routeUrl;
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                html: 'A server error occurred while creating the club.<br><br>' + response.data.message,
                            })
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: 'An error occurred while creating the club.<br><br>' + error,
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