<div class="menu-list">
  <ul id="menu-content" class="menu-content collapse out">
<<<<<<< HEAD
  <a href="/profile">
    <li  class="collapsed active"> <a href="/profile">
      <a href="/profile">
        <i class="fa fa-user fa-lg"></i> {{Auth::user()->username}}
=======
    <li data-toggle="collapse" data-target="#home" class="collapsed active">
      <a href="#">
        <i class="fa fa-user fa-lg"></i> {{Auth::user()->username}}<span class="arrow"></span> 
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
      </a>
    </li>
    </a>
    <ul class="sub-menu collapse" id="home">
      <a href="/profile"><li>Profile</li></a>
<<<<<<< HEAD
=======
      <a href="#"><li>Messages</li></a>
      <a href="#"><li>Task</li></a>
      <a href="#"><li>Notes</li></a>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    </ul>

    @if(Auth::user()->user_level == 'Kitchen')
    <li  class="collapsed active"> <a href="/profile">
      <a href="/kitchen">
        <i class="fa fa-user fa-lg"></i> Kitchen
      </a>
    </li>
    @endif

    @if(Auth::user()->user_level == 'Administrator')
    <li data-toggle="collapse" data-target="#overview" class="collapsed active">
      <a href="#">
        <i class="fa fa-briefcase fa-lg"></i>  Overview<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="overview">
      <a href="/company"><li>Company</li></a>
<<<<<<< HEAD
=======
      <a href="#"><li>Policies</li></a>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
      <a href="/systemsettings"><li>System Setting</li></a>
    </ul>
    @endif

    @if(Auth::user()->user_level == 'Administrator' || Auth::user()->user_level == 'Cashier')
    <li data-toggle="collapse" data-target="#sales" class="collapsed active">
      <a href="#">
        <i class="fa fa-shopping-cart fa-lg"></i>  POS<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="sales">
<<<<<<< HEAD
      @if(App\SystemSetting::all()->first()->system_mode == 'Restaurant')
      <a href="/restaurant"><li>Restaurant</li></a>
      <a href="/kitchen"><li>Kitchen</li></a>
      @elseif (App\SystemSetting::all()->first()->system_mode == 'FastFood')
      <a href="/fastfood"><li>Fast Food</li></a>
      <!-- <a href="/kitchen"><li>Kitchen</li></a> -->
      @else
      <a href="/retailer"><li>Retailer</li></a>
=======
      @if (App\SystemSetting::all()->first()->system_mode == 'Restaurant')
      <a href="/restaurant"><li>Restaurant Mode</li></a>
      <a href="/kitchen"><li>Kitchen</li></a>
      @elseif (App\SystemSetting::all()->first()->system_mode == 'FastFood')
      <a href="/fastfood"><li>Fast Food Mode</li></a>
      <a href="/kitchen"><li>Kitchen</li></a>
      @else
      <a href="/retailer"><li>Retailer Mode</li></a>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
      @endif
      <a href="/orders"><li>Order Logs</li></a>
    </ul>
    @endif

    @if(Auth::user()->user_level == 'Administrator' || Auth::user()->user_level == 'Maintenance' || Auth::user()->user_level == 'Stock Manager')
    <li data-toggle="collapse" data-target="#products" class="collapsed active">
      <a href="#">
        <i class="fa fa-list fa-lg"></i>  File Maintenance<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="products">
<<<<<<< HEAD
      @if (App\SystemSetting::all()->first()->system_mode == 'Retailer')
        @if (Auth::user()->user_level == 'Stock Manager' || Auth::user()->user_level == 'Administrator')
          <a href="/inventory"><li>Inventory</li></a>
        @endif
      @endif

      @if(Auth::user()->user_level == 'Stock Manager')
      @else
        @if (App\SystemSetting::all()->first()->system_mode == 'Restaurant' || App\SystemSetting::all()->first()->system_mode == 'FastFood')
        <a href="/menus"><li>Menus</li></a>
        @endif
        
        @if (App\SystemSetting::all()->first()->system_mode == 'Retailer')
        <a href="/items"><li>Products</li></a>
        @endif

        <a href="/customers"><li>Customers</li></a>
        <a href="/suppliers"><li>Suppliers</li></a>
        <a href="/categories"><li>Categories</li></a>
        <a href="/promos"><li>Promos</li></a>

        @if (App\SystemSetting::all()->first()->system_mode == 'Restaurant')    
        <a href="/tables"><li>Tables</li></a>
        <a href="/employees"><li>Employees</li></a>
        <a href="/attendance"><li>Employee Attendance</li></a>
        @endif
        

        <a href="/discounts"><li>Discounts</li></a>
        @if (Auth::user()->user_level == 'Administrator')
        <a href="/database"><li>Backup &amp; Recovery</li></a>
        <a href="/accounts"><li>Accounts</li></a>
        <a href="/ads"><li>Advertisements</li></a>
        @endif
        @endif
      </ul>
    @endif


    @if(Auth::user()->user_level == 'Reports' || Auth::user()->user_level == 'Administrator')
=======
      <a href="/items"><li>Products</li></a>
      <a href="/menus"><li>Menus</li></a>
      <a href="/customers"><li>Customers</li></a>
      <a href="/suppliers"><li>Suppliers</li></a>
      <a href="/categories"><li>Categories</li></a>
      <a href="/discounts"><li>Discounts</li></a>
      <a href="#"><li>Archives</li></a>
      <a href="/accounts"><li>Accounts</li></a>
    </ul>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    <li data-toggle="collapse" data-target="#reports" class="collapsed active">
      <a href="#">
        <i class="fa fa-clipboard fa-lg"></i>  Reports<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="reports">
      <a href="/salesreports/salesactivities"><li>Sales Reports</li></a>
<<<<<<< HEAD

      @if (App\SystemSetting::all()->first()->system_mode == 'Retailer')
      <a href="/inventoryreports/inventoryvalue"><li>Inventory Reports</li></a>
      @endif
      @if (Auth::user()->user_level == 'Administrator')
      <a href="/audittrail"><li>Audit Trail</li></a>
      @endif
=======
      <a href="/inventoryreport"><li>Inventory Value</li></a>
      <a href="#"><li>Documents</li></a>
      <a href="#"><li>Expenditures</li></a>
      <a href="#"><li>Invoices</li></a>
      <a href="/audittrail"><li>Audit Trail</li></a>
    </ul>

    <li data-toggle="collapse" data-target="#analytics" class="collapsed active">
      <a href="#">
        <i class="fa fa-bar-chart fa-lg"></i>  Analytics<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="analytics">
      <a href="#"><li>Supply Purchase Request</li></a>
      <a href="#"><li>Supply Acquisition</li></a>
      <a href="#"><li>Supply Status</li></a>
      <a href="#"><li>Depreciation / Expiration</li></a>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    </ul>
    @endif
  </ul>
</div>