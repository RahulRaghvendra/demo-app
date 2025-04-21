@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <div class="mb-2 mt-2">
                <span style="font-size:18px;">Designation List</span>
            </div>
        </div>
        <div class="col-6 text-end mb-3">
            <div class="my-2 component">
                <x-permission :value="1031" or="true">
                <x-popup-btn route="{{route('desig_add' )}}" width="800" title="Add Designation" />
                </x-permission>
            </div>
        </div>
        <table class="dataTable table table-striped mt-5" id="myTable" 
        style="border: 1px solid var(--bs-gray-400);">
        <thead>
            <tr>
                <th scope="col">S.no</th>
                <th scope="col">Designation</th>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($designations as $index => $designation)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $designation->designation }}</td>
                    <td>{{ $designation->type ?? '-' }}</td>
                    <td>
                        <x-permission :value="1032" or="true">
                        <a 
                        href="{{ route('desig_edit', $designation->id) }}"
                        data-fancybox
                        data-type="iframe"
                        data-width="800"
                        data-height="600"
                        title="Edit Designation">
                        <i class="fas fa-pen text-success"></i>
                      </a>
                        </x-permission>
                        <x-permission :value="1033" or="true">
                        <a href="{{ route('desig_delete', $designation->id) }}" class="text-danger ms-2" onclick="return confirm('Are you sure you want to delete this designation?');">
                            <i class="fas fa-trash"></i>
                        </a>
                        </x-permission>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No designations found.</td>
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