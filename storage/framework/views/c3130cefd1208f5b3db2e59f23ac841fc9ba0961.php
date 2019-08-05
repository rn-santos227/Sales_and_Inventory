<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid" >
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/dashboard"><img src='<?php echo e(App\Company::all()->first()->getLogoAttribute()); ?>' alt="<?php echo e(App\SystemSetting::all()->first()->system_name); ?>" class="navbar-brand" href="/dashboard" style="color: #ffffff;  text-transform: uppercase;"></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse hidden-md">
      <ul class="nav navbar-nav navbar-right ">
        

        <li class="dropdown hidden-lg hidden-md">
            <a href="#" class="dropdown-toggle ipad-mode" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fa fa-user" aria-hidden="true"></i> <?php echo e(Auth::user()->username); ?><span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="#"><i class="fa fa-id-card" aria-hidden="true"></i> &nbsp; Profile</a></li>
            </ul>
        </li>
        <?php if(Auth::user()->user_level == 'Administrator'): ?>
        <li class="dropdown hidden-lg hidden-md">
          <a href="#" class="dropdown-toggle ipad-mode" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-briefcase fa-lg"></i>
              Overview <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
              <li><a href="/items"><i class="fa fa-cube" aria-hidden="true"></i> Company</a></li>
              <li><a href="/menus"><i class="fa fa-clone" aria-hidden="true"></i> System Setting</a></li>
          </ul>
        </li>
        <?php endif; ?>

        <?php if(Auth::user()->user_level == 'Administrator' || Auth::user()->user_level == 'Cashier'): ?>
        <li class="dropdown hidden-lg hidden-md">
          <a href="#" class="dropdown-toggle ipad-mode" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-shopping-cart fa-lg"></i>  POS <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
              <?php if(App\SystemSetting::all()->first()->system_mode == 'Restaurant'): ?>
              <li><a href="/restaurant">Restaurant Mode</a></li>
              <li><a href="/kitchen">Kitchen</a></li>
              <?php elseif(App\SystemSetting::all()->first()->system_mode == 'FastFood'): ?>
              <li><a href="/fastfood">Fast Food Mode</a></li>
              <li><a href="/kitchen">Kitchen</a></li>
              <?php else: ?>
              <li><a href="/retailer">Retailer Mode</a></li>
              <?php endif; ?>
              <li><a href="/orders">Order Logs</a></li>
          </ul>
        </li>
        <?php endif; ?>


        <?php if(Auth::user()->user_level == 'Administrator' || Auth::user()->user_level == 'Maintenance' || Auth::user()->user_level == 'Stock Manager'): ?>
        <li class="dropdown hidden-lg hidden-md">
          <a href="#" class="dropdown-toggle ipad-mode" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-list fa-lg"></i>  File Maintenance <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
            <?php if(App\SystemSetting::all()->first()->system_mode == 'Retailer'): ?>
              <?php if(Auth::user()->user_level == 'Stock Manager'): ?>
              <li><a href="/inventory">Inventory</a></li>
              <?php endif; ?>
            <?php endif; ?>


            <?php if(Auth::user()->user_level == 'Stock Manager'): ?>
            <?php else: ?>
              <?php if(App\SystemSetting::all()->first()->system_mode == 'Retailer'): ?>
              <li><a href="/items">Products</a></li>
              <?php endif; ?>

              <?php if(App\SystemSetting::all()->first()->system_mode == 'Restaurant' || App\SystemSetting::all()->first()->system_mode == 'FastFood'): ?>
              <li><a href="/menus">Menus</a></li>
              <?php endif; ?>
              <li><a href="/customers">Customers</a></li>
              <li><a href="/suppliers">Suppliers</a></li>
              <li><a href="/categories">Categories</a></li>
              <li><a href="/promos">Promos</a></li>

              <?php if(App\SystemSetting::all()->first()->system_mode == 'Restaurant'): ?>
              <li><a href="/tables">Tables</a></li>
              <li><a href="/employees">Employees</a></li>
              <li><a href="/attendance">Employee Attendance</a></li>
              <?php endif; ?>

              <li><a href="/discounts">Discounts</a></li>
              <?php if(Auth::user()->user_level == 'Administrator'): ?>
              <li><a href="#">Archive</a></li>
              <li><a href="/accounts">Accounts</a></li>
              <?php endif; ?>
              <?php endif; ?>
          </ul>
        </li>
        <?php endif; ?>

        <?php if(Auth::user()->user_level == 'Report' || Auth::user()->user_level == 'Administrator'): ?>
        <li class="dropdown hidden-lg hidden-md">
          <a href="#" class="dropdown-toggle ipad-mode" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-clipboard fa-lg"></i>Reports <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
              <li><a href="/salesreports/salesactivities">Sales Reports</a></li>
              <?php if(App\SystemSetting::all()->first()->system_mode == 'Retailer'): ?>
              <li><a href="/inventoryreports/inventoryvalue">Inventory Reports</a></li>
              <?php endif; ?>
              <li><a href="/audittrail">Audit Trail</a></li>
          </ul>
        </li>
        <?php endif; ?>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: #ffffff;">
                <i class="fa fa-cogs" aria-hidden="true"></i> Settings <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="/accountsettings"><i class="fa fa-address-card" aria-hidden="true"></i> &nbsp; Account Settings</a></li>
                <?php if(Auth::user()->user_level == 'Administrator'): ?>
                <li><a href="/systemsettings"><i class="fa fa-desktop" aria-hidden="true"></i> &nbsp; System Settings</a></li>
                <?php endif; ?>
            </ul>
        </li>

        <li>
            <a style="color: #ffffff;" href="<?php echo e(route('logout')); ?>"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
