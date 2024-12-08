@extends('frontend.master')

@section('container')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>MRA Info List</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">MRA Info</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">  
              @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
              @endif
              <a href="{{ route('transactions-create') }}" class="btn btn-primary">Add New</a>  
            </h3>

            <div class="card-tools">
              {{ $transactions->onEachSide(2)->links() }}
            </div>                
          </div>
          <!-- /.card-header -->
          
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-bordered table-hover w-100"> <!-- Added w-100 for full width -->
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Customer</th>                   
                    <th>Description</th>
                    <th>Credit</th>
                    <th>Debit</th>
                    <th>Balance</th>
                    <th>Actions</th>
                 </tr>
                </thead>
                <tbody>
                  @foreach ($transactions as $transaction)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $transaction->transaction_date }}</td>
                      <td>{{ $transaction->concernperson->name }}</td> {{-- Access the concernperson relation --}}                    
                      <td>{{ $transaction->description }}</td>           
                      <td>{{ number_format($transaction->credit, 2) }}</td>
                      <td>{{ number_format($transaction->debit, 2) }}</td>
                      <td>{{ number_format($transaction->balance, 2) }}</td>
                      <td>
                        <a href="{{ url('/pdfdownload/'.$transaction->id) }}">PDF</a> ||
                        <a href="{{ url('/transactions/edit/'.$transaction->id) }}">Edit</a> || 
                        <a href="{{ url('/deletetransaction/'.$transaction->id) }}">Delete</a>
                      </td>
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
