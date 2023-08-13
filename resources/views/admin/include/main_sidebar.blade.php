<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">

        <h4 class="brand-text font-weight-light"><i>Admin Pannel</i></h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info mx-auto">
                <span  class="text-capitalize text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>




        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->




                <li class="nav-header">Order Section</li>
                <li class="nav-item">
                    <a href="{{ route('admin.order_list') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Orders
                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.coupon_list') }}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Cupons
                        </p>
                    </a>

                </li>
                <li class="nav-header">Utils</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Pages & Content
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.edit_page_slug','about-us') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About Us</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.edit_page_slug','faq') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Faq</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('content_edit',1) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Why Choose Us</p>
                            </a>
                            <a href="{{ route('content_edit',2) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact Info</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-laptop"></i>
                        <p>
                            Services
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.service_list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Service List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.package_list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Package List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.attribute_list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attribute List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.portfolio_list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Portfolio List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('brand_list') }}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Brands
                        </p>
                    </a>
                </li>

                <li class="nav-header">Settings</li>
                <li class="nav-item">
                    <a href="{{ route('subscriber_list') }}" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            Subscribers
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contact_list') }}" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Contacts
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user_list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.add_customer') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
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
