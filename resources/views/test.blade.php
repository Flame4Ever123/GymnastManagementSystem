@extends('components.template')

@section('header-title')
<h1>Acess Management</h1>
@endsection

@section('header-breadcrumbs')
<li class="breadcrumb-item active">access management</li>
@endsection

@section('content')

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<button type="button" class="btn btn-primary" id="confirmButton">Confirm</button>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You won't be able to revert this!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmButton">Confirm</button>
            </div>
        </div>
    </div>
</div>



<div>
User: {{ $user }}
</div>
@endsection

@section('scripts')
<script>
    document.getElementById("confirmButton").addEventListener("click", function() {
        console.log("Confirm button was pressed");
    });
</script>
@endsection

@section('stylesheets')

@endsection