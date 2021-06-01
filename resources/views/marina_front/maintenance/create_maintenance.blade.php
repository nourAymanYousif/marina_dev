@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b><i class="fa fa-list-alt "> </i> {{ __('Create Maintenance') }}</b></div>
                    {{--'name','length', 'color', 'images','user_id'--}}
                    <div class="card-body">
                        <form method="POST" action="{{ route('create_maintenance') }}">
                            @csrf

                        



                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text"  class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required >

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Boats') }}</label>
    
                                <div class="col-md-6">
                                    <select class="form-control " name="boat_id" id="boat_id" required>
                                        <option value="">Please Select Boat</option>
                                        @foreach($boats as $boat)
                                            <option value="{{$boat->id}}"> {{$boat->id}} - {{$boat->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('payment_method')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                     








                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Create Maintenance Order') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
