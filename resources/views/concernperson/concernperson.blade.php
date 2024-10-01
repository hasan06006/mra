
@extends('frontend.master')
@section('container')


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payment Type Info List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payment Type Info</li>
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
                  <a href="{{url('/addconcernperson')}}" class="btn btn-primary" >Add New </a>  
                </h3>

                <div class="card-tools">
                 <!-- using for pagination-->
                 {{ $concernpersons->onEachSide(2)->links() }}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="">#</th>                      
                      <th>Name</th>
                      <th>Description</th>                     
                      <th>Active</th> 
                      <th>Created By</th>                                         
                      <th>Created Date</th> 
                      <th>Action</th>                     
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($concernpersons as $key=>$concernperson)
                    <tr>
                      <td>{{++$key}}</td>                     
                      <td>{{ $concernperson->name }}</td>
                      <td>{{ $concernperson->description }}</td>     
                      <td>{{ $concernperson->is_active }}</td> 
                      <td>{{ optional($concernperson->createsby)->name }}</td> 
                      <td>{{ \Carbon\Carbon::parse($concernperson->created_at)->format('d/m/Y') }}</td>                
                      <td><a  href="{{url('/editconcernperson/'.$concernperson->id)}}">Edit</a> || 
                          <a  href="{{url('/deleteconcernperson/'.$concernperson->id)}}">Delete</a>
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