
@extends('frontend.master')
@section('container')


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>People List Info </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">People List  Info</li>
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
                  <a href="{{url('/addpeoplelist')}}" class="btn btn-primary" >Add New </a>  
                </h3>

                <div class="card-tools">                
                <!-- using for pagination-->
                {{ $peoplelists->links() }}
               <!-- {{ $peoplelists->onEachSide(2)->links() }}-->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="">#SL</th>                      
                      <th>Office ID</th>
                      <th>Name</th>
                      <th>Is Received By</th>  
                      <th>Is Prepared By</th> 
                      <th>Is Varified By</th>                     
                      <th>Is Approved By</th>                
                      <th>Active</th> 
                      <th>Created By</th>                                         
                      <th>Created Date</th> 
                      <th>Action</th>                     
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($peoplelists as $key=>$peoplelists)
                    <tr>
                      <td>{{++$key}}</td>                     
                      <td>{{ $peoplelists->office_id }}</td>
                      <td>{{ $peoplelists->name }}</td>                       
                      <td>{{ $peoplelists->is_received_by }}</td> 
                      <td>{{ $peoplelists->is_prepared_by }}</td> 
                      <td>{{ $peoplelists->is_varified_by }}</td>     
                      <td>{{ $peoplelists->is_approved_by }}</td> 
                      <td>{{ $peoplelists->is_active }}</td> 
                      <td>{{ optional($peoplelists->createsby)->name }}</td> 
                      <td>{{ \Carbon\Carbon::parse($peoplelists->created_at)->format('d/m/Y') }}</td>                
                      <td><a  href="{{url('/editpeoplelist/'.$peoplelists->id)}}">Edit</a> || 
                          <a  href="{{url('/deletepeoplelists/'.$peoplelists->id)}}">Delete</a>
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