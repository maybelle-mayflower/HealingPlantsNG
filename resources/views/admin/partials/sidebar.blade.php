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
            <h6 class="dropdown-header">Herbs:</h6>
            <a class="dropdown-item" href="{{route('plant.index')}}">All</a>
            <a class="dropdown-item" href="{{route('plant.create')}}">Add Herb</a>

          </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-mortar-pestle"></i>
              <span>Recipes</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
              <h6 class="dropdown-header">Recipes:</h6>
              <a class="dropdown-item" href="{{route('recipe.index')}}">All</a>
              <a class="dropdown-item" href="{{route('recipe.create')}}">Add Recipe</a>
              <div class="dropdown-divider"></div>
              <h6 class="dropdown-header">Categories:</h6>
              <a class="dropdown-item" href="{{route('category.index')}}">View All</a>
              <a class="dropdown-item" href="{{route('category.create')}}">Add Category</a>
         
            </div>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-leaf"></i>
                <span>HHNG Shop</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Products:</h6>
                <a class="dropdown-item" href="{{route('product.index')}}">All</a>
                <a class="dropdown-item" href="{{route('product.create')}}">Add Product</a>
    
              </div>
            </li>
        <li class="nav-item">
          <a class="nav-link" href="/">
            <i class="far fa-fw fa-eye"></i>
            <span>View Site</span></a>
        </li>
      </ul>