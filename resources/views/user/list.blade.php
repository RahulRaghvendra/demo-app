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
                <x-popup-btn route="{{route('user_add' )}}" width="800" title="Add User" />
            </div>
            </div>
    </div>
</div>
@endsection
@include('pop-up-script')