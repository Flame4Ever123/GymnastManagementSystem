@extends('components.template')

@section('header-title')
<h1>Create Gymnast</h1>
@endsection

@section('header-breadcrumbs')
<li class="breadcrumb-item active">create gymnast</li>
@endsection

@section('content')
<div class="mx-5">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Gymnast Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="create-gymnast-form" action="gymnast.form.create" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="inputName">Full Name</label>
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter name">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="inputClub">Gymnast ID</label>
                        <input type="text" name="member_id" class="form-control" id="inputClub" placeholder="Enter ID">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Coach</label>
                            <select name="coach" class="form-control">
                            <option disabled selected>Select a Coach</option>
                                @foreach($coaches as $coach)
                                <option value="{{ $coach['id'] }}">{{ $coach["name"] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Club</label>
                            <select name="club" class="form-control">
                            <option disabled selected>Select a Club</option>
                                @foreach($clubs as $club)
                                <option value="{{ $club['id'] }}">{{ $club["club_name"] }}</option>
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
                            <option disabled selected>Select a Grouping</option>
                                @foreach($groupings as $grouping)
                                <option>{{ $grouping["name"] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="inputName">Year of Birth</label>
                        <input type="text" name="year_of_birth" class="form-control" id="inputName2" placeholder="Enter Year of Birth">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Notes</label>
                            <textarea name="note" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </div>

                    <!-- 
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Apparatuses</label>
                            <select name="apparatus[]" class="select2bs4" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                <option value="Alabama">Alabama</option>
                                <option value="Alaska">Alaska</option>
                                <option value="California">California</option>
                                <option value="Delaware">Delaware</option>
                                <option value="Tennessee">Tennessee</option>
                                <option value="Texas">Texas</option>
                                <option value="Washington">Washington</option>
                            </select>
                        </div>
                    </div>
                    -->
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
        var formData = new FormData(document.getElementById('create-gymnast-form'));
        console.log(formData);
        Swal.fire({
            title: 'Are you sure?',
            text: "You'll create a new member!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/gymnast/create', formData)
                    .then(response => {
                        if (response.status == 200) {
                            Swal.fire(
                                'Created!',
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
                                html: 'A server error occurred while creating the gymnast.<br><br>' + response.data.message,
                            })
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: 'An error occurred while creating the gymnast.<br><br>' + error,
                        })
                    });
            }
        })
    });
</script>

<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>
@endsection

@section('stylesheets')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
</head>
@endsection