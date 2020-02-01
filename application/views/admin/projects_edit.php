<html>
<head>
  <title>Edit Project</title>
  <link href="<?php echo assets_url('vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo assets_url('css/sb-admin-2.css')?>" rel="stylesheet">
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo akar_url('dashboard') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> Akar Admin </div>
      </a>

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a 
              class="collapse-item" 
              href= "<?php echo akar_url('blank') ?>"
            >
              Blank Page
            </a>
          </div>
        </div>
      </li> -->
      <!-- Nav Clients -->
      <li class="nav-item">
          <a 
            class="nav-link" 
            href="<?php echo akar_url('clients') ?>"
          >
            <i class="fas fa-fw fa-handshake"></i>
            <span>Clients</span></a>
        </li>


      <!-- Nav Products -->
      <li class="nav-item">
        <a 
          class="nav-link" 
          href="<?php echo akar_url('products') ?>"
        >
          <i class="fas fa-fw fa-images"></i>
          <span>Products</span></a>
      </li>
      <!-- Nav Projects -->
      <li class="nav-item">
        <a 
          class="nav-link" 
          href="<?php echo akar_url('projects') ?>"
        >
          <i class="fas fa-fw fa-folder-open"></i>
          <span>Projects</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $this->session->userdata('nama'); ?></span>
                  <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <!-- <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                  </a> -->
                  <!-- <div class="dropdown-divider"></div> -->
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>

            </ul>

          </nav>
          <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit Projects</h1>
          <!-- <form 
            method="post" 
            action="<?=base_url('store-image')?>" 
            enctype="multipart/form-data"
          >
                <input type="file" id="profile_image" name="profile_image" size="33" />
                <input type="submit" value="Upload Image" />
            </form> -->
      
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <form 
                      id="submit" 
                      class="user" 
                      action="<?php echo base_url(). 'projects/update' ?>"
                      method='post'
                      enctype="multipart/form-data"
                    >
                    <input type="hidden" name="project_id" value="<?php echo $projects->project_id ?>">
                      <div class="form-group row">
                        <input 
                          type="text" 
                          class="form-control form-control-user" 
                          id="project_name" 
                          name="project_name"
                          placeholder="Projects Name"
                          value="<?php echo $projects->project_name; ?>"
                        >
                      </div>
                      <div class="form-group row">
                        <textarea 
                          type="text"
                          class="form-control bg-white small" 
                          id="project_description" 
                          name="project_description"
                          placeholder="Description..."
                          aria-label="Description"
                          aria-describedby="basic-addon2"><?php echo $projects->project_description; ?>
                        </textarea>
                      </div>
                      <div class="form-group row">
                        <span class="col-lg-2 d-flex align-items-center">Client: </span>
                        <select class="form-control col-lg-10" name="client_id">
                          <?php 
                            foreach($clients as $client)
                            { 
                              $array = $client->client_id;
                              $key = similar_text($projects->client_id, $array);
                              if($key) {
                                echo '<option value="'.$client->client_id.'" selected>'.$client->client_name.'</option>';
                              } else {
                                echo '<option value="'.$client->client_id.'">'.$client->client_name.'</option>';
                              }
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                        <span class="col-lg-2 d-flex align-items-center">Status: </span>
                        <select class="form-control col-lg-10" name="status_id">
                          <?php 
                            foreach($status as $s)
                            { 
                              $array = $s->status_id;
                              $key = similar_text($projects->status_id, $array);
                              if($key) {
                                echo '<option value="'.$s->status_id.'" selected>'.$s->status_name.'</option>';
                              } else {
                                echo '<option value="'.$s->status_id.'">'.$s->status_name.'</option>';
                              }
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                        <span class="col-lg-2 d-flex align-items-center">Portfolio Reference: </span>
                        <select class="form-control col-lg-10" name="products_id">
                          <?php 
                            foreach($products as $product)
                            { 
                              $array = $product->product_id;
                              $key = similar_text($projects->products_id, $array);
                              if($key) {
                                echo '<option value="'.$product->product_id.'" selected>'.$product->title.'</option>';
                              } else {
                                echo '<option value="'.$product->product_id.'">'.$product->title.'</option>';
                              }
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                        <span class="col-lg-2 d-flex align-items-center">Category: </span>
                        <select class="form-control col-lg-10" name="category_id">
                          <?php 
                            foreach($category as $c)
                            { 
                              $array = $c->category_id;
                              $key = similar_text($projects->category_id, $array);
                              if($key) {
                                echo '<option value="'.$c->category_id.'" selected>'.$c->category_name.'</option>';
                              } else {
                                echo '<option value="'.$c->category_id.'">'.$c->category_name.'</option>';
                              }
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                          <span class="col-lg-2 d-flex align-items-center">Start Time: </span>
                          <input 
                            type="date" 
                            class="form-control form-control-user col-lg-4" 
                            id="start_time" 
                            name="start_time"
                            placeholder="Start Time"
                            value="<?php echo date('Y-m-d', strtotime($projects->start_time)); ?>"
                          >
                          <span class="col-lg-2 d-flex align-items-center">End Time: </span>
                          <input 
                            type="date" 
                            class="form-control form-control-user col-lg-4" 
                            id="end_time" 
                            name="end_time"
                            placeholder="End Time"
                            value="<?php echo date('Y-m-d', strtotime($projects->end_time)); ?>"
                          >
                      </div>
                        <button 
                          class="btn btn-success"
                          id="btn_upload" 
                          type="submit"
                        >
                        Upload
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a 
            class="btn btn-primary" 
            href="<?php echo admin_url('logout') ?>"
          >
            Logout
          </a>
        </div>
      </div>
    </div>
  </div>

  

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo assets_url('vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo assets_url('vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo assets_url('vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo assets_url('js/sb-admin-2.min.js')?>"></script>
  <script src="<?php echo assets_url('vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  

</body>
</html>