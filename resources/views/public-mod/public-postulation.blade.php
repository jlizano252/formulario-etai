@extends('layout.public-layout')

@section('main-content')

<link rel="stylesheet" href="{{ asset('css/registration.css') }}">

<div class="registration-page">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-xl-7">

                @livewire('public.enrollment-form.v1.student-form')

            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
<script>
window.addEventListener('load', function () {
    let preloader = document.querySelector('#preloader');

    if(preloader){
        preloader.classList.add('hide-element');

        setTimeout(() => {
            preloader.classList.add('d-none');
        }, 500);
    }
});
</script>
@endsection
