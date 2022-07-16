@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit State {{ $state->name }}</h1>
    </div>

    <div class="card">
        <div class="card-header">
            Edit State: {{ $state->name }}
            <a href="{{ route('states.index') }}" class="btn btn-primary float-right">Back</a>
        </div>
        <div class="card-body">
            <div class="card-body">
                <form method="POST" action="{{ route('states.update', $state->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Sate name : ') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $state->name) }}"
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
                        <label for="country_code"
                               class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="country_choose">Choose Country</label>
                                </div>
                                <select class="custom-select" name="country_id" id="country_choose">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" @if($country->id === $state->country_id) selected @endif >{{ $country->name }}</option>
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


