<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');
$full_total = $_GET['full_total'];
check_login();

if (isset($_POST['pay'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["pay_code"]) || empty($_POST["pay_amt"]) || empty($_POST['pay_method'])) {
    $err = "Không chấp nhận khoảng trống";
  } else {

    $pay_code = $_POST['pay_code'];
    $customer_id = $_GET['customer_id'];
    $pay_amt  = $_POST['pay_amt'];
    $pay_method = $_POST['pay_method'];
    $pay_id = $_POST['pay_id'];
    $order_code='Full Bàn';
    $order_status = $_GET['order_status'];
    $table_status='Trống';
    
  

    //Insert Captured information to a database table
    $postQuery = "INSERT INTO rpos_payments (pay_id, pay_code, order_code, customer_id, pay_amt, pay_method) VALUES(?,?,?,?,?,?)";
    $upQry = "UPDATE rpos_orders SET order_status =? WHERE customer_id =?";
   

    $postStmt = $mysqli->prepare($postQuery);
    $upStmt = $mysqli->prepare($upQry);
    
    //bind paramaters

    $rc = $postStmt->bind_param('ssssss', $pay_id, $pay_code, $order_code, $customer_id, $pay_amt, $pay_method);
    $rc = $upStmt->bind_param('ss', $order_status, $customer_id);

    $postStmt->execute();
    $upStmt->execute();
//     $getTableIdQuery = "SELECT table_id FROM rpos_table WHERE customer_id = ?";
// $getTableIdStmt = $mysqli->prepare($getTableIdQuery);
// // Bind giá trị vào truy vấn SQL
// $getTableIdStmt->bind_param('s', $customer_id);
// // Thực hiện truy vấn SQL
// $getTableIdStmt->execute();
// // Lưu trữ kết quả truy vấn vào biến
// $getTableIdStmt->bind_result($id_table);
// $getTableIdStmt->fetch();
// echo $id_table;

//     $tableQry="UPDATE rpos_table SET table_status =?,customer_id=null,customer_name=null,capacity=null WHERE table_id =?";
//     $tableStmt = $mysqli->prepare($tableQry);
//     $rc = $tableStmt->bind_param('ss', $table_status, $id_table);
//     $tableStmt->execute();






    //declare a varible which will be passed to alert function
    if ($upStmt && $postStmt) {
      $success = "Đã trả" && header("refresh:1; url=table_orders.php");
    } else {
      $err = "Vui lòng thử lại!";
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
  
    ?>
    
    <!-- Header -->
    <div style="background-image: url(../admin/assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
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
              <form method="POST"  enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>ID Thanh toán</label>
                    <input type="text" name="pay_id" readonly value="<?php echo $payid;?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Mã thanh toán</label>
                    <input type="text" name="pay_code" value="<?php echo $mpesaCode; ?>" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Tổng tiền ($)</label>
                    <input type="text" name="pay_amt" readonly value="<?php echo $full_total;?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Phương thức thanh toán</label>
                    <select class="form-control" name="pay_method">
                        <option selected>Cash</option>
                        <option>Paypal</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="pay" value="Thanh toán bàn" class="btn btn-success" value="">
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