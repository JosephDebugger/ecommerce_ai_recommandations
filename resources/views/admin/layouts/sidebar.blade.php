  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{asset('uploads/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> 
          <span class="brand-text font-weight-light">Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('uploads/sample-user.webp')}}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Admin</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                  <li class="nav-item">
                      <a href="#" class="nav-link" aria-current="page" data-toggle="collapse">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Inventory
                              <i class="fas fa-angle-left right"></i>
                              {{-- <span class="badge badge-info right">6</span> --}}
                          </p>
                      </a>
                      <ul class="nav nav-treeview collapse ">
                          <li class="nav-item">
                              <a href="{{ url('inventory/products') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Products</p>
                              </a>
                          </li>

                      </ul>
                    </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Sales
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('sales/getSales') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sales List</p>
                            </a>
                        </li>

                    </ul>
                </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Bands
                              <i class="fas fa-angle-left right"></i>
                              {{-- <span class="badge badge-info right">6</span> --}}
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('bandAssign') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assigned Customer</p>
                            </a>
                        </li>

                          <li class="nav-item">
                              <a href="{{ route('bands.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Bands</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Bands Sales</p>
                              </a>
                          </li>
                      </ul>
                  </li>



                  <nav class="mt-2">
                      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                          data-accordion="false">
                          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-copy"></i>
                                  <p>
                                      CMS
                                      <i class="fas fa-angle-left right"></i>
                                      {{-- <span class="badge badge-info right">6</span> --}}
                                  </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ url('banners') }}" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Banners</p>
                                      </a>
                                  </li>

                              </ul>
                          </li>

                          
                          <li class="nav-item">
                            <a href="{{route('getUserMessages')}}" class="nav-link">
                                <i class="nav-icon fas fa-search"></i>
                                <p>
                                    Messages
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                           
                        </li>


                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-search"></i>
                                  <p>
                                      Settings
                                      <i class="fas fa-angle-left right"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('getSettings') }}" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Company Settings</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="{{ route('users.index') }}" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Users</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="{{ route('brands.index') }}" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Brands</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="{{ route('categories.index') }}" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Category</p>
                                      </a>
                                  </li>
                              </ul>
                          </li>





                          <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-search"></i>
                                <p>
                                    Suppoprts
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('viewChats') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Chats</p>
                                    </a>
                                </li>
                             
                            
                            </ul>
                        </li>


                      </ul>
                  </nav>
                  <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
