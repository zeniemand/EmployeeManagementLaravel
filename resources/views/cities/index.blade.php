@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cities</h1>
    </div>

    <div class="card">
        <div class="card-header">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col">
                    <form method="GET" action="{{ route('cities.index') }}">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search"
                                       name="search"
                                       class="form-control mb-2"
                                       id="search"
                                       placeholder="search name">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <a href="{{ route('cities.create') }}" class="btn btn-primary mb-2 float-right">Create city</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">City name</th>
                    <th scope="col">State name</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                    <tr>
                        <th scope="row">{{ $city->id }}</th>
                        <td>{{ $city->name }}</td>
                        <td>{{ $city->state->name }}</td>
                        <td class="form-inline">
                            <a href="{{ route('cities.edit', $city->id ) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('cities.destroy', $city->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection


