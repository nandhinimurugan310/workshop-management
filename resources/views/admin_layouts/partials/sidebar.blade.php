<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="#" class="app-brand-link">
        <span class="app-brand-logo demo me-1">
          <span style="color: var(--bs-primary)">
            <svg width="30" height="24" viewBox="0 0 250 196" fill="none" xmlns="http://www.w3.org/2000/svg">
              <!-- SVG Paths for Logo -->
            </svg>
          </span>
        </span>
        <span class="app-brand-text demo menu-text fw-semibold ms-2">Auto forge</span>

      </a>
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
      </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <small class="text-muted text-center">Welcome, Kavitha</small>
    <ul class="menu-inner py-1">
        <!-- Income / Invoice Delivery -->
        <li class="menu-item">
        <a href="/dashboard" class="menu-link">
          <i class="menu-icon tf-icons mdi mdi-cash"></i>
          <div data-i18n="Dasboard">Dashboard</div>
        </a>
      </li>
      <!-- Vehicle Analysis -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons mdi mdi-car"></i>
          <div data-i18n="Vehicle Analysis">Vehicle Analysis</div>
        </a>
        <ul class="menu-sub">
          <!-- Create -->
          <li class="menu-item">
            <a href="/vehicle_create" class="menu-link">
              <div data-i18n="Create">Create</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="/vehicle_manage" class="menu-link">
              <div data-i18n="Create">Manage Vehicle</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- Material Allocation -->
       <li class="menu-item">
        <a href="{{ route('material.materialManage') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-package-variant-closed"></i>
          <div data-i18n="Dasboard">Material Allocation</div>
        </a>
      </li>

            <!--Expenses start  -->
  <li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons mdi mdi-currency-usd"></i>
      <div data-i18n="Expenses">Purchase Order</div>
    </a>

    <ul class="menu-sub">

      <!-- purchase  Form -->
      
         <li class="menu-item">
        <a href="{{ route('purchase.managepo') }}" class="menu-link">
          <div data-i18n="Expenses Input Form">Manage PO</div>
        </a>
      </li>
      <!-- Store View -->
      <li class="menu-item">
        <a href="/storecheck" class="menu-link">
          <div data-i18n="Expenses View">Store - Check</div>
        </a>
      </li>

    </ul>
  </li>
  <!--Expenses end -->




      <!-- Store -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons mdi mdi-store"></i>
          <div data-i18n="Store">Store</div>
        </a>
        <ul class="menu-sub">
          <!-- Add Product -->
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Add Product">Add Product</div>
            </a>
          </li>
          <!-- Returns -->
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Returns">Returns</div>
            </a>
          </li>
          <!-- Return View -->
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Return View">Return View</div>
            </a>
          </li>
          <!-- Labor -->
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Labor">Labour</div>
            </a>
          </li>
        </ul>
      </li>

      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons mdi mdi-account"></i>
          <div data-i18n="Vehicle Analysis">Staff</div>
        </a>
        <ul class="menu-sub">
          <!-- Create -->
          <li class="menu-item">
            <a href="/users" class="menu-link">
              <div data-i18n="Create">User</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="/manage-permissions" class="menu-link">
              <div data-i18n="Create">Manage</div>
            </a>
          </li>
        </ul>
      </li>



   
    <!-- Add supplier -->
   <li class="menu-item">
  <a href="/vendors" class="menu-link">
    <i class="menu-icon tf-icons mdi mdi-warehouse"></i>
    <div data-i18n="Income / Invoice Delivery">Add Supplier</div>
  </a>
</li>
      <li class="menu-item">
          <a href="#" class="menu-link">
              <i class="menu-icon tf-icons mdi mdi-power"></i>
            <div data-i18n="Income / Invoice Delivery">Log Out</div>
          </a>
        </li>


    </ul>




  </aside>
