<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid" >
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<<<<<<< HEAD
      <a href="/dashboard"><img src='{{ App\Company::all()->first()->getLogoAttribute()}}' alt="{{ App\SystemSetting::all()->first()->system_name}}" class="navbar-brand" href="/dashboard" style="color: #ffffff;  text-transform: uppercase;"></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse hidden-md">
      <ul class="nav navbar-nav navbar-right ">
        

        <li class="dropdown hidden-lg hidden-md">
            <a href="#" class="dropdown-toggle ipad-mode" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->username}}<span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="#"><i class="fa fa-id-card" aria-hidden="true"></i> &nbsp; Profile</a></li>
            </ul>
        </li>
        @if(Auth::user()->user_level == 'Administrator')
        <li class="dropdown hidden-lg hidden-md">
          <a href="#" class="dropdown-toggle ipad-mode" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-briefcase fa-lg"></i>
              Overview <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
              <li><a href="/items"><i class="fa fa-cube" aria-hidden="true"></i> Company</a></li>
              <li><a href="/menus"><i class="fa fa-clone" aria-hidden="true"></i> System Setting</a></li>
          </ul>
        </li>
        @endif

        @if(Auth::user()->user_level == 'Administrator' || Auth::user()->user_level == 'Cashier')
        <li class="dropdown hidden-lg hidden-md">
          <a href="#" class="dropdown-toggle ipad-mode" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-shopping-cart fa-lg"></i>  POS <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
              @if (App\SystemSetting::all()->first()->system_mode == 'Restaurant')
              <li><a href="/restaurant">Restaurant Mode</a></li>
              <li><a href="/kitchen">Kitchen</a></li>
              @elseif (App\SystemSetting::all()->first()->system_mode == 'FastFood')
              <li><a href="/fastfood">Fast Food Mode</a></li>
              <li><a href="/kitchen">Kitchen</a></li>
              @else
              <li><a href="/retailer">Retailer Mode</a></li>
              @endif
              <li><a href="/orders">Order Logs</a></li>
          </ul>
        </li>
        @endif


        @if(Auth::user()->user_level == 'Administrator' || Auth::user()->user_level == 'Maintenance' || Auth::user()->user_level == 'Stock Manager')
        <li class="dropdown hidden-lg hidden-md">
          <a href="#" class="dropdown-toggle ipad-mode" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-list fa-lg"></i>  File Maintenance <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
            @if (App\SystemSetting::all()->first()->system_mode == 'Retailer')
              @if (Auth::user()->user_level == 'Stock Manager')
              <li><a href="/inventory">Inventory</a></li>
              @endif
            @endif


            @if(Auth::user()->user_level == 'Stock Manager')
            @else
              @if (App\SystemSetting::all()->first()->system_mode == 'Retailer')
              <li><a href="/items">Products</a></li>
              @endif

              @if (App\SystemSetting::all()->first()->system_mode == 'Restaurant' || App\SystemSetting::all()->first()->system_mode == 'FastFood')
              <li><a href="/menus">Menus</a></li>
              @endif
              <li><a href="/customers">Customers</a></li>
              <li><a href="/suppliers">Suppliers</a></li>
              <li><a href="/categories">Categories</a></li>
              <li><a href="/promos">Promos</a></li>

              @if (App\SystemSetting::all()->first()->system_mode == 'Restaurant')
              <li><a href="/tables">Tables</a></li>
              <li><a href="/employees">Employees</a></li>
              <li><a href="/attendance">Employee Attendance</a></li>
              @endif

              <li><a href="/discounts">Discounts</a></li>
              @if (Auth::user()->user_level == 'Administrator')
              <li><a href="#">Archive</a></li>
              <li><a href="/accounts">Accounts</a></li>
              @endif
              @endif
          </ul>
        </li>
        @endif

        @if(Auth::user()->user_level == 'Report' || Auth::user()->user_level == 'Administrator')
        <li class="dropdown hidden-lg hidden-md">
          <a href="#" class="dropdown-toggle ipad-mode" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-clipboard fa-lg"></i>Reports <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
              <li><a href="/salesreports/salesactivities">Sales Reports</a></li>
              @if (App\SystemSetting::all()->first()->system_mode == 'Retailer')
              <li><a href="/inventoryreports/inventoryvalue">Inventory Reports</a></li>
              @endif
              <li><a href="/audittrail">Audit Trail</a></li>
          </ul>
        </li>
        @endif
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: #ffffff;">
=======
      <a class="navbar-brand" href="/dashboard">{{ App\SystemSetting::all()->first()->system_name }}</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown hidden-lg hidden-md">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-list" aria-hidden="true"></i>
              Inventory <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
              <li><a href="/items"><i class="fa fa-cube" aria-hidden="true"></i> Products</a></li>
              <li><a href="/menus"><i class="fa fa-clone" aria-hidden="true"></i> Menus</a></li>
              <li><a href="/customers"><i class="fa fa-user" aria-hidden="true"></i> Customers</a></li>
              <li><a href="/suppliers"><i class="fa fa-truck" aria-hidden="true"></i> Suppliers</a></li>
              <li><a href="/categories"><i class="fa fa-tags" aria-hidden="true"></i> Categories</a></li>
              <li><a href="/discounts"><i class="fa fa-percent" aria-hidden="true"></i></i> Discounts</a></li>
          </ul>
        </li>

        <li class="dropdown hidden-lg hidden-md">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->username}}<span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="#"><i class="fa fa-id-card" aria-hidden="true"></i> &nbsp; Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp; Messages</a></li>
                <li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i> &nbsp; Task</a></li>
                <li><a href="#"><i class="fa fa-sticky-note" aria-hidden="true"></i> &nbsp; Notes</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                <i class="fa fa-cogs" aria-hidden="true"></i> Settings <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="/accountsettings"><i class="fa fa-address-card" aria-hidden="true"></i> &nbsp; Account Settings</a></li>
<<<<<<< HEAD
                @if(Auth::user()->user_level == 'Administrator')
                <li><a href="/systemsettings"><i class="fa fa-desktop" aria-hidden="true"></i> &nbsp; System Settings</a></li>
                @endif
=======
                <li><a href="/systemsettings"><i class="fa fa-desktop" aria-hidden="true"></i> &nbsp; System Settings</a></li>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            </ul>
        </li>

        <li>
<<<<<<< HEAD
            <a style="color: #ffffff;" href="{{ route('logout') }}"
=======
            <a href="{{ route('logout') }}"
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
