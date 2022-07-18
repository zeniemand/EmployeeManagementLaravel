@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Departments</h1>
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
                    <form method="GET" action="{{ route('departments.index') }}">
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
                    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-2 float-right">Create department</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Department name</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                    <tr>
                        <th scope="row">{{ $department->id }}</th>
                        <td>{{ $department->name }}</td>
                        <td class="form-inline">
                            <a href="{{ route('departments.edit', $department->id ) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('departments.destroy', $department->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure to delete?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger ml-2" >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
