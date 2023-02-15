@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">


        <div class="card" style="width: 18rem;">
            <img src="{{asset('/storage/'.  $project->cover_img)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Titolo:{{$project->name}}</h5>
              {{-- @dump($project->types) errore null --}}
              <h5 class="card-title">Tipologia: {{$project->type->name ?? ''}}</h5>
              
              <h5 class="card-title">Technology: 
                @foreach ($project->technologies as $technology)
                <span class="badge rounded-pill text-bg-secondary">{{ $technology->name }}</span>
                @endforeach
              </h5>
              {{-- @dump($project->technologies) --}}
        

              <p class="card-text">{{$project->description}}</p>
              <a href="{{$project->github_link}}">
                <i class="fa-brands fa-github"></i>
              </a>
              <a class="btn btn-warning" href="{{route('admin.projects.index')}}">Return To Projects</a>
              <a class="btn btn-warning" href="{{route('admin.projects.edit', $project->id)}}">edit</a>
            </div>
          </div>
    {{-- @else
    <h1>INCOMING...</h1>
    @endif --}}
</div>
@endsection