@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">States</h1>
    </div>

    <div class="card">
        <div class="card-header">
            @include('parts.messages')
            <div class="row">
                <div class="col">
                    <form method="GET" action="{{ route('states.index') }}">
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
                    <a href="{{ route('states.create') }}" class="btn btn-primary mb-2 float-right">Create state</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">State name</th>
                    <th scope="col">Country code</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($states as $state)
                    <tr>
                        <th scope="row">{{ $state->id }}</th>
                        <td>{{ $state->name }}</td>
                        <td>{{ $state->country->country_code }}</td>
                        <td class="form-inline">
                            <a href="{{ route('states.edit', $state->id ) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('states.destroy', $state->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure to delete?')"
                            >
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

