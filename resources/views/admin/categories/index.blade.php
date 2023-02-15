@extends('layouts.app')

@section('content')
    {{-- riceve categories --}}
    {{-- creo la mia tabella --}}
    
    <div class="container">
        lista categorie: 
        <div class="card">
            <div class="card-boby">
                <div class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <div class="tbody">
                        <tr>
                            {{-- <td>{{category->id}}</td>
                            <td>{{category->name}}</td>
                            <td>{{category->description}}</td> --}}

                        </tr>
                    </div>
                </div>
            </div>
        </div>


        {{-- aggiungo bottone aggiungo categoria --}}
        <a href="{{route('admin.categories.create')}}">Add new category+</a>
    </div>
    @endsection