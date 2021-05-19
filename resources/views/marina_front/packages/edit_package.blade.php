@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b><i class="fa fa-list-alt "> </i> {{ __('Edit Package') }}</b></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('edit_package') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $package->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text"  class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $package->description  }}" required >

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Rate') }}</label>

                                <div class="col-md-6">
                                    <input id="rate" type="number" min="0"  class="form-control @error('color') is-invalid @enderror" name="rate" value="{{ $package->rate }}" required autofocus>

                                    @error('rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>






                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Update Pakage') }}
                                    </button>
                                </div>
                            </div>
                      
                            <input id="package_id" type="hidden"  class="form-control @error('length') is-invalid @enderror" name="package_id" value="{{ $package->id }}"  >

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
