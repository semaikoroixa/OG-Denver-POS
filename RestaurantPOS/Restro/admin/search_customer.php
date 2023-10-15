<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
// Add Customer
if (isset($_POST['searchCustomer'])) {
    $customer_name = $_POST['customer_name'];

    // Prepare the query with placeholders
    $postQuery = "SELECT * FROM rpos_customers WHERE customer_name LIKE ?";
    $postStmt = $mysqli->prepare($postQuery);

    if (!$postStmt) {
        // Handle the error if the prepared statement fails
        die('Error: ' . $mysqli->error);
    }

    // Bind the parameter
    $customer_name = '%' . $customer_name . '%';
    $postStmt->bind_param('s', $customer_name);

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
                    <label>Tên KH</label>
                    <input type="text" name="customer_name" class="form-control">
                  </div>
                </div> <!-- Close the form-row -->
              <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="searchCustomer" value="Search Customer" class="btn btn-success">
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
                    <th scope="col">Tên KH</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Chú thích</th>
                  </tr>
                </thead>
                <tbody>
                <?php                 
                  // Process the search results and display them in the table
                  if (isset($result) && $result->num_rows > 0) {
                    while ($cust = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td><?php echo $cust['customer_name']; ?></td>
                        <td><?php echo $cust['customer_phoneno']; ?></td>
                        <td><?php echo $cust['customer_email']; ?></td>
                        <td>
                        <a href="customes.php?delete=<?php echo $cust['customer_id']; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                           Xóa
                          </button>
                        </a>

                        <a href="update_customer.php?update=<?php echo $cust['customer_id']; ?>">
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