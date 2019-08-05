<div class="menu-list">
  <ul id="menu-content" class="menu-content collapse out">
    <li  class="collapsed active">
      <a href="/profile">
        <i class="fa fa-user fa-lg"></i> <?php echo e(Auth::user()->username); ?>

      </a>
    </li>
    <ul class="sub-menu collapse" id="home">
      <a href="/profile"><li>Profile</li></a>
    </ul>

    <?php if(Auth::user()->user_level == 'Administrator'): ?>
    <li data-toggle="collapse" data-target="#overview" class="collapsed active">
      <a href="#">
        <i class="fa fa-briefcase fa-lg"></i>  Overview<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="overview">
      <a href="/company"><li>Company</li></a>
      <a href="/systemsettings"><li>System Setting</li></a>
    </ul>
    <?php endif; ?>

    <?php if(Auth::user()->user_level == 'Administrator' || Auth::user()->user_level == 'Cashier'): ?>
    <li data-toggle="collapse" data-target="#sales" class="collapsed active">
      <a href="#">
        <i class="fa fa-shopping-cart fa-lg"></i>  POS<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="sales">
      <?php if(App\SystemSetting::all()->first()->system_mode == 'Restaurant'): ?>
      <a href="/restaurant"><li>Restaurant</li></a>
      <a href="/kitchen"><li>Kitchen</li></a>
      <?php elseif(App\SystemSetting::all()->first()->system_mode == 'FastFood'): ?>
      <a href="/fastfood"><li>Fast Food</li></a>
      <!-- <a href="/kitchen"><li>Kitchen</li></a> -->
      <?php else: ?>
      <a href="/retailer"><li>Retailer</li></a>
      <?php endif; ?>
      <a href="/orders"><li>Order Logs</li></a>
    </ul>
    <?php endif; ?>

    <?php if(Auth::user()->user_level == 'Administrator' || Auth::user()->user_level == 'Maintenance' || Auth::user()->user_level == 'Stock Manager'): ?>
    <li data-toggle="collapse" data-target="#products" class="collapsed active">
      <a href="#">
        <i class="fa fa-list fa-lg"></i>  File Maintenance<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="products">
      <?php if(App\SystemSetting::all()->first()->system_mode == 'Retailer'): ?>
        <?php if(Auth::user()->user_level == 'Stock Manager' || Auth::user()->user_level == 'Administrator'): ?>
      <a href="/inventory"><li>Inventory</li></a>
        <?php endif; ?>
      <?php endif; ?>

      <?php if(Auth::user()->user_level == 'Stock Manager'): ?>
      <?php else: ?>
        <?php if(App\SystemSetting::all()->first()->system_mode == 'Restaurant' || App\SystemSetting::all()->first()->system_mode == 'FastFood'): ?>
        <a href="/menus"><li>Menus</li></a>
        <?php endif; ?>
        
        <?php if(App\SystemSetting::all()->first()->system_mode == 'Retailer'): ?>
        <a href="/items"><li>Products</li></a>
        <?php endif; ?>

        <a href="/customers"><li>Customers</li></a>
        <a href="/suppliers"><li>Suppliers</li></a>
        <a href="/categories"><li>Categories</li></a>
        <a href="/promos"><li>Promos</li></a>

        <?php if(App\SystemSetting::all()->first()->system_mode == 'Restaurant'): ?>    
        <a href="/tables"><li>Tables</li></a>
        <a href="/employees"><li>Employees</li></a>
        <a href="/attendance"><li>Employee Attendance</li></a>
        <?php endif; ?>
        

        <a href="/discounts"><li>Discounts</li></a>
        <?php if(Auth::user()->user_level == 'Administrator'): ?>
        <a href="#"><li>Archive</li></a>
        <a href="/accounts"><li>Accounts</li></a>
        <?php endif; ?>
        <?php endif; ?>
      </ul>
    <?php endif; ?>


    <?php if(Auth::user()->user_level == 'Report' || Auth::user()->user_level == 'Administrator'): ?>
    <li data-toggle="collapse" data-target="#reports" class="collapsed active">
      <a href="#">
        <i class="fa fa-clipboard fa-lg"></i>  Reports<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="reports">
      <a href="/salesreports/salesactivities"><li>Sales Reports</li></a>

      <?php if(App\SystemSetting::all()->first()->system_mode == 'Retailer'): ?>
      <a href="/inventoryreports/inventoryvalue"><li>Inventory Reports</li></a>
      <?php endif; ?>
      <?php if(Auth::user()->user_level == 'Administrator'): ?>
      <a href="/audittrail"><li>Audit Trail</li></a>
      <?php endif; ?>
    </ul>
    <?php endif; ?>
  </ul>
</div>