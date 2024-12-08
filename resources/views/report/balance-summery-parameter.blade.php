@extends('frontend.master')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Balance Summery Report') }}</h3>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('balance-summery-action') }}">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="concernpersons_id">Concern Person</label>
                                <select name="concernpersons_id" id="concernpersons_id" class="form-control">
                                    <option value="">All </option>
                                    @foreach($concernPersons as $person)
                                        <option value="{{ $person->id }}" {{ request('concernpersons_id') == $person->id ? 'selected' : '' }}>
                                            {{ $person->name }}
                                        </option>
                                    @endforeach
                                </select>
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
