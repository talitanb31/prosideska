<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!doctype html>
<html lang="en">

<?php $this->load->view("_partials/head.php")?>

<body class="">
  <div class="wrapper ">
    <!-- sidebar -->
    <?php $this->load->view("_partials/sidebar.php") ?>
    <div class="main-panel" style="height: 100vh;">
      <!-- Navbar -->
      <?php $this->load->view("_partials/navbar.php") ?>
      <!-- End Navbar -->
      <?php
          echo $contents;
      ?>
      <!-- footer -->
      <?php $this->load->view("_partials/footer.php") ?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <?php $this->load->view("_partials/js.php")?>
</body>

</html>
