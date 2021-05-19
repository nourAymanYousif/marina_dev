@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Boat') }}</div>
                    {{--'name','length', 'color', 'images','user_id'--}}
                    <div class="card-body">
                        <form method="POST" action="{{route('edit_boat')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $boat->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Length') }}</label>

                                <div class="col-md-6">
                                    <input id="length" type="number" min="0" class="form-control @error('length') is-invalid @enderror" name="length" value="{{ $boat->length }}" required >

                                    @error('length')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

                                <div class="col-md-6">
                                    <input id="color" type="color"  class="form-control @error('color') is-invalid @enderror" name="color" value="{{ $boat->color }}" required autofocus>

                                    @error('color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Images') }}</label>

                                <div class="col-md-6">

                                    <input id="images" type="file" multiple class="form-control @error('images') is-invalid @enderror" name="images[]" accept="image/*" value="{{ old('images') }}"   autofocus>


                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>




                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Owner') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control " name="user_id" id="user_id" required>
                                        @foreach($clients as $client)
                                            @if($client == $boat->$client)
                                                <option selected value="{{$client->id}}">{{$client->name}}</option>

                                            @else
                                                <option value="{{$client->id}}">{{$client->name}}</option>

                                            @endif
                                        @endforeach
                                    </select>
                                    @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Package') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control " name="package_id" id="package_id" required>
                                        @foreach($packages as $package)
                                            @if($client == $boat->$client)
                                                <option selected value="{{$package->id}}">{{$package->name}}</option>

                                            @else
                                                <option  value="{{$package->id}}">{{$package->name}}</option>

                                            @endif
                                        @endforeach
                                    </select>
                                    @error('package_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('update client') }}
                                    </button>
                                </div>
                            </div>
                            <input id="boat_id" type="hidden"  class="form-control @error('length') is-invalid @enderror" name="boat_id" value="{{ $boat->id }}"  >

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
