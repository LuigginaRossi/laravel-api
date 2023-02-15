@extends('layouts.app')

@section('content')
    <div class="container py-5">
        

        <h1>CREATE NEW PROJECT</h1>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- name-input --}}
        <div class="mb-3">
            <label class="form-label">Name Project</label>
            <input type="text" 
            class="form-control @error('name') is-invalid @elseif(old('name')) is-valid  @enderror"
            value="{{ $errors->has('name') ? '' : old('name') }}"
            name="name">
            
            @error('name')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            {{-- @elseif(old('name'))
                valid-feedback
                <div class="valid-feedback">
                Ottimo lavoro!
                </div> --}}
            @enderror
        </div>

        {{-- type -input --}}
        <div class="mb-3">
          <label class="form-label">Typology</label>
          <select class="form-select" name="type_id">
            @foreach ($types as $type )
              <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
          </select>
        </div>

        {{-- description-input --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea cols="30" rows="5" 
             name="description"
             class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
        </div>

        {{-- cover_img input --}}
        <div class="mb-3">
            <label class="form-label">Cover Image</label>
            <input type="file" class="form-control  @error('cover_img') is-invalid @enderror" name="cover_img">
            {{-- @error('cover_img')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror --}}
          </div>
          
          {{-- completed input --}}
          <div class="mb-3 form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="switch_public" name="public"
              {{ old('public', 1) ? 'checked' : '' }} value="1">
            <label class="form-check-label" for="switch_public">Completed</label>
          </div>

          {{-- technologies input --}}
          {{-- @dd($technologies) --}}
          <div class="py-3">
            <div class="py-2">Technologies:</div>
            @foreach ($technologies as $technology)
              <div class="form-check">
                <input class="form-check-input @error('technologies') is-invalid @enderror"
                type="checkbox" value="{{$technology->id}}" id="technology_{{$loop->index}}"
                name="technologies[]"   {{ in_array( $technology->id, old('technologies', [])) ? 'checked' : '' }} >
                <label class="form-check-label" for="technology_{{$loop->index}}">
                  {{$technology->name}}
                </label>
                @error('technologies')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
                
              </div>
            @endforeach
          </div>
          

          {{-- github_link --}}
          <div class="mb-3">
            <label class="form-label">GitHub Link</label>
            <input type="url" 
            class="form-control @error('github_link') is-invalid @elseif(old('github_link')) is-valid  @enderror"
            name="{{ $errors->has('github_link') ? '' : old('github_link') }}">
            
            @error('github_link')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
      
        <button type="submite" class="btn btn-primary">Save</button>

        <a class="btn btn-warning" href="{{route('admin.projects.index')}}">Return To Projects</a>
    </div>
@endsection