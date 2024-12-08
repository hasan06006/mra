@extends('frontend.master')
@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('MRA Transaction Entry ') }}</div>

                <div class="card-body">
                    <form action="{{ route('transactions-store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="concernpersons_id">Customer:</label>
                            <select name="concernpersons_id" class="form-control" id="concernpersons_id" required>
                                <option value="" disabled selected>Select a customer</option>
                                @foreach($concernpersons as $concernperson)
                                    <option value="{{ $concernperson->id }}">{{ $concernperson->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">Transaction Type:</label>
                            <select name="type" class="form-control" required>
                                <option value="" disabled selected>Select transaction type</option>
                                <option value="Credit">Credit</option>
                                <option value="Debit">Debit</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="number" name="amount" class="form-control" step="0.01" required>
                        </div>

                        <div class="form-group">
                            <label for="transaction_date">Transaction Date:</label>
                            <input type="date" name="transaction_date" class="form-control" value="{{ \Carbon\Carbon::today()->toDateString() }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Add Transaction</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/choices.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Choices for concern_person dropdown
        new Choices('#concernpersons_id', {
            searchEnabled: true,
            removeItemButton: true,
            itemSelectText: '', 
            placeholderValue: '',
        });
    });
</script>

@endsection
