@extends('layouts.popup')
@section('content')
@push('css_or_js')
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color: #1f2d3d !important;
    }

    .select2-container .select2-selection--multiple {
        max-height: 29px !important;
        min-height: 37px !important;
        overflow-x: hidden;
    }

    .select2-container--default {
        width: 100% !important;
    }

    .ms-choice {
        padding: 15px !important;
    }

    .ms-choice > span.placeholder {
        color: white !important;
    }

    .ms-parent {
        width: 184px !important;
    }
</style>
<script src="https://cdn.rawgit.com/wenzhixin/multiple-select/e14b36de/multiple-select.js"></script>
@endpush
<?php $flag='view'; ?>
<div class="container-fluid">
    <div class="col-sm-12 mb-4">
        <h5>View Task</h5>
    </div>
    <div class="modal-body">
      
            <div class="col-12">
                <div class="row mb-3 d-flex justify-content-between align-items-end">
                    <div class="col-sm-4">
                        <label for="user_name" class="fw-bolder">Title</label>
                        <input type="text" class="form-control" name="title"
                               value="{{ $post->title ?? '' }}" 
                               readonly required>
                    </div>

                    {{-- Assign To --}}
                    <div class="col-sm-4">
                        <label for="assign_to" class="fw-bolder">Assign To</label>
                      
                            <p class="form-control bg-light">
                                @php
                                    $assignedNames = $users->whereIn('id', $usersDB ?? [])->pluck('user_name')->toArray();
                                @endphp
                                {{ implode(', ', $assignedNames) }}
                            </p>
                     
                    </div>
                    {{-- Assign To Ends --}}
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <div class="col-sm-4">
                    <label for="deadline" class="fw-bolder">Deadline</label>
                    <input type="date" class="form-control" name="deadline"
                           value="{{ $post->deadline ?? '' }}" 
                           {{ $flag == 'view' ? 'readonly' : '' }} required>
                </div>

                <div class="col-sm-4">
                    <label for="priority" class="fw-bolder">Priority</label>
                    <?php $priorities = __('master.priority'); ?>
                    @if($flag == 'view')
                        <p class="form-control bg-light">{{ $priorities[$post->priority] ?? '-' }}</p>
                    @else
                        <select class="form-select" name="priority" {{ $flag == 'view' ? 'disabled' : '' }} required>
                            <option value="">Select Priority</option>
                            @foreach ($priorities as $id => $designation)
                                <option value="{{ $id }}" 
                                    {{ isset($post) && $post->priority == $id ? 'selected' : '' }}>
                                    {{ $designation }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <div class="col-sm-4">
                    <label for="status" class="fw-bolder">Status</label>
                    <?php $status = __('master.status'); ?>
                    @if($flag == 'view')
                        <p class="form-control bg-light">{{ $status[$post->status] ?? '-' }}</p>
                    @else
                        <select class="form-select" name="status" {{ $flag == 'view' ? 'disabled' : '' }} required>
                            <option value="">Select</option>
                            @foreach ($status as $id => $designation)
                                <option value="{{ $id }}" 
                                    {{ isset($post) && $post->status == $id ? 'selected' : '' }}>
                                    {{ $designation }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <div class="col-sm-12 mt-2">
                    <label for="description" class="fw-bolder">Description</label>
                    @if($flag == 'view')
                        <p class="form-control bg-light">{{ $post->description ?? '-' }}</p>
                    @else
                        <textarea class="form-control" name="description" rows="3" 
                            {{ $flag == 'view' ? 'readonly' : '' }} required>{{ $post->description ?? '' }}</textarea>
                    @endif
                </div>
                @if(isset($post->attachments))
                <div class="col-sm-6">
                        
                    <label for="attachment" class=" fw-bolder">Attachment</label>
               
                   <a class="text-decoration-none" href="{{route('download_file',["task",$post->attachments])}}">
                    <i class="nav-icon fas fa-download"></i>
                                          download
                                        </a>
                                         
                                       
                   
            </div>
            @else
            @endif
            </div>

            @if($flag != 'view')
                <button type="submit" class="btn btn-primary">Submit</button>
            @endif
        </form>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();

        $(".my-select").multipleSelect({ filter: true });
        $(".my-select2").multipleSelect({ filter: true });
    });
</script>
@endpush
@endsection
