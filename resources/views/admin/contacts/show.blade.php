@extends('layouts.app')

@section('title', "Contact #$contact->id")

@section('content')
  <div class="bg-light border-bottom mb-4">
    <div class="container">
      <div class="nav justify-content-center">
        <a class="nav-link" href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
        <a class="nav-link" href="{{ route('contacts.destroy', $contact->id) }}">Delete</a>
      </div>
    </div>
  </div> 

  <div class="container">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        {{-- <a href="{{ route('admin.contacts.index') }}" class="btn btn-link btn-sm me-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="1em" height="1em">
            <path fill="currentColor"
              d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
          </svg>
        </a> --}}
        Contact #{{ $contact->id }}
      </div>

      <div class="card-body">
        <div class="card-text">
            
        <div><strong>Id:</strong> {{ $contact->id }}</div>

        <div><strong>User Name:</strong> {{ $contact->userName }}</div>

        <div><strong>Object:</strong> {{ $contact->object}}</div>

        <div><strong>Email:</strong> {{ $contact->email }}</div>

        <div><strong>Message:</strong> {{ $contact->message }}</div>

        <div><strong>Attachment:</strong>
            <img src="{{ asset('/storage/' . $contact->attachment) }}" style="width: 300px" alt=""></div>

        <div><strong>Created at:</strong> {{ $contact->created_at }}</div>

        <div><strong>Updated at:</strong> {{ $contact->updated_at }}</div>
        </div>

      </div>
    </div>
  </div>

@endsection