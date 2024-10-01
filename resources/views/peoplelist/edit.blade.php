
@extends('frontend.master')
@section('container')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('People List Entry Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('/editpeoplelist/'.$peoplelists->id)}}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="office_id" class="col-md-4 col-form-label text-md-end">{{ __('Office ID') }}</label>

                            <div class="col-md-6">
                                <input id="office_id" type="text" class="form-control @error('office_id') is-invalid @enderror" name="office_id" value="{{ $peoplelists->office_id }}" required autocomplete="office_id" autofocus>

                                @error('office_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('FUll Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $peoplelists->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Is Received By') }}</label>
                            <div class="col-md-8">  
                               
                                  <div class="">
                                    <input class="" type="radio" id="is_received_by" value="YES" name="is_received_by" @if($peoplelists->is_received_by==='YES') checked @endif >
                                    <label for="is_received_by" class="">YES</label>   
                                    <input class="" type="radio" id="is_received_by" value="NO" name="is_received_by" @if($peoplelists->is_received_by==='NO') checked @endif>
                                    <label for="is_received_by" class="">NO</label>                                   
                                 </div>                            
                               
                            </div>
                              
                        </div> 
                        
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Is Prepared By ') }}</label>
                            <div class="col-md-8">  
                               
                                  <div class="">
                                    <input class="" type="radio" id="is_prepared_by" value="YES" name="is_prepared_by" @if($peoplelists->is_prepared_by==='YES') checked @endif >
                                    <label for="is_prepared_by" class="">YES</label>   
                                    <input class="" type="radio" id="is_prepared_by" value="NO" name="is_prepared_by" @if($peoplelists->is_prepared_by==='NO') checked @endif>
                                    <label for="is_prepared_by" class="">NO</label>                                   
                                 </div>                            
                               
                            </div>
                              
                        </div> 
                        
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Is Varified By ') }}</label>
                            <div class="col-md-8">  
                               
                                  <div class="">
                                    <input class="" type="radio" id="is_varified_by" value="YES" name="is_varified_by" @if($peoplelists->is_varified_by==='YES') checked @endif >
                                    <label for="is_varified_by" class="">YES</label>   
                                    <input class="" type="radio" id="is_varified_by" value="NO" name="is_varified_by" @if($peoplelists->is_varified_by==='NO') checked @endif>
                                    <label for="is_varified_by" class="">NO</label>                                   
                                 </div>                            
                               
                            </div>
                              
                        </div>
                        
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Is Approved By ') }}</label>
                            <div class="col-md-8">  
                               
                                  <div class="">
                                    <input class="" type="radio" id="is_approved_by" value="YES" name="is_approved_by" @if($peoplelists->is_approved_by==='YES') checked @endif >
                                    <label for="is_approved_by" class="">YES</label>   
                                    <input class="" type="radio" id="is_approved_by" value="NO" name="is_approved_by" @if($peoplelists->is_approved_by==='NO') checked @endif>
                                    <label for="is_approved_by" class="">NO</label>                                   
                                 </div>                            
                               
                            </div>
                              
                        </div>    
                       

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Is Active') }}</label>
                            <div class="col-md-8">  
                               
                                  <div class="">
                                    <input class="" type="radio" id="is_active" value="ACTIVE" name="is_active" @if($peoplelists->is_active==='ACTIVE') checked @endif >
                                    <label for="is_active" class="">ACTIVE</label>   
                                    <input class="" type="radio" id="is_active" value="INACTIVE" name="is_active" @if($peoplelists->is_active==='INACTIVE') checked @endif>
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