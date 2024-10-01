
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">  
                      @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }} </h6>
                      @endif
                  <a href="{{url('/addmraform')}}" class="btn btn-primary" >Add New </a>  
                 
                </h3>

                <div class="card-tools">
                  <!-- {{ $mraforms->links() }} -->
                   {{ $mraforms->onEachSide(2)->links() }}
                </div>                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="">SL#</th>
                      <th>Invoice</th>                      
                      <th>Payment Source</th>
                      <th>Payment Type</th>                     
                      <th>Concern Person</th> 
                      <th>Purpose</th>                                         
                      <th>Amount</th> 
                      <th>Grand Total</th>
                      <th>Word</th> 
                      <th>Received By</th> 
                      <th>Remarks</th>
                      <th>Prepared By</th>
                      <th>Varified By</th>
                      <th>Approved By</th>
                      <th>Approved Doc</th>
                      <th>Created By</th> 
                      <th>Created Date</th> 
                      <th>Action</th>                    
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($mraforms as $key=>$mraform)
                    <tr>
                      <td> <a  href="{{url('/invoicepage/'.$mraform->id)}}">{{++$key}}</a></td>  
                      <td>{{ $mraform->invoice }}</td>                   
                      <td>{{ optional($mraform->expensetype)->name }}</td>                     
                      <td>{{ optional($mraform->paymenttype)->name }}</td>     
                      <td>{{ optional($mraform->concernperson)->name }} </td>                                          
                      <td>{{ $mraform->purpose }}</td> 
                      <td>{{ $mraform->amount }}</td> 
                      <td>{{ $mraform->grand_total }}</td> 
                      <td>{{ $mraform->word }}</td>                     
                      <td>{{ optional($mraform->receivedby)->name }}</td>    
                      <td>{{ $mraform->remarks }}</td>                    
                      <td>{{ optional($mraform->preparedby)->name }}</td>                      
                      <td>{{ optional($mraform->varifiedby)->name }}</td>                         
                      <td>{{ optional($mraform->approvedby)->name }}</td> 
                      <td><a href="{{ asset('public/uploads/documents/'.$mraform->document) }}">{{ $mraform->document }}</a>  </td>                     
                      <td>{{ optional($mraform->createsby)->name }}</td> 
                     <!-- <td>{{ \Carbon\Carbon::parse($mraform->created_at)->format('d/m/Y') }}</td> -->
                      <td>{{ \Carbon\Carbon::parse($mraform->created_at)->setTimezone('Asia/Dhaka')->format('d-m-Y H:i:s') }}</td>               
                      <td>
                          <a  href="{{url('/pdfdownload/'.$mraform->id)}}">PDF</a>||
                        <!--  <a  href="{{url('/pngimage')}}">PNG</a>||-->
                          <a  href="{{url('/editmraform/'.$mraform->id)}}">Edit</a> || 
                          <a  href="{{url('/deletemraform/'.$mraform->id)}}">Delete</a>
                      </td>
                      </tr>
                    @endforeach               
       
                
                  </tbody>
                </table>
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