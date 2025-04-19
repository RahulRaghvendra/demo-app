@extends('layouts.popup')
@section('content')
<div class="container-fluid">
    <div class="row">
    
    </div>
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">{{ isset($designation) ? 'Edit User' : 'Designation Registration' }}</h5>
      </div>
      <div class="card-body">
        <form method="post" action="">
          @csrf
          <input type="hidden" name="flag" value="{{ isset($designation) ? 'edit' : 'add' }}">
          <input type="hidden" name="id" value="{{ isset($designation) ? $designation->id : '' }}">
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="designation" class="form-label">Role</label>
              <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Designation" aria-describedby="designationHelp" value="{{ old('designation', isset($designation) ? $designation->designation : '') }}">
            </div>
            <div class="col-md-4 mb-3">
              <label for="designation" class="form-label">Type</label>
              <input type="text" class="form-control" id="type" name="type" placeholder="Enter Type e.g management" aria-describedby="designationHelp" value="{{ old('designation', isset($designation) ? $designation->type : '') }}">
            </div>
  
            <div class="col-md-4 mb-3">
              <label for="status" class="form-label"> Status</label>
              <select class="form-control" id="status" name="status">
                <option value="1" {{ old('status', isset($designation) ? $designation->status : '') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', isset($designation) ? $designation->status : '') == '0' ? 'selected' : '' }}>Inactive</option>
              </select>
            </div>
            <!--permissions--->
        
                    @php($menus = __('menu.menu'))
                    @php($submenu = __('menu.submenu'))
                    @foreach ($menus as $key => $value)
                      <div class ="col-md-12 mt-3 mb-3">
                        <strong class="p-1">{{$value}}</strong>
                         @if(isset($submenu[$key]))
                          @foreach($submenu[$key] as $subKey =>$subValue)
                          <x-custom-checkbox name="menu_id[]" id="menu_{{ $subKey }}"
                          value="{{ $subKey }}" :checked="isset($menuRights) ? $menuRights :0"
                          label="{{ $subValue }}" />
                  @endforeach
              @endif
            </div>
            @endforeach
  
            <!--permissions--->
          </div>
          <button type="submit" class="btn btn-primary">{{ isset($designation) ? 'Update' : 'Register' }}</button>
        </form>
      </div>
    </div>
  </div>
@push('scripts')
@endpush

@endsection