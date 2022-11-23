  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/img/profile/').$user['image']; ?>" class="img-circle"  alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <?php $role_id = $this->session->userdata('role_id');
            if($role_id==1){
              echo "<li class='nav-item'>";
              echo "<a class='nav-link' href="; echo base_url('admin/index'); echo ">";
              echo  "<i class='fa fa-dashboard'></i> <span>Dashboard</span>";
              echo "</a> ";
              echo"</li>";
            }
         ?>
       
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('projek/index'); ?>">
            <i class="fa fa-book"></i> <span>Projek</span>
          </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('fungsi/proses'); ?>">
            <i class="fa fa-tasks"></i> <span>Proses Peramalan</span>
          </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('fungsi/hasil'); ?>">
            <i class="fa fa-print"></i> <span>Cetak Hasil / Grafik</span>
          </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('fungsi/grafik'); ?>">
            <i class="fa fa-line-chart"></i> <span>Grafik</span>
          </a> 
        </li>
         <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('user/index'); ?>">
            <i class="fa fa-user"></i> <span>User Profile</span>
          </a> 
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-book"></i> 
            <span>Data Bandwidth</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <li><a href="#"><i class="nav-link"></i> Data Bulanan</a></li>
            <li><a href="#"><i class="nav-link"></i> Data Harian</a></li>
          </ul> 
        </li> -->
        <!-- <li class="active treeview">
          <a href="#">
            <i class="fa fa-lock"></i> <span>Setting</span>
          </a> 
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>">
            <i class="fa fa-sign-out"></i> <span>Log Out</span>
          </a> 
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>