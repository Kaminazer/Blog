<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.index')}}" class="brand-link">
        <i class="fas fa-blog pr-2 pl-3"></i>
        <span class="brand-text font-weight-light">{{__('Blog')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="dropdown d-flex mt-3 mb-3">
          <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2 w-50" alt="User Image">
          </div>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">{{__('Logout')}}</button>
                </form>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-header">{{__("ADMIN PANEL")}}</li>
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{__('Dashboard')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('Users')}}
                            <span class="badge badge-info right">{{$users->count()}}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('post.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            {{__('Posts')}}
                            <span class="badge badge-info right">{{$posts->count()}}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('category.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            {{__('Categories')}}
                            <span class="badge badge-info right">{{$categories->count()}}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tag.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            {{__('Tags')}}
                            <span class="badge badge-info right">{{$tags->count()}}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
