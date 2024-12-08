@extends('frontend.master')
@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Edit Transaction Entry') }}</div>

                <div class="card-body">
                    <form action="{{ route('transactions-update', $transaction->id) }}" method="POST">
                        @csrf
                        @method('PUT')  <!-- Add this to specify that it is an update -->

                        <div class="form-group">
                            <label for="concernpersons_id">Customer:</label>
                            <select name="concernpersons_id" class="form-control" id="concernpersons_id">
                                @foreach($concernpersons as $concernperson)
                                    <option value="{{ $concernperson->id }}" 
                                        @if($concernperson->id == $transaction->concernpersons_id) selected @endif>
                                        {{ $concernperson->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">Transaction Type:</label>
                            <select name="type" class="form-control">
                                <option value="Credit" @if($transaction->type == 'Credit') selected @endif>Credit</option>
                                <option value="Debit" @if($transaction->type == 'Debit') selected @endif>Debit</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="number" name="amount" class="form-control" step="0.01" value="{{ $transaction->amount }}" required>
                        </div>

                        <div class="form-group">
                            <label for="transaction_date">Transaction Date:</label>
                            <input type="date" name="transaction_date" class="form-control" value="{{ \Carbon\Carbon::parse($transaction->transaction_date)->toDateString() }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control" rows="3">{{ $transaction->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Update Transaction</button>
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
