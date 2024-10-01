
@extends('frontend.master')
@section('container')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Payment Source Form Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('/editexpenselist/'.$expenselists->id)}}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $expenselists->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Note(if any)') }}</label>

                            <div class="col-md-6">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" rows="3" name="description" placeholder="Type Description here ...">{{ $expenselists->description }}</textarea>
                            
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Is Active') }}</label>
                            <div class="col-md-8">  
                               
                                    <div class="">
                                    <input class="" type="radio" id="is_active" value="ACTIVE" name="is_active" @if($expenselists->is_active==='ACTIVE') checked @endif >
                                    <label for="is_active" class="">ACTIVE</label>   
                                    <input class="" type="radio" id="is_active" value="INACTIVE" name="is_active" @if($expenselists->is_active==='INACTIVE') checked @endif>
                                    <label for="is_active" class="">INACTIVE</label>                                   
                                    </div> 
                                   
                               
                            </div>
                              
                        </div>          

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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