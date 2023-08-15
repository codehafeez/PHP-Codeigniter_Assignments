<style>.sidenav-link.active { color: #ff0303 !important; }</style>


<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-dark">
<div class="app-brand demo">
<span class="headerLabel" style="color: #fff;font-size: 20px;font-weight: bold;">Super Wasila Market</span>
</div>
<div class="sidenav-divider mt-0"></div>
<ul class="sidenav-inner py-1">




<li class="sidenav-item">
<a href="<?= base_url('Dashboard')?>" class="Dashboard-menu sidenav-link">
<i class="sidenav-icon feather icon-layers"></i>
<div>Dashboard</div>
</a>
</li>


<li class="sidenav-item">
<a href="<?= base_url('AddProduct')?>" class="Add_New_Product-menu sidenav-link">
<i class="sidenav-icon feather icon-layers"></i>
<div>Add New Product</div>
</a>
</li>

<li class="sidenav-item">
<a href="<?= base_url('Products')?>" class="View_Products-menu sidenav-link">
<i class="sidenav-icon feather icon-layers"></i>
<div>View Products</div>
</a>
</li>

<li class="sidenav-item">
<a href="<?= base_url('Category')?>" class="category-menu sidenav-link">
<i class="sidenav-icon feather icon-layers"></i>
<div>Product Type</div>
</a>
</li>

<li class="sidenav-item">
<a href="<?= base_url('Settings')?>" class="Settings-menu sidenav-link">
<i class="sidenav-icon feather icon-layers"></i>
<div>Settings</div>
</a>
</li>

<li class="sidenav-item">
<a href="<?= base_url('Logout')?>" class="sidenav-link">
<i class="sidenav-icon feather icon-layers"></i>
<div>Logout</div>
</a>
</li>

</ul>
</div>




<div class="layout-container">
<nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-dark container-p-x" id="layout-navbar">
<a href="index.html" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
<span class="app-brand-text demo font-weight-normal ml-2">Super Wasila Market</span>
</a>
<div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
<a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
<i class="ion ion-md-menu text-large align-middle"></i>
</a>
</div>

<div class="col-sm-9 col-xl-9"></div>
<div class="col-sm-3 col-xl-3 input-group">
<div class="input-group-prepend">
<span class="input-group-text" style="font-size:14px; font-weight:bold; color:#fff;">Select Langugage</span>
</div>

  <select style="background:#ab4c52; font-size:14px; font-weight:bold; color:#fff;" onchange="changeSession()" id="selected_language" class="form-control">
	<option value="en"<?php if($this->session->userdata('session_language') == 'en'): ?> selected="selected"<?php endif; ?>>English</option>
	<option value="fr"<?php if($this->session->userdata('session_language') == 'fr'): ?> selected="selected"<?php endif; ?>>French</option>
	<option value="nl"<?php if($this->session->userdata('session_language') == 'nl'): ?> selected="selected"<?php endif; ?>>Dutch</option>
  </select>
  
</div>


</nav>
<div class="layout-content">
<div class="container-fluid flex-grow-1 container-p-y">
