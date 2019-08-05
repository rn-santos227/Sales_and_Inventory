<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid" >
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home">Generic Inventory System | User</a>
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
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fa fa-user" aria-hidden="true"></i> Account <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="#"><i class="fa fa-address-card" aria-hidden="true"></i> &nbsp; Profile</a></li>
                <li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp; Add Account</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp; &nbsp;Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
        <li><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a></li>
        <li><a href="#"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Help</a></li>
      </ul>
    </div>
  </div>
</nav>
