<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
//Udpate Staff
if (isset($_POST['UpdateXuat'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["xuat_code"]) || empty($_POST["xuat_name"]) || empty($_POST['xuat_qty']) || empty($_POST['xuat_price']) || empty($_POST['xuat_time'])) {
    $err = "Không được để trống!";
  } else {
        $xuat_code = $_POST['xuat_code'];
        $xuat_name = $_POST['xuat_name'];
        $xuat_qty = $_POST['xuat_qty'];
        $xuat_price = $_POST['xuat_price'];
        $xuat_time = $_POST['xuat_time'];
        $update = $_GET['update'];
    
    //Insert Captured information to a database table
    $postQuery = "UPDATE rpos_storage_xuat SET  xuat_code =?, xuat_name =?, xuat_qty =?, xuat_price =?, , xuat_time =? WHERE xuat_id =?";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('sssssi', $xuat_code, $xuat_name, $xuat_qty, $xuat_price, $xuat_time, $update);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Sản Phẩm đã cập nhật" && header("refresh:1; url=storage_xuat.php");
    } else {
      $err = "Vui lòng thử lại sau";
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
    $update = $_GET['update'];
    $ret = "SELECT * FROM rpos_storage_xuat WHERE xuat_id = '$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($xuat = $res->fetch_object()) {
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
              </div>
              <div class="card-body">
                <form method="POST">
                  <div class="form-row">
                    <div class="col-md-6">
                      <label>Mã Sản Phẩm</label>
                      <input type="text" name="xuat_code" class="form-control" value="<?php echo $xuat->xuat_code; ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Tên Sản Phẩm</label>
                      <input type="text" name="xuat_name" class="form-control" value="<?php echo $xuat->xuat_name; ?>">
                    </div>
                  </div>
                  <div class="form-row">
                  <div class="col-md-6">
                    <label>Số Lượng</label>
                    <input type="text" name="xuat_qty" class="form-control" value="<?php echo $xuat->xuat_qty; ?>">
                  </div>
                  <div class="col-md-6">
                    <label>Giá xuất</label>
                    <input type="text" name="xuat_price" class="form-control" value="<?php echo $xuat->xuat_price; ?>">
                  </div>
                  <div class="col-md-6">
                    <label>Ngày xuất</label>
                    <input type="date" name="xuat_time" class="form-control" value="<?php echo $xuat->xuat_time; ?>">
                  </div>
                </div>
                  
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="UpdateXuat" value="Update Storage" class="btn btn-success" value="">
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
    }
      ?>
      </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>