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
                <label for="subject" class=" text-danger fw-bolder">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" required value="">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-12">
                <label for="summary" class="col-form-label text-danger fw-bolder">Summary</label>
                <textarea class="form-control " id="summary" rows="3" name="summary" ></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-6">
                <label for="attachment" class="col-sm-3 col-form-label text-danger fw-bolder">Attachment</label>
                <input class="form-control" type="file" id="attachment" name="file">
              </div>
              <div class="col-sm-6">
                <label for="attachmentinfo" class="col-sm-3 col-form-label text-danger fw-bolder">Attachment  Info</label>

                <input class="form-control" type="text" id="attachmentinfo" name="file_info"  value="">


              </div>
            </div>
            
            <button type="submit" class="btn btn-primary">submit</button>
          </form>
    </div>
</div>
@endsection