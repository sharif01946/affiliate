@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="http://placehold.it/160x160/00a65a/ffffff/&text={{ Auth::user()->name[0] }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

          <li class="treeview">
            <a href="#"><i class="fa fa-object-group"></i><span>Earnings</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/earnings/campaigns') }}"><i class="fa fa-circle-o"></i> <span>Campaigns</span></a></li>
              <li><a href="{{ url('admin/earnings/affiliates') }}"><i class="fa fa-circle-o"></i> <span>Affiliates</span></a></li>
              <li><a href="{{ url('admin/earnings/charities') }}"><i class="fa fa-circle-o"></i> <span>Charities</span></a></li>
              <li><a href="{{ url('admin/earnings/users') }}"><i class="fa fa-circle-o"></i> <span>Users</span></a></li>
            </ul>
          </li>
          
          <li class="treeview">
            <a href="#"><i class="fa fa-object-group"></i><span>Campaign</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/campaign') }}"><i class="fa fa-circle-o"></i> <span>Campaign List</span></a></li>
              <li><a href="{{ url('admin/campaign/add') }}"><i class="fa fa-circle-o"></i> <span>Add New Campaign</span></a></li>
              <li><a href="{{ url('admin/category')}}"><i class="fa fa-circle-o"></i> <span>Categorys</span></a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-cubes"></i><span>Charity</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/charity') }}"><i class="fa fa-circle-o"></i> <span>All Charities</span></a></li>
              <li><a href="{{ url('admin/charity/pending') }}"><i class="fa fa-circle-o"></i> <span>Pending Charities</span></a></li>
              <li><a href="{{ url('admin/charity/add') }}"><i class="fa fa-circle-o"></i> <span>Add New Charity</span></a></li>
              
              <li><a href="{{ url('admin/charity/groups') }}"><i class="fa fa-circle-o"></i> <span>Groups</span></a></li>

            </ul>
          </li>

          
          <li class="treeview">
            <a href="#"><i class="fa fa-users"></i><span>Affiliates</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/affiliate') }}"><i class="fa fa-circle-o"></i> <span>All Affiliates</span></a></li>
              <li><a href="{{ url('admin/affiliate/add') }}"><i class="fa fa-circle-o"></i> <span>Add New Affiliate</span></a></li>
              <li><a href="{{ url('admin/products') }}"><i class="fa fa-circle-o"></i> <span>All Products</span></a></li>
              <li><a href="{{ url('admin/products/add') }}"><i class="fa fa-circle-o"></i> <span>Add New Product</span></a></li>
            </ul>
          </li>



          <li class="treeview">
            <a href="#"><i class="fa fa-users"></i><span>Users</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/users') }}"><i class="fa fa-circle-o"></i> <span>All Users</span></a></li>
              <li><a href="{{ url('admin/users/pending') }}"><i class="fa fa-circle-o"></i> <span>Pending Users</span></a></li>
              <li><a href="{{ url('admin/users/add') }}"><i class="fa fa-circle-o"></i> <span>Add New User</span></a></li>
            </ul>
          </li>

          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
