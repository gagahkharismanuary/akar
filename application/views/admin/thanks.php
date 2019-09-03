<html>
<head>
  <title>Welcome Page</title>
</head>
<body>
  <h1>Terimakasih <?php echo $this->session->userdata('nama'); ?></h1>
  <h4>Ini adalah halaman thanks yang hanya bisa di akses setelah login</h4>
    <?php 
        echo $this->session->userdata('username')
    ?>
  <a href="<?php echo admin_url('page/welcome') ?>">Welcome Page</a> |
  <a href="<?php echo admin_url('logout') ?>">Logout</a>
</body>
</html>