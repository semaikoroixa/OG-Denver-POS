<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
if (isset($_POST['addProduct'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["prod_code"]) || empty($_POST["prod_name"]) || empty($_POST['prod_desc']) || empty($_POST['prod_price'])) {
    $err = "Không được để trống!";
  } else {
    $prod_id = $_POST['prod_id'];
    $prod_code  = $_POST['prod_code'];
    $prod_name = $_POST['prod_name'];
    $prod_img = $_FILES['prod_img']['name'];
    move_uploaded_file($_FILES["prod_img"]["tmp_name"], "assets/img/products/" . $_FILES["prod_img"]["name"]);
    $prod_desc = $_POST['prod_desc'];
    $prod_price = $_POST['prod_price'];
                    // Check if staff_email already exists in the database
                    $checkQuery = "SELECT * FROM rpos_products WHERE prod_name = ?";
                    $checkStmt = $mysqli->prepare($checkQuery);
                    $checkStmt->bind_param('s', $prod_name);
                    $checkStmt->execute();
                    $checkResult = $checkStmt->get_result();
                    if ($checkResult->num_rows > 0) {
                      $err = "Món ăn đã tồn tại trong hệ thống. Vui lòng tạo một tên món ăn khác.";
                    }
                    else{

    //Insert Captured information to a database table
    $postQuery = "INSERT INTO rpos_products (prod_id, prod_code, prod_name, prod_img, prod_desc, prod_price ) VALUES(?,?,?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('ssssss', $prod_id, $prod_code, $prod_name, $prod_img, $prod_desc, $prod_price);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Sản phẩm đã thêm" && header("refresh:1; url=product.php");
    } else {
      $err = "Vui lòng thử lại";
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
              <h3>Điền thông tin</h3>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="prod_name" class="form-control">
                    <input type="hidden" name="prod_id" value="<?php echo $prod_id; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Mã SP</label>
                    <input type="text" name="prod_code" value="<?php echo $alpha; ?>-<?php echo $beta; ?>" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Hình SP</label>
                    <input type="file" name="prod_img" class="btn btn-outline-success form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Giá SP</label>
                    <input type="text" name="prod_price" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-12">
                    <label>Mô tả</label>
                    <textarea rows="5" name="prod_desc" class="form-control" value=""></textarea>
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addProduct" value="Add Product" class="btn btn-success" value="">
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