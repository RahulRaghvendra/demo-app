@extends('layouts.popup')
@section('content')
    @push('css_or_js')
        <style>
            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                color: #1f2d3d !important;
            }

            .select2-container .select2-selection--multiple {
                max-height: 29px ! important;
                min-height: 37px !important;

                overflow-x: hidden;

            }

            .select2-container--default {
                width: 100% !important;


            }

            .ms-choice {
                padding: 15px !important;
            }

            .ms-choice>span.placeholder {
                color: white !important;

            }
            .ms-parent  {
                width: 184px !important;
            }
        </style>
        <script src="https://cdn.rawgit.com/wenzhixin/multiple-select/e14b36de/multiple-select.js"></script>
    @endpush
    <div class="container-fluid">
        <div class="col-sm-12 mb-4">
            <h5>{{$flag=='add '?'Add Task':'Edit Task'}}</h5>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('task_store') }}" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ isset($post->id) ? $post->id : '' }}">
                <input type="hidden" name="flag" value="{{ $flag }}">
                @csrf
                <div class="col-12">
                    <div class="row mb-3 d-flex justify-content-between align-items-end">
                        <div class="col-sm-4">
                            <label for="user_name" class="fw-bolder">Title</label>
                            <input type="text" class="form-control" id="user_name" name="title" required
                                value="{{ isset($post->title) ? $post->title : '' }}">
                        </div>
                     
                        {{-- assign to  --}}
                        <div class="col-sm-4">
                            <label for="assign_to" class="col-form-label  fw-bolder">Assign To </label>
                           
                                   <select id="my-select" class="my-select"  name="assigned_to[]" multiple="multiple">
                                     @if(isset($post))
                                     @foreach ($users as $user1)
                                         <option value="{{ $user1->id}}" {{ in_array($user1->id, $usersDB) ? 'selected' : '' }}>
                                             {{ $user1->user_name }} - {{$user1->designation_name}} 
                                         </option>
                                     @endforeach
                                     @else
                                     @foreach ($users as $useropt)
                                     <option value="{{ $useropt->id }}">
                                         {{ $useropt->user_name }} - {{$useropt->designation_name}}
                                     </option>
                                     @endforeach
                                     @endif
                                 </select>
                         
                       </div>
                        {{-- assign to ends  --}}
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <div class="col-sm-4 ">
                        <label for="deadline" class="fw-bolder">Deadline</label>
                        <input type="date" class="form-control" id="deadline" name="deadline" required
                        value="{{ isset($post->deadline) ? date('Y-m-d', strtotime($post->deadline)) : '' }}">
                    </div>
                    <div class="col-sm-4">
                        <label for="designation_id" class="fw-bolder">Priority</label>
                        <?php $priorities = __('master.priority'); ?>
                        <select class="form-select" id="priority" name="priority" required>
                            <option value="">Select Designation</option>
                            @foreach ($priorities as $id => $designation)
                                <option
                                    value="{{ $id }}"{{ isset($post) && $post->priority == $id ? 'selected' : '' }}>
                                    {{ $designation }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label for="designation_id" class="fw-bolder">Status</label>
                        <?php $status = __('master.status'); ?>
                        <select class="form-select" id="status" name="status" required>
                            <option value="">Select</option>
                            @foreach ($status as $id => $designation)
                                <option
                                    value="{{ $id }}"{{ isset($post) && $post->status == $id ? 'selected' : '' }}>
                                    {{ $designation }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <label for="designation_id" class="fw-bolder">Description</label>

                        <textarea class="form-control" id="description" name="description" rows="3"
                            required>{{ isset($post->description) ? $post->description : '' }}</textarea>
                    </div>
                    <div class="col-sm-6">
                        
                            <label for="attachment" class=" fw-bolder">Attachment</label>
                            <input class="form-control" type="file" id="attachment" name="attachments">@if(isset($post->attachments))
                           <a class="text-decoration-none" href="{{route('download_file',["task",$post->attachments])}}">
                            <i class="nav-icon fas fa-download"></i>
                                                  download
                                                </a>
                                                  @else
                                                @endif
                           
                    </div>

                </div>
               

                <button type="submit" class="btn btn-primary">{{$flag=='add'? 'Submit':'Update'}}</button>
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {

                $('.js-example-basic-multiple').select2();

                // Initialize multiple select on your regular select
                $(".my-select").multipleSelect({
                    filter: true
                });
                $(".my-select2").multipleSelect({
                    filter: true
                });
            });
             // Set min and max date for deadline
    let today = new Date();
    let yyyy = today.getFullYear();
    let mm = String(today.getMonth() + 1).padStart(2, '0');
    let dd = String(today.getDate()).padStart(2, '0');

    let minDate = `${yyyy}-${mm}-${dd}`;
    let maxDate = `${yyyy}-12-31`;

    $('#deadline').attr('min', minDate);
    $('#deadline').attr('max', maxDate);
        </script>
    @endpush
@endsection
