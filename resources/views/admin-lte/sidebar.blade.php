<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  

<div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
    <div class="dropdown-menu">
    <a class="dropdown-item"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
  </div>
  </button>
</div>

          <li class="nav-item">
            <a href="{{'/admin/dashboard'}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              
                Dashboard
              
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{'/admin/product/list'}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              
                Product Management
              
            </a>
          </li>
        
          <li class="nav-item">
            <a href="{{'/admin/category/list'}}" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              
                Category Management
              
            </a>
          </li>

          <li class="nav-item">
            <a href="{{'/admin/user/list'}}" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              
                User Management
              
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              
                Order Management
              
            </a>
          </li>
        </ul>
      </nav>
    </div>
   
  </aside>