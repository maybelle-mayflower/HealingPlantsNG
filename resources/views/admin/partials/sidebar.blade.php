 <!-- Sidebar -->
 <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-leaf"></i>
            <span>Herbs</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Herb Actions:</h6>
            <a class="dropdown-item" href="{{route('plant.index')}}">View All</a>
            <a class="dropdown-item" href="{{route('plant.create')}}">Add Product</a>
                      <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other:</h6>
            <a class="dropdown-item" href="404.html">View Categories</a>
          </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-mortar-pestle"></i>
              <span>Recipes</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
              <h6 class="dropdown-header">Recipe Actions:</h6>
              <a class="dropdown-item" href="{{route('plant.index')}}">View All</a>
              <a class="dropdown-item" href="{{route('plant.create')}}">Add Recipe</a>
         
            </div>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="/">
            <i class="far fa-fw fa-eye"></i>
            <span>View Site</span></a>
        </li>
      </ul>