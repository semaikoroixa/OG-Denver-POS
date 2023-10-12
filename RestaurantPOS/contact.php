<?php 
    //Tạo kết nối đến DB
    $con=mysqli_connect('localhost','root','','rposystem')
    or die('Lỗi kết nối');
    //Tạo và thực hiện chèn dl vào bảng lienhe
    $ht='';$sdt='';$em='';$cd='';$tn='';
    if(isset($_POST['btnLuu'])){
        $ht=$_POST['txtHoten'];
        $sdt=$_POST['txtSodienthoai'];
        $em=$_POST['txtEmail'];
        $cd=$_POST['txtChude'];
        $tn=$_POST['txtTinnhan'];     
                echo "<script>alert('Lời nhắn của bạn đã được ghi nhận! Chúng tôi sẽ phản hồi lại sớm nhất!')</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ | The OG Denver</title>
    <link rel="shortcut icon" href="./images/download.ico" type="image/x-icon">
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./globalStyles.css">
    <link rel="stylesheet" href="./components.css">
    <!-- aos css -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
    <!--Nav Section  -->
    
    <div class="nav">
        <div class="container">
          <div class="nav__wrapper">
            <a href="./index.php" class="logo">
              <img src="./images/ogdenver.png" alt="The Original">
            </a>
            <nav>
              <div class="nav__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-menu">
                  <line x1="3" y1="12" x2="21" y2="12" />
                  <line x1="3" y1="6" x2="21" y2="6" />
                  <line x1="3" y1="18" x2="21" y2="18" />
                </svg>
              </div>
              <div class="nav__bgOverlay"></div>
              <ul class="nav__list">
                <div class="nav__close">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-x">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                  </svg>
                </div>
                <div class="nav__list__wrapper">
                  <li><a class="nav__link" href="./index.php">Home</a></li>
                  <li><a class="nav__link" href="./menu.html">Menu</a></li>
                  <li><a class="nav__link" href="./about.html">Về chúng tôi</a></li>
                  <li><a class="nav__link" href="./contact.php">Liên hệ</a></li>
                  <li><a href="./index.html" class="btn primary-btn">Đăng nhập</a></li>
                </div>
              </ul>
            </nav>
          </div>
        </div>
      </div>
 <!-- End Nav Section -->

        

 <!-- phần ảnh mở đầu -->
 

 <!-- end -->
    <!-- Store Info Section -->
   


        </section>
        <!-- End Store Info Section -->

        <!-- Contact form section -->
        <section id="form" data-aos="fade-down">
    <div class="container">
    <h3 class="form__title">
        LIÊN HỆ VỚI CHÚNG TÔI
    </h3>
    <div class="form__text">
        <br>
        <br>
        <br>
        <p>Hãy để chúng tôi biết nếu bạn có bất kỳ câu hỏi, thắc mắc hay góp ý nào</p>
        <p>Chúng tôi sẽ cố gắng hồi đáp nhanh nhất có thể. Đừng ngần ngại, hãy liên hệ với chúng tôi ngay bây giờ!</p>
    </div>
      <div class="form__wrapper">
        <form name="contact" method="POST" netlify>
          <div class="form__group">
            <label for="hoten">Họ và tên</label>
            <input type="text" id="hoten" name="txtHoten" value="<?php echo $ht ?>" required>
          </div>
          <div class="form__group">
            <label for="sodienthoai">Số điện thoại</label>
            <input type="text" id="sodienthoai" name="txtSodienthoai" value="<?php echo $sdt ?>" required>
          </div>
          <div class="form__group">
            <label for="email">Email</label>
            <input type="email" id="email" name="txtEmail" value="<?php echo $em ?>" required>
          </div>
          <div class="form__group">
            <label for="chude">Chủ đề</label>
            <input type="text" id="chude" name="txtChude" value="<?php echo $cd ?>" required>
          </div>
          
          <div class="form__group form__group__full">
            <label for="tinnhan">Tin nhắn</label>
            <textarea name="txtTinnhan" id="tinnhan" cols="30" rows="10" value="<?php echo $tn ?>" required></textarea>
          </div>
          <button type="submit" class="btn primary-btn" name="btnLuu">Gửi liên hệ</button>
        </form>
      </div>
    </div>
  </section>

        <!-- End Contact form section -->

    <!-- footer -->
      <Footer>
        <div class="container">
            <div class="footer__wrapper">
                <div class="footer__col1">
                    <div class="footer__logo">
                        <img src="./images/ogdenver.png" alt="OG Denver">
                    </div>
                    <p class="footer__desc">Gửi yêu thương trong từng món ăn, mang niềm vui đến mọi gia đình.</p>
                    <div class="footer__socials">
                        <h4 class="footer__socials__title">Theo dõi chúng tôi</h4>
                        <ol>
                            <li>
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                                </a>
                            </li>
                            <li>
                                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="footer__col2">
                    <h3 class="footer__text__title">
                        Links
                    </h3>
                    <ol class="footer__text">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="menu.html">Menu</a>
                        </li>
                        <li>
                            <a href="index.html">Đặt bàn</a>
                        </li>
                        <li>
                            <a href="about.html">Về chúng tôi</a>
                        </li>
                        <li>
                            <a href="contact.php">Liên hệ</a>
                        </li>
                        <li>
                            <a href="#">Chính sách bảo mật</a>
                        </li>
                    </ol>
                </div>

                <div class="footer__col3">
                    <h3 class="footer__text__title">
                        Hỗ trợ
                    </h3>
                    <ol class="footer__text">
                        <li>
                            <a href="contact.php">Liên hệ</a>
                        </li>
                        <li>
                            <a href="#">Trung tâm hỗ trợ</a>
                        </li>
                        <li>
                            <a href="#">Phản hồi</a>
                        </li>
                    </ol>
                </div>

                <div class="footer__col4">
                    <h3 class="footer__text__title">
                        Liên hệ
                    </h3>
                    <ol class="footer__text">
                        <li>
                            <a href="tel:+0862382314">SĐT: 0862382314</a>
                        </li>
                        <li>
                            <a href="mailto:lythanhlong2003@gmail.com">ogrestaurant@gmail.com</a>
                        </li>
                        <li>
                            <a href="">Địa chỉ: Số 10 Nguyễn Hiền, Thanh Xuân, Hà Nội</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
      </Footer>
      <div id="copyright">
        <div class="container">
            <p class="copyright__text">
                ©Copyright 2023 OG Denver | All rights reserved
            </p>
        </div>
      </div>




    <!-- aos script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <!-- custom -->
      <script src="./main.js"> </script>
</body>
</html>