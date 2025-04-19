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
                <x-popup-btn route="{{route('task_add' )}}" width="600" title="Add Task" />
            </div>
            </div>
    </div>
</div>
@endsection
@include('pop-up-script')