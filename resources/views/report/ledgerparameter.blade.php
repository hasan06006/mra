@extends('frontend.master')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Ledger Report') }}</h3>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('ledger-report-action') }}">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="concernpersons_id">Customer</label>
                                <select name="concernpersons_id" id="concernpersons_id" class="form-control">
                                    <option value="">All Customers</option>
                                    @foreach($concernPersons as $person)
                                        <option value="{{ $person->id }}" {{ request('concernpersons_id') == $person->id ? 'selected' : '' }}>
                                            {{ $person->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label for="type">Transaction Type:</label>
                                <select name="type" class="form-control" >
                                    <option value=""  >All</option>
                                    <option value="Credit" {{ request('type') == 'Credit' ? 'selected' : '' }}>Credit</option>
                                    <option value="Debit" {{ request('type') == 'Debit' ? 'selected' : '' }}>Debit</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
                            </div>
                            <div class="form-group col-12">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
                            </div>
                            
                            <div class="form-group col-12">
                                <button type="submit" class="btn btn-primary btn-block">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('resources/plugins/jquery/jquery.min.js') }}"></script>

@endsection
