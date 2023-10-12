<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
if (isset($_POST['make'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["table_cap"]) || empty($_POST["customer_name"])) {
    $err = "Không chấp nhận bỏ trống!";
  } else {
    if (isset($_GET['table_id'])!==null){
    $table_id = $_GET['table_id'];
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $capacity=$_POST['table_cap'];
    $status_table = "Đã đặt";

    $postQuery = "UPDATE rpos_table SET customer_name=?, customer_id=?, table_status=?, capacity=? WHERE table_id=?";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('sssii', $customer_name,$customer_id,$status_table,$capacity,$table_id);
    if (!$rc) {
        die('Lỗi khi bind param: ' . $postStmt->error);
    }
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Bàn đã đặt!" && header("refresh:1; url=table_orders.php");
    } else {
      $err = "Vui lòng thử lại sau";
    }
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
              <h3>Thông tin </h3>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
                <div class="form-row">

                  <div class="col-md-4">
                    <label>Tên khách hàng</label>
                    <select class="form-control" name="customer_name" id="custName" onChange="getCustomer(this.value)">
                      <option value="">Chọn tên khách hàng</option>
                      <?php
                      //Load All Customers
                      $ret = "SELECT * FROM  rpos_customers ";
                      $stmt = $mysqli->prepare($ret);
                      $stmt->execute();
                      $res = $stmt->get_result();
                      while ($cust = $res->fetch_object()) {
                      ?>
                        <option><?php echo $cust->customer_name; ?></option>
                      <?php } ?>
                    </select>
              
                  </div>

                  <div class="col-md-4">
                    <label>ID Khách</label>
                    <input type="text" name="customer_id" readonly id="customerID" class="form-control">
                  </div>
                  <!-- <div class="col-md-4">
                    <label>SĐT</label>
                    <input type="text" name="customer_phone" readonly id="customerPhoneno" class="form-control">
                  </div> -->
                </div>
                <hr>
                <?php
                    $table_id = $_GET['table_id'];
                  $ret = "SELECT * FROM  rpos_table WHERE table_id = '$table_id'";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($table = $res->fetch_assoc()) {
                  ?>
                  <div class="form-row">
                  <div class="col-md-6">
                      <label>Chọn bàn</label>
                      <input type="text" readonly name="table_number" value="<?php echo $table['table_id']; ?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label>Số người</label>
                      <input type="text" name="table_cap" class="form-control" value="">
                    </div>
                    
                  </div>
                <?php } ?>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="make" value="Đặt Bàn" class="btn btn-success" value="">
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