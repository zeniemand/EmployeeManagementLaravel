@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create a new Department</h1>
    </div>

    <div class="card">
        <div class="card-header">
            Create City
            <a href="{{ route('departments.index') }}" class="btn btn-primary float-right">Back</a>
        </div>
        <div class="card-body">
            <div class="card-body">
                <form method="POST" action="{{ route('departments.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Department Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Create new department
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
