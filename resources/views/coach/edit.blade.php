@extends('components.template')

@section('header-title')
<h1>Edit Coach</h1>
@endsection

@section('header-breadcrumbs')
<li class="breadcrumb-item active">edit coach</li>
@endsection

@section('content')
<div class="mx-5">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Coach Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="edit-coach-form" action="coach.form.edit" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="inputName">Full Name</label>
                        <input value="{{ $coach["name"] }}" type="text" name="name" class="form-control" id="inputName" placeholder="Enter name">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="inputLicenseNo">License No</label>
                        <input value="{{ $coach["license_number"] }}" type="text" name="license_no" class="form-control" id="inputLicenseNo" placeholder="Enter license no">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="inputPhoneNo">Phone No</label>
                        <input value="{{ $coach["phone"] }}" type="text" name="phone_no" class="form-control" id="inputPhoneNo" placeholder="Enter phone no">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="inputEmail">Email</label>
                        <input value="{{ $coach["email"] }}" type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter email">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="inputDiscipline">Discipline</label>
                        <input value="{{ $coach["discipline"] }}" type="text" name="discipline" class="form-control" id="inputDiscipline" placeholder="Enter discipline">
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>States</label>
                            <select name="state" class="form-control">
                                <option disabled selected>Select a State</option>
                                @foreach($states as $state)
                                <option @if($coach["state"]==$state["name"]) selected @endif>{{ $state["name"] }}</option>
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
                            <textarea name="address" class="form-control" rows="3" placeholder="Enter address">{{ $coach["home_address"] }}"</textarea>
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
        var formData = new FormData(document.getElementById('edit-coach-form'));
        formData.append('id', "{{ $coach["id"] }}");
        
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
                axios.post('/coach/edit', formData)
                    .then(response => {
                        if (response.status == 200) {
                            Swal.fire(
                                'Updated!',
                                response.data.message,
                                'success'
                            ).then(() => {
                                var routeUrl = "{{ route('coach.dashboard') }}";
                                window.location.href = routeUrl;
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                html: 'A server error occurred while updating the coach.<br><br>' + response.data.message,
                            })
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: 'An error occurred while creating the coach.<br><br>' + error,
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