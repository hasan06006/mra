@extends('frontend.master')

@section('container')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Ledger Report</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Ledger Report</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Search Parameters -->
<section class="content">
  <div class="container-fluid">
    <div class="row mb-3">
      <div class="col-sm-12">
        <h4>Search Parameters: </h4>
        <p>
          <strong>Customer:</strong> {{ request('concernpersons_id') ? $concernPersons->find(request('concernpersons_id'))->name : 'All' }} |
          <strong>Transaction Type:</strong> {{ request('type') ? request('type') : 'All' }} |
          <strong>Date Range:</strong> 
          @if (request('start_date') && request('end_date'))
            {{ request('start_date') }} to {{ request('end_date') }}
          @else
            All
          @endif
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-tools">
              {{ $transactions->links() }} <!-- Default pagination links -->
            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-bordered table-hover w-100">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Balance</th>
                    <th>Description</th>                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transactions as $transaction)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $transaction->transaction_date }}</td>
                      <td>{{ $transaction->concernPerson->name ?? 'N/A' }}</td>
                      <td>{{ number_format($transaction->debit, 2) }}</td>
                      <td>{{ number_format($transaction->credit, 2) }}</td>
                      <td>{{ number_format($transaction->balance, 2) }}</td>
                      <td>{{ $transaction->description }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
