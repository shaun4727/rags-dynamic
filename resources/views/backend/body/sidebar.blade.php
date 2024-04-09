  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="../images/logo-dark.png" alt="">
						  <h3><b>Sunny</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li>
          <a href="index.html">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
            <li><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All Subcategory</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('manage.slider') }}"><i class="ti-more"></i>Manage Slider</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Product</a></li>
            <li><a href="{{ route('manage.product') }}"><i class="ti-more"></i>Manage Product</a></li>
          </ul>
        </li>


    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
