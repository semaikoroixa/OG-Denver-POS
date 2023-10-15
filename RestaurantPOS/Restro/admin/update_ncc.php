<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
//Add Customer
if (isset($_POST['updateNCC'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["mancc"]) || empty($_POST["tencty"]) || empty($_POST['daidien']) || empty($_POST['sdt'])|| empty($_POST["email"])|| empty($_POST["diachi"])) {
    $err = "Không chấp nhận khoảng trống";
  } else {
    $mancc  = $_POST['mancc'];
    $tencty  = $_POST['tencty'];
    $daidien  = $_POST['daidien'];
    $sdt  = $_POST['sdt'];
    $email  = $_POST['email'];
    $diachi  = $_POST['diachi'];
    $update = $_GET['update'];

    //Insert Captured information to a database table
    $postQuery = "UPDATE rpos_ncc SET tencty =?, daidien =?, sdt =? , email =? , diachi =? WHERE  mancc =?";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('ssssss', $tencty, $daidien, $sdt, $email, $diachi,$mancc);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Nhà cung cấp đã thêm!" && header("refresh:1; url=nha_cung_cap.php");
    } else {
      $err = "Vui lòng thử lại sau!";
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
    $ret = "SELECT * FROM  rpos_ncc WHERE mancc = '$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($ncc = $res->fetch_object()) {
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
                    <label>Mã nhà cung cấp</label>
                    <input type="text" name="mancc" value="<?php echo $ncc->mancc; ?>" class="form-control">
                    
                  </div>
                  <div class="col-md-6">
                    <label>Tên công ty</label>
                    <input type="text" name="tencty" value="<?php echo $ncc->tencty; ?>" class="form-control" value="">
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Đại diện</label>
                    <input type="text" name="daidien" value="<?php echo $ncc->daidien; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>SĐT</label>
                    <input type="text" name="sdt" value="<?php echo $ncc->sdt; ?>" class="form-control" value="">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $ncc->email; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Địa chỉ</label>
                    <input type="text" name="diachi" value="<?php echo $ncc->diachi; ?>" class="form-control" value="">
                  </div>
                </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="updateNCC" value="Update Nhà Cung Cấp" class="btn btn-success" value="">
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