@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit City {{ $city->name }}</h1>
    </div>

    <div class="card">
        <div class="card-header">
            Edit City: {{ $city->name }}
            <a href="{{ route('cities.index') }}" class="btn btn-primary float-right">Back</a>
        </div>
        <div class="card-body">
            <div class="card-body">
                <form method="POST" action="{{ route('cities.update', $city->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('City name : ') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $city->name) }}"
                                   required
                                   autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="state"
                               class="col-md-4 col-form-label text-md-end">{{ __('State') }}</label>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="state_choose">Choose State</label>
                                </div>
                                <select class="custom-select" name="state_id" id="state_choose">
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}" @if($state->id === $city->country_id) selected @endif >{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



