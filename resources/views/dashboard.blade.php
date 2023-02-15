@extends('layouts.app')

@section('content')
<div class="container">
    {{-- aggiungo link --}}
    
    <a href="{{route('admin.categories.index')}}"></a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- creo card e copio tabella categorie , stamperà ultimi 5  --}}
{{-- "name", "description", "cover_img", "github_link" --}}


