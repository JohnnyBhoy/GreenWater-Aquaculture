 <!-- Sidebar Menu -->
 <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../Home/index" id ="home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
              </p>
            </a> 
          </li> 
          <li class="nav-item">
            <a href="#"   id ="stock" class="nav-link">
              <i class="nav-icon fas fa-water"></i>
              <p>
                Stocking
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Stock/index" id ="stock" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Stock</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Stock/View" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Stock</p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" id ="harvest"  class="nav-link">
              <i class="nav-icon fas fa-fish"></i>
              <p>
                Harvest
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-success right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Harvest/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Harvest</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Harvest/View" id ="viewharvest" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Harvest</p>
                </a>
              </li> 
            </ul>
          </li> 
          <li class="nav-item">
            <a href="../SalesReport/index" id ="salesreport" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sales Report 
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a href="#" id ="inventory"  class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Inventory
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-primary right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Inventory/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Inventory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Inventory/View" id ="viewinventory" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Inventory</p>
                </a>
              </li> 
            </ul>
          </li> 
          <li class="nav-item">
            <a href="../index" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Sign Out 
              </p>
            </a> 
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>