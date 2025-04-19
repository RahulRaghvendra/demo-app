@extends('layouts.popup')
@section('content')
<div class="container-fluid">
    <div class="col-sm-12 mb-4">
      <h5>Add Task</h5>  
    </div>
    <div class="modal-body">
        <form method="post" action ="" enctype="multipart/form-data">
            @csrf
       
            <div class="row mb-3">
              {{-- <input type="hidden" name="project_id" value={{isset($project->id) ? $project->id : $projectId}}>
              <input type="hidden" name="flag" value={{isset($chng) ? 'edit' :'add'}}>
              <input type="hidden" name="user_id" value="{{isset($userId) ? $userId : $chng->user_id}}">
              <input type="hidden" name="id" value="{{isset($chng->id) ? $chng->id :''}}"> --}}
              <div class="col-sm-6">
                <label for="subject" class="fw-bolder">User Name</label>
                <input type="text" class="form-control" id="subject" name="user_name" required value="">
              </div>
              <div class="col-sm-6">
                <label for="subject" class="fw-bolder">Designation</label>
                <input type="text" class="form-control" id="subject" name="designation_id" required value="">
              </div>
              <div class="col-sm-6 mt-2">
                <label for="subject" class="fw-bolder">Phone Number</label>
                <input type="text" class="form-control" id="subject" name="user_name" required value="">
              </div>
              <div class="col-sm-6 mt-2">
                <label for="subject" class="fw-bolder">Email</label>
                <input type="text" class="form-control" id="subject" name="designation_id" required value="">
              </div>
              <!--password code -->
              <div class="col-sm-6 mt-2">
                <label for="subject" class="fw-bolder">Password</label>
                <input type="password" class="form-control" id="password" name="" required value="">
              </div>
              <div class="col-sm-6 mt-2">
                <label for="subject" class="fw-bolder">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_pass" name="password" required value="">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
          </form>
    </div>
</div>
@push('scripts')
@endpush

@endsection