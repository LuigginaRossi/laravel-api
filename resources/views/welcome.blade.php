@extends('layouts.guest')
@section('content')

<div class="bg-black jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <div class="logo_laravel">
            <img src="{{Vite::asset('resources/imgs/Logo.png')}}"" alt="" class="logo_welcome">
        </div>
        <h1 class="display-5 fw-bold">
            Welcome!
        </h1>
        <a class="btn btn-danger my-5 " href="{{route('admin.projects.index')}}">Lista Progetti</a>
        {{-- <a class="btn btn-danger my-5 " href="{{route('layouts.about')}}">Aboute</a> --}}
        
    </div>
</div>

{{-- <div class="content">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
    </div>
</div> --}}
@endsection
