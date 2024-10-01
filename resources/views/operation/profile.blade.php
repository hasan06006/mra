
@extends('frontend.master')
@section('container')


<!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="row">
          <div class="col-md-6">
          <div class="card">
            <div class="card-body p-0">
            <div class="card-header">
                <h2 class="alert alert-success">  
                      Renter's info
                </h2>               
              </div>
                  <table class="table table-bordered">
                  <thead>        
                      
                    </thead>
                    <tbody>
                    <tr>
                        <th>Renter ID</th>
                        <td>{{ $renterinfos->id}} </td>                              
                      </tr>
                    <tr>
                    <tr>
                        <th>Building</th>
                        <td> 
                          {{ optional($renterinfos->buildinginfo)->name }}
                        </td>                              
                      </tr>
                    <tr>
                        <th>Flat</th>
                        <td>{{ optional($renterinfos->flatinfo)->name}} </td>                              
                      </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $renterinfos->name}} </td>                              
                      </tr>
                      <tr>
                        <th>Father's Name </th>
                        <td>{{ $renterinfos->father_name}} </td>                              
                      </tr>
                      <tr>
                        <th>NID </th>
                        <td>{{ $renterinfos->nid}} </td>                              
                      </tr>
                      <tr>
                        <th>Mobile </th>
                        <td>{{ $renterinfos->mobile}}  </td>                              
                      </tr>
                      <tr>
                        <th>Address </th>
                        <td>{{ $renterinfos->address}}  </td>                              
                      </tr>
                      <tr>
                        <th>Document </th>
                        <td><a href="{{ asset('public/uploads/documents/'.$renterinfos->document) }}">{{ $renterinfos->document }}</a>  </td>                              
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          <!-- ./col -->

          <div class="col-md-6">
          <div class="card">
            <div class="card-body p-0">
             <div class="card-header">
                <h2 class="alert alert-success">  
                      Renter's Advance Info
                </h2>   
                <div class="card-tools">
                     {{ $advances->links() }}
                </div>            
              </div>
             
                  <table class="table table-bordered">
                     <thead>        
                     <th style="">#</th>                                     
                      <th>Advance Amt (Cr)</th> 
                      <th>Advance Amt (Dr)</th>                    
                      <th>Note</th>                                         
                      <th>Created Date</th>                     
                    </thead>
                    <tbody>
                    @foreach ($advances as $key=>$advance)
                    <tr>
                      <td>{{++$key}}</td>                                                    
                      <td>{{ $advance->credit_amt }}</td>     
                      <td>{{ $advance->debit_amt }}</td> 
                      <td>{{ $advance->note }}</td> 
                      <td>{{ \Carbon\Carbon::parse($advance->created_at)->format('d/m/Y') }}</td>     
                    
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                 </div>
                        <!-- /.card-body -->
                        @php 
                          $total_cr =0; 
                          $total_dr =0;
                        @endphp  
                        @foreach ($advancesall as $key=>$advancesalls)
                          @php 
                             $total_cr =  $total_cr +  $advancesalls->credit_amt; 
                             $total_dr =  $total_dr +  $advancesalls->debit_amt; 
                          @endphp
                         @endforeach

                   
                    
                 </div>   
                 <h2 class="alert alert-danger">  Advance Remaining :  {{ $total_cr -  $total_dr }}  </h2>         
                          
                 <!-- /.card -->
              </div>
            <!-- ./col -->

        </div>
        <!-- /.row -->

       
        <div class="row">
          
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="alert alert-success">  
                      Renter Transaction details
                </h2>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                <thead>
                    <tr>
                      <th style="">#</th>                     
                      <th>For Month </th>
                      <th>Month & Year</th>                      
                      <th>Rent Amt</th>
                      <th>Electric </th>
                      <th>Gas </th>
                      <th>Others </th>
                      <th>Total</th>
                      <th>Paid From </th>
                      <th>Note</th>
                      <th>Collect By</th>
                      <th>Collect Date</th> 
                   <!--   <th> Update By</th>        --->       
                                      
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($rentcollections as $key=>$rentcollection)
                    <tr>
                      <td>{{++$key}}</td>                     
                      <td>{{ \Carbon\Carbon::parse($rentcollection->rent_for_month)->format('d/m/Y')}}</td>
                      <td>{{ $rentcollection->month }} ,  {{ $rentcollection->year }}</td>                        
                      <td>{{ $rentcollection->rent_amt }}</td> 
                      <td>{{ $rentcollection->electric_bill }}</td> 
                      <td>{{ $rentcollection->gas_bill }}</td>
                      <td>{{ $rentcollection->others_bill }}</td> 
                      <td>{{ $rentcollection->rent_amt +  $rentcollection->electric_bill + $rentcollection->gas_bill + $rentcollection->others_bill }}</td> 
                      <td>{{ $rentcollection->rent_paid_from }}</td>  
                      <td>{{ $rentcollection->note }}</td>  
                      <td>{{ optional($rentcollection->createsby)->name }}</td>
                      <td>{{ \Carbon\Carbon::parse($rentcollection->created_at)->format('d/m/Y')}}</td>  
                  <!--    <td>{{ optional($rentcollection->updateby)->name }}</td>      -->                                
                     
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