<!-- sidebar.blade.php -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('/../resources/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="fas fa-r">MRA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/../resources/dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> @if (Auth::check()) 
                                       {{ Auth::user()->name }}
                                       @endif
                                      
                                                       
          </a>
        </div>
      </div>

      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-red fa-landmark"></i>            
              <p>
                Operation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/mraform')}}" class="nav-link">
                  <i class="fas fa-solid fa-users nav-icon"></i>
                  <p>MRA Form</p>
                </a>
              </li>
              <!-- 
              <li class="nav-item">
                <a href="{{url('/rentcollection')}}" class="nav-link">
                  <i class="nav-icon fas fa-wallet"></i>                  
                  <p>Rent Collection</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="{{url('/expense')}}" class="nav-link ">
                  <i class="fas fa-dollar-sign nav-icon"></i>
                  <p>Expense</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/advance')}}" class="nav-link ">
                  <i class="fas fa-solid fa-cash-register nav-icon"></i>
                  <p>Advance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/prodata') }}" class="nav-link">
                  <i class="nav-icon fas fa-plug text-warning"></i>
                  
                  <p>Data Processing</p>
                </a>
              </li>-->
            </ul>
          </li>    

          <li class="nav-item ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-solid fa-book-open"></i>            
              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>            
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{url('/areport')}}" class="nav-link ">
                  <i class="nav-icon far fa-file-pdf text-warning"></i>
                  <p>General Report</p>
                </a>
              </li>
            </ul>
            
          </li>   
          
          <li class="nav-item ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-solid fa-wrench"></i>                                
              <p>
                Setup
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/expenselist') }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-building text-warning"></i>                
                  <p>Payment Source  </p>
                </a>
              </li> 
              
              <li class="nav-item">
                <a href="{{ url('/paymentlist') }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-building text-warning"></i>                
                  <p>Payment Type  </p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="{{ url('/concernperson') }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-building text-warning"></i>                
                  <p>Concern Person  </p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="{{ url('/peoplelist') }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-building text-warning"></i>                
                  <p> Person List </p>
                </a>
              </li>  
             
              
         
                
             <!--                        
              <li class="nav-item">
                <a href="{{ url('/userlist') }}" class="nav-link ">
                  <i class="nav-icon fas fa-solid fa-user-lock text-warning"></i>
                  <p> user </p>
                </a>
              </li>-->   
                
                   
            </ul>
          </li>       
         
          <li class="nav-item ">           
           <a class="nav-link active" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="nav-icon fas fa-solid fa-power-off "></i>                                      
                                        <p>{{ __('Logout') }}</p>
                                    </a>         
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>  
         
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>