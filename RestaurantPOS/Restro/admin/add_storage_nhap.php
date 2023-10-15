<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
if (isset($_POST['addNhap'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["nhap_code"]) || empty($_POST["nhap_name"]) || empty($_POST['nhap_qty']) || empty($_POST['nhap_price']) || empty($_POST['nhap_time'])) {
    $err = "Không được để trống!";
  } else {
    $nhap_id = $_POST['nhap_id'];
    $nhap_code  = $_POST['nhap_code'];
    $nhap_name = $_POST['nhap_name'];
    $nhap_qty = $_POST['nhap_qty'];
    $nhap_price = $_POST['nhap_price'];
    $nhap_time = $_POST['nhap_time'];

    //Insert Captured information to a database table
    $postQuery = "INSERT INTO rpos_storage_nhap (nhap_id, nhap_code, nhap_name, nhap_qty, nhap_price, nhap_time ) VALUES(?,?,?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('ssssss', $nhap_id, $nhap_code, $nhap_name, $nhap_qty, $nhap_price, $nhap_time);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Sản phẩm đã thêm" && header("refresh:1; url=storage_nhap.php");
    } else {
      $err = "Vui lòng thử lại";
    }
  }
}
require_once('partials/_head.php');
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <!-- Header -->
    <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3>Điền thông tin</h3>
            </div><!-- For more projects: Visit codeastro.com  -->
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="nhap_name" class="form-control">
                    <input type="hidden" name="nhap_id" value="<?php echo $nhap_id; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Mã sản phẩm</label>
                    <input type="text" name="nhap_code" value="<?php echo $alpha; ?>-<?php echo $beta; ?>" class="form-control" value="">
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Số lượng</label>
                    <input type="text" name="nhap_qty" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Giá SP</label>
                    <input type="text" name="nhap_price" class="form-control" value="">
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="col-md-12">
                    <label>Ngày nhập</label>
                    <input type="date" name="nhap_time" class="form-control" value="">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addNhap" value="Thêm sản phẩm kho" class="btn btn-success">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>