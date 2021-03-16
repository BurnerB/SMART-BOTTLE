<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Storage::url(Auth::user()->avatar) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i>Logged in</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard text-aqua"></i> <span>Dashboard</span></a></li>
          <li><a href="{{ route('enquiry.index') }}"><i class="fa fa-envelope text-aqua"></i> <span>Mails</span></a></li>
          <li><a href="{{ route('seo.index') }}"><i class="fa fa-search text-aqua"></i> <span>Search engine optimization</span></a></li>

          {{--<li><a href="{{ route('role.index') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Roles</span></a></li>--}}
          <li class="treeview">
              <a href="#">
                  <i class="fa fa-laptop"></i>
                  <span>Website data</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('banner.index') }}"><i class="fa fa-circle-o"></i>Banners</a></li>
                  <li><a href="{{ route('offer.index') }}"><i class="fa fa-circle-o"></i>Offers</a></li>
              </ul>
          </li>

          <li class="treeview">
              <a href="#">
                  <i class="fa fa-flask"></i> <span>Wines</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('wine_category.index') }}"><i class="fa fa-circle-o"></i>Categories</a></li>
                  <li><a href="{{ route('wines.index') }}"><i class="fa fa-circle-o"></i>Wines</a></li>
              </ul>
          </li>

          <li class="treeview">
              <a href="#">
                  <i class="fa fa-beer"></i> <span>Beers</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('beer_category.index') }}"><i class="fa fa-circle-o"></i>Categories</a></li>
                  <li><a href="{{ route('beers.index') }}"><i class="fa fa-circle-o"></i>Beers</a></li>
              </ul>
          </li>

          <li class="treeview">
              <a href="#">
                  <i class="fa fa-flask"></i> <span>Spirits</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('spirit_category.index') }}"><i class="fa fa-circle-o"></i>Categories</a></li>
                  <li><a href="{{ route('spirits.index') }}"><i class="fa fa-circle-o"></i>Spirits</a></li>
              </ul>
          </li>

          <li class="treeview">
              <a href="#">
                  <i class="fa fa-shopping-cart"></i> <span>Extras</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('extra_category.index') }}"><i class="fa fa-circle-o"></i>Categories</a></li>
                  <li><a href="{{ route('extras.index') }}"><i class="fa fa-circle-o"></i>Extras</a></li>
              </ul>
          </li>

    </ul>



    </section>
    <!-- /.sidebar -->
  </aside>
