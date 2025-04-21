@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <div class="mb-2 mt-2">
                <span style="font-size:18px;">User List</span>
            </div>
        </div>
        <div class="col-6 text-end">
            <div class="my-2 component">
                <x-permission :value="1021" or="true">
                <x-popup-btn route="{{route('user_add' )}}" width="800" title="Add User" />
                </x-permission>
            </div>
        </div>
        <table class="dataTable table table-striped mt-5" id="myTable" 
        style="border: 1px solid var(--bs-gray-400);">
        <thead>
            <tr>
                <th scope="col">S.no</th>
                <th scope="col">User Name</th>
                <th scope="col">Designation</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $index => $designation)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $designation->user_name }}</td>
                    <td>{{ $designation->designation_name }}</td>
                  
                    <td>
                        <x-permission :value="1022" or="true">
                        <a 
                        href="{{ route('user_edit', $designation->id) }}"
                        data-fancybox
                        data-type="iframe"
                        data-width="800"
                        data-height="600"
                        title="Edit Designation">
                        <i class="fas fa-pen text-success"></i>
                      </a>
                        </x-permission>
                     
                        <x-permission :value="1023" or="true">
                        <a href="{{ route('user_delete', $designation->id) }}" class="text-danger ms-2" onclick="return confirm('Are you sure you want to delete this designation?');">
                            <i class="fas fa-trash"></i>
                        </a>
                        </x-permission>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
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