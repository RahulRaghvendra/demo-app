@extends('layouts.app')
@section('content')
<!-- Content -->
<style>
        /* Additional CSS for custom styling */
        

        .card {
            top:-5px;
            max-width: 400px;
            margin: 150px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            /* background-color: #000000; */
            
            border-bottom: none;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
          
        }

        .card-body {
            padding: 20px;
        }

        h3 {
            text-align: center;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-dark {
            width: 100%;
        }

        .text-danger {
            font-size: 0.9rem;
        }
    </style>
<div class="container ">
        <div class="card">
            <div class="card-header">
                Change Password
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('change_pwd')}}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user_id}}" class="form-control" aria-describedby="oldPasswordHelpInline">
                    <div class="row g-3 align-items-center">
                        <!-- Old Password -->
                        <div class="col-4">
                            <label for="inputOldPassword" class="col-form-label">Current Password</label>
                        </div>
                        <div class="col-8">
                            <input type="password" id="current_pwd" name="current_pwd" class="form-control" aria-describedby="oldPasswordHelpInline">
                        </div>
                      
                    </div>

                    <div class="row g-3 align-items-center mt-3">
                        <!-- New Password -->
                        <div class="col-4">
                            <label for="newpassword" class="col-form-label">New Password</label>
                        </div>
                        <div class="col-8">
                            <input type="password" name="new_pwd" class="form-control" aria-describedby="newPasswordHelpInline">
                        </div>
                        
                    </div>

                    <div class="row g-3 align-items-center mt-3">
                        <!-- Confirm Password -->
                        <div class="col-4">
                            <label for="inputConfirmPassword" class="col-form-label">Confirm Password</label>
                        </div>
                        <div class="col-8">
                            <input type="password" name="confirm_pwd" id="inputConfirmPassword" class="form-control" aria-describedby="confirmPasswordHelpInline">
                        </div>
                      
                    </div>

                    <div class="mt-3 col-12">
                        <button type="submit" class="btn btn-primary w-100">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection