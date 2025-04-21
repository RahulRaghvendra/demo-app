@extends('layouts.popup')
@section('content')
<div class="container-fluid">
    <div class="col-sm-12 mb-4">
        <h5>{{$flag=='edit' ? 'Update User':'Add User'}}</h5>  
    </div>
    <div class="modal-body">
        <form method="post" action="{{route('user_store')}}" enctype="multipart/form-data">
            @csrf
             <input type="hidden" name="id" value="{{isset($user->id) ? $user->id : ''}}">
             <input  type="hidden" name="flag" value="{{$flag}}">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <label for="user_name" class="fw-bolder">User Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" required value="{{isset($user->user_name) ? $user->user_name : ''}}">
                </div>
                <div class="col-sm-6">
                    <label for="designation_id" class="fw-bolder">Designation</label>
                    <select class="form-select" id="designation_id" name="designation_id" required>
                        <option value="">Select Designation</option>
                        @foreach($designations as $id => $designation)
                            <option value="{{ $id }}"{{ isset($user) && $user->designation_id == $id ? 'selected' : '' }}>{{ $designation }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mt-2">
                    <label for="phone" class="fw-bolder">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone" required value="{{isset($user->phone) ? $user->phone : ''}}">
                </div>
                <div class="col-sm-6 mt-2">
                    <label for="email" class="fw-bolder">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required value="{{isset($user->email) ? $user->email : ''}}">
                </div>

                <!-- Password -->
                @if($flag!= 'edit')
                <div class="col-sm-6 mt-2">
                    <label for="password" class="fw-bolder">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password_main" required>
                        <span class="input-group-text">
                            <i class="fa fa-eye toggle-password" data-target="#password" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="col-sm-6 mt-2">
                    <label for="confirm_pass" class="fw-bolder">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirm_pass" name="password" required>
                        <span class="input-group-text">
                            <i class="fa fa-eye toggle-password" data-target="#confirm_pass" style="cursor: pointer;"></i>
                        </span>
                    </div>
                    <small id="password-message" class="text-danger d-none">Passwords do not match!</small>
                </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">{{$flag=='edit'? 'Update':'Submit'}}</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<!-- jQuery (required for the password toggle and validation) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        // Show/hide password
        $('.toggle-password').on('click', function () {
            let targetInput = $($(this).data('target'));
            let type = targetInput.attr('type') === 'password' ? 'text' : 'password';
            targetInput.attr('type', type);
            $(this).toggleClass('fa-eye fa-eye-slash');
        });

        // Password match check on blur
        $('#confirm_pass').on('blur', function () {
            let password = $('#password').val();
            let confirm = $(this).val();

            if (password !== confirm) {
                $('#password-message').removeClass('d-none');
            } else {
                $('#password-message').addClass('d-none');
            }
        });
    });
</script>
@endpush
