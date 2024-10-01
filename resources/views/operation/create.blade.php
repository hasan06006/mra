
@extends('frontend.master')
@section('container')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('MRA Information Entry Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/addmraform') }}" enctype="multipart/form-data" >
                        @csrf
                        
                     <div class="row mb-3">
                            <label for="invoice" class="col-md-4 col-form-label text-md-end">{{ __('Invoice No') }}</label>

                            <div class="col-md-6">
                            <input id="invoice" type="text" class="form-control @error('invoice') is-invalid @enderror" name="invoice" value="{{ $invoice }}" required  readonly>                                                         
                            <!--  <input id="grand_total" type="hidden" class="form-control @error('building_id') is-invalid @enderror" name="building_id" value="" required  readonly>-->

                                @error('grand_total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="expense_type" class="col-md-4 col-form-label text-md-end">{{ __('Miscellaneous Expense') }}</label>

                            <div class="col-md-6">                           
                                <select class="form-control @error('expense_type') is-invalid @enderror" name="expense_type" id="expense_type" required >
                                <option value="">Select One</option>
                                @foreach ($expenselists as $expenselists)
                                      <option value="{{ $expenselists->id }}">{{ $expenselists->name }}</option>
                                @endforeach   
                                                                      
                                </select>                            

                                @error('expense_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="payment_type" class="col-md-4 col-form-label text-md-end">{{ __('Payment Type') }}</label>

                            <div class="col-md-6">                           
                                <select class="form-control @error('payment_type') is-invalid @enderror" name="payment_type" id="payment_type" required >
                                <option value="">Select One</option>  
                                @foreach ($paymentlists as $paymentlists)
                                      <option value="{{ $paymentlists->id }}">{{ $paymentlists->name }}</option>
                                @endforeach   
                                                                      
                                </select>                            

                                @error('payment_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="concern_person" class="col-md-4 col-form-label text-md-end">{{ __('Concern Person') }}</label>

                            <div class="col-md-6">                           
                                <select class="form-control @error('concern_person') is-invalid @enderror" name="concern_person" id="concern_person" required >
                                <option value="">Select One</option>  
                                @foreach ($concernpersons as $concernpersons)
                                        <option value="{{ $concernpersons->id }}">{{ $concernpersons->name }}</option>
                                @endforeach  
                                                                      
                                </select>                            

                                @error('concern_person')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      

                       
                        <div class="row mb-3">
                            <label for="purpose" class="col-md-4 col-form-label text-md-end">{{ __('Purpose') }}</label>

                            <div class="col-md-6">
                            <textarea id="purpose" class="form-control @error('purpose') is-invalid @enderror" rows="3" name="purpose" placeholder="Type purpose here ..."></textarea>
                            
                                @error('purpose')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="name" autofocus>

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="grand_total" class="col-md-4 col-form-label text-md-end">{{ __('Grand Total') }}</label>

                            <div class="col-md-6">
                            <input id="grand_total" type="text" class="form-control @error('grand_total') is-invalid @enderror" name="grand_total" value="" required  readonly>                                                         
                            <!--  <input id="grand_total" type="hidden" class="form-control @error('building_id') is-invalid @enderror" name="building_id" value="" required  readonly>-->

                                @error('grand_total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="word" class="col-md-4 col-form-label text-md-end">{{ __('In words') }}</label>

                            <div class="col-md-6">
                            <textarea id="word" class="form-control @error('address') is-invalid @enderror" rows="3" name="word" placeholder="Type word here ..." required readonly></textarea>
                            
                                @error('word')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="received_by" class="col-md-4 col-form-label text-md-end">{{ __('Recieved By') }}</label>

                            <div class="col-md-6">                           
                                <select class="form-control @error('received_by') is-invalid @enderror" name="received_by" id="received_by"  >
                                <option value="">Select One</option>  
                                @foreach ($rbpeoplelists as $rbpeoplelist)
                                      <option value="{{ $rbpeoplelist->id }}">{{ $rbpeoplelist->name }}</option>
                                @endforeach
                                                                  
                                </select>                            

                                @error('received_by')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>           
                     
                                 

                        <div class="row mb-3">
                            <label for="remarks" class="col-md-4 col-form-label text-md-end">{{ __('Remarks') }}</label>

                            <div class="col-md-6">
                            <textarea id="remarks" class="form-control @error('remarks') is-invalid @enderror" rows="3" name="remarks" placeholder="Type remarks here ..."></textarea>
                            
                                @error('remarks')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prepared_by" class="col-md-4 col-form-label text-md-end">{{ __('Prepared By') }}</label>

                            <div class="col-md-6">                           
                                <select class="form-control @error('prepared_by') is-invalid @enderror" name="prepared_by" id="prepared_by"  >
                                <option value="">Select One</option>  
                                @foreach ($pbpeoplelists as $pbpeoplelist)
                                      <option value="{{ $pbpeoplelist->id }}">{{ $pbpeoplelist->name }}</option>
                                @endforeach
                                                                  
                                </select>                            

                                @error('prepared_by')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>    
                        
                        <div class="row mb-3">
                            <label for="varified_by" class="col-md-4 col-form-label text-md-end">{{ __('Varified By') }}</label>

                            <div class="col-md-6">                           
                                <select class="form-control @error('varified_by') is-invalid @enderror" name="varified_by" id="varified_by"  >
                                <option value="">Select One</option>  
                                @foreach ($vbpeoplelists as $vbpeoplelist)
                                      <option value="{{ $vbpeoplelist->id }}">{{ $vbpeoplelist->name }}</option>
                                @endforeach
                                                                  
                                </select>                            

                                @error('varified_by')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="row mb-3">
                            <label for="approved_by" class="col-md-4 col-form-label text-md-end">{{ __('Approved By') }}</label>

                            <div class="col-md-6">                           
                                <select class="form-control @error('approved_by') is-invalid @enderror" name="approved_by" id="approved_by"  >
                                <option value="">Select One</option>  
                                @foreach ($abpeoplelists as $abpeoplelist)
                                      <option value="{{ $abpeoplelist->id }}">{{ $abpeoplelist->name }}</option>
                                @endforeach
                                                                  
                                </select>                            

                                @error('approved_by')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Document') }}</label>
                            <label for="document"></label>  
                            <div class="col-md-6">
                              
                                <div class="custom-file">                                   
                                    <input type="file" class="form-control" id="document" name="document" >
                                   
                                </div>                             
                                @error('document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                      
                       
                                   

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SAVE') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!--<script src="{{asset('resources/plugins/jquery/jquery.min.js')}}"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
 <script>
        $(document).ready(function() {
            $('#amount').on('input', function() {  // Using 'input' event instead of 'keyup'
                var number = $(this).val();
                $('#grand_total').val(number);

                if (number !== '' && !isNaN(number)) {
                    var words = convertToTakaWords(parseInt(number));
                    $('#word').text(words);
                } else {
                    $('#word').text('');  // Clear words if input is invalid
                }
            });
        });

        function convertToTakaWords(num) {
            var takaWords = ["", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"];
            var takaTens = ["", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];
            var result = "";

            if (num < 20) {
                result = takaWords[num];
            } else if (num < 100) {
                result = takaTens[Math.floor(num / 10)] + " " + takaWords[num % 10];
            } else if (num < 1000) {
                result = takaWords[Math.floor(num / 100)] + " Hundred " + convertToTakaWords(num % 100);
            } else if (num < 100000) {
                result = convertToTakaWords(Math.floor(num / 1000)) + " Thousand " + convertToTakaWords(num % 1000);
            } else if (num < 10000000) {
                result = convertToTakaWords(Math.floor(num / 100000)) + " Lakh " + convertToTakaWords(num % 100000);
            } else {
                result = convertToTakaWords(Math.floor(num / 10000000)) + " Crore " + convertToTakaWords(num % 10000000);
            }

            return result.trim();
        }
    </script>


 @endsection