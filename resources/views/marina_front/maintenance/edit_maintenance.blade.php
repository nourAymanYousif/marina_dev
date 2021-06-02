@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b><i class="fa fa-list-alt "> </i> {{ __('Edit Maintenance') }}</b></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('edit_maintenance') }}">
                            @csrf

                        

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text"  class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $maintenance->description }}" required >

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
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $maintenance->price }}" required autocomplete="price" autofocus>

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
                                        <option value="{{$maintenance->boat->id}}"> {{$maintenance->boat->id}} - {{$maintenance->boat->name}}</option>

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
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Update Pakage') }}
                                    </button>
                                </div>
                            </div>
                      
                            <input id="maintenance_id" type="hidden"  class="form-control @error('length') is-invalid @enderror" name="maintenance_id" value="{{ $maintenance->id }}"  >
                            <input id="oldBoat_id" type="hidden"  class="form-control @error('length') is-invalid @enderror" name="oldBoat_id" value="{{ $maintenance->boat_id }}"  >

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
