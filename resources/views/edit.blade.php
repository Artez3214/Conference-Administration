@extends('layout')
@section('title', 'Edit')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Conference') }}</div>

                    <div class="card-body">
                        <form action="{{ route('edit.post',['id' => $conferences->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="header">{{ __('Header') }}</label>
                                <input id="header" type="text" class="form-control @error('header') is-invalid @enderror" name="header" value="{{$conferences->header}}" required autocomplete="header" autofocus>

                                @error('header')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{$conferences->description}}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="date">{{ __('Date') }}</label>
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{$conferences->date}}" required autocomplete="date">

                                @error('date')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">{{ __('Address') }}</label>
                                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address">{{$conferences->address}}</textarea>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                                @enderror
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit Conference') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
