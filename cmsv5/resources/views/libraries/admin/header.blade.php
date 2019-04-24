<!-- begin #header -->
<div id="header" class="header navbar navbar-default navbar-fixed-top">
  <!-- begin container-fluid -->
  <div class="container-fluid">

    <!-- begin mobile sidebar expand / collapse button -->
    <div class="navbar-header">
      <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span>{{\App\Admin\SiteValues::find(2)->Value}} / cms[v5]</a>
      <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- end mobile sidebar expand / collapse button -->


    <!-- begin header navigation right -->
    <ul class="nav navbar-nav navbar-right">

      <li class="dropdown">
        <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
          <i class="fa fa-bell-o"></i>
          <span class="label">5</span>
        </a>
        <ul class="dropdown-menu media-list pull-right animated fadeInDown">
          <li class="dropdown-header">Notifications (5)</li>
        </ul>
      </li>
    </ul>
    <!-- end header navigation right -->
  </div>
  <!-- end container-fluid -->
</div>
<!-- end #header -->
