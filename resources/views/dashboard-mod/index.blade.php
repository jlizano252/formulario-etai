@extends('layout.private-layout')

@section('title')
@endsection

@section('description')
@endsection

@section('page-actions')
@endsection

@section('main-content')
<div class="container pt-3 pt-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-11 col-xxl-10 pb-3 px-3 px-md-0">
            @livewire('admin.dashboard.students-table')
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection