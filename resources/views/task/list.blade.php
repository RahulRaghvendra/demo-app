@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <div class="mb-2 mt-2" style="width:65px;">
                <span style="font-size:18px;">Task List</span>
            </div>
        </div>
        <div class="col-6 text-end">
            <div class="my-2 component">
                <x-permission :value="1011" or="true">
                <x-popup-btn route="{{route('task_add' )}}" width="800" title="Add Task" />
                </x-permission>
            </div>
        </div>
    </div>
    <table class="dataTable table table-striped mt-5" id="myTable" 
    style="border: 1px solid var(--bs-gray-400);">
    <thead>
        <tr>
            <th scope="col">S.no</th>
            <th scope="col">Title</th>
            <th scope="col">Priority</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($post as $index => $designation)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $designation->title }}</td>
                <td>{!! $designation->priorityBadge() !!}</td>
                <td>{!! $designation->statusBadge() !!}</td>
              
                <td>
                    <x-permission :value="1012" or="true">
                     <a 
                    href="{{ route('task_edit', $designation->id) }}"
                    data-fancybox
                    data-type="iframe"
                    data-width="800"
                    data-height="600"
                    title="Edit Designation">
                    <i class="fas fa-pen text-success"></i>
                  </a>
                    </x-permission>
               
                    <x-permission :value="1013" or="true">
                    <a href="{{ route('task_delete', $designation->id) }}" class="text-danger ms-2" onclick="return confirm('Are you sure you want to delete this designation?');">
                        <i class="fas fa-trash"></i>
                    </a> 
                    </x-permission>
                  
                    <x-permission :value="1014" or="true">
                    <a href="{{ route('task_view', $designation->id) }}" data-fancybox
                        data-type="iframe"
                        data-width="800"
                        data-height="600"
                        title="Edit Designation"   class="ms-2">
                      
                        <i class="fas fa-eye"></i>
                    </a> 
                    </x-permission>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No Task found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
@push('scripts')
<script>

    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
@endpush
@endsection
@include('pop-up-script')