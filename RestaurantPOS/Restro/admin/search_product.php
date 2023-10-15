<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
// Add Customer
if (isset($_POST['searchProduct'])) {
    $prod_code = $_POST['prod_code'];
    $prod_name = $_POST['prod_name'];

    // Prepare the query with placeholders
    $postQuery = "SELECT * FROM rpos_products WHERE prod_code LIKE ? and prod_name LIKE ?";
    $postStmt = $mysqli->prepare($postQuery);

    if (!$postStmt) {
        // Handle the error if the prepared statement fails
        die('Error: ' . $mysqli->error);
    }

    // Bind the parameter
    $prod_code = '%' . $prod_code . '%';
    $prod_name = '%' . $prod_name . '%';
    $postStmt->bind_param('ss', $prod_code, $prod_name);

    // Execute the query
    if (!$postStmt->execute()) {
        // Handle the error if the query execution fails
        die('Error: ' . $postStmt->error);
    }

    // Get the results
    $result = $postStmt->get_result();

    // Close the prepared statement
    $postStmt->close();
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
              <form method="POST">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Mã sản phẩm</label>
                    <input type="text" name="prod_code" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="prod_name" class="form-control">
                  </div>
                </div> <!-- Close the form-row -->
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="searchProduct" value="Search Products" class="btn btn-success">
                  </div>
                </div> <!-- Close the form-row -->
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Display search results -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3>Kết quả tìm kiếm</h3>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Thực hiện</th>
                  </tr>
                </thead>
                <tbody>
                  <?php                 
                  // Process the search results and display them in the table
                  if (isset($result) && $result->num_rows > 0) {
                    while ($cust = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td>
                          <?php
                          if ($cust['prod_img']) {
                            echo "<img src='assets/img/products/" . $cust['prod_img'] . "' height='60' width='60' class='img-thumbnail'>";
                          } else {
                            echo "<img src='assets/img/products/default.jpg' height='60' width='60' class='img-thumbnail'>";
                          }
                          ?>
                        </td>
                        <td><?php echo $cust['prod_code']; ?></td>
                        <td><?php echo $cust['prod_name']; ?></td>
                        <td>$ <?php echo $cust['prod_price']; ?></td>
                        <td>
                          <a href="products.php?delete=<?php echo $cust['prod_id']; ?>">
                            <button class="btn btn-sm btn-danger">
                              <i class="fas fa-trash"></i>
                              Xóa
                            </button>
                          </a>

                          <a href="update_product.php?update=<?php echo $cust['prod_id']; ?>">
                            <button class="btn btn-sm btn-primary">
                              <i class="fas fa-user-edit"></i>
                              Cập nhật
                            </button>
                          </a>
                        </td>
                      </tr>
                  <?php
                    }
                  } 
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

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