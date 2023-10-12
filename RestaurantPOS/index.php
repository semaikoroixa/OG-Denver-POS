<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ | The OG Denver</title>
    <link rel="shortcut icon" href="./images/download.ico" type="image/x-icon">
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./globalStyles.css">
    <link rel="stylesheet" href="./components.css">
    <link rel="stylesheet" href="./home.css">
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
                  <li><a class="nav__link" href="./about.html">Thông tin</a></li>
                  <li><a class="nav__link" href="./contact.php">Liên hệ</a></li>
                  <li><a href="index.html" class="btn primary-btn">Đăng nhập</a></li>
                </div>
              </ul>
            </nav>
          </div>
        </div>
      </div>
 <!-- End Nav Section -->
        <!-- Hero Section -->
        <section id="hero">
            <div class="container">
                <div class="hero__wrapper">
                    <div class="hero__left" data-aos="fade-left">
                        <div class="hero__left__wrapper">
                            <h1 class="hero__heading">Hương Vị Truyền Thống</h1>
                            <p class="hero__info">Chúng tôi tự hào có sự kết hợp giữa các món ăn cổ điển được yêu thích
                                 cùng với các cách chế biến sáng tạo. </p>
                            <div class="button__wrapper">
                                <a href="menu.php" class="btn primary-btn">Menu</a>
                                <a href="Restro/customer" class="btn">Đặt Bàn</a>
                            </div>
                        </div>
                    </div>
                    <div class="hero__right" data-aos="fade-right">
                        <div class="hero__imgWrapper">
                            <img src="./images/heroImg1.jpg" alt="food img">
                        </div>
                    </div>
                </div>
            </div>
    
        </section>
    
        <!-- End Hero Section -->
    <!-- Store Info Section -->
        <section id="storeInfo" data-aos="fade-up"
        data-aos-duration="2000">
            <div class="container">
                <div class="storeInfo__wrapper">
                    <div class="storeInfo__item">
                        <div class="storeInfo__icon">
                            <img src="./images/wall-clock-icon.svg" alt="icon">
                        </div>
                        <h3 class="storeInfo__title">
                            7AM - 3PM
                        </h3>
                        <p class="storeInfo__text">
                            Giờ mở cửa
                        </p>
                    </div>
                    <div class="storeInfo__item">
                        <div class="storeInfo__icon">
                            <img src="./images/address-icon.svg" alt="icon">
                        </div>
                        <h3 class="storeInfo__title">
                            Số 23 Nguyễn Trãi, Thanh Xuân, Hà Nội
                        </h3>
                        <p class="storeInfo__text">
                            Địa chỉ
                        </p>
                    </div>
                    <div class="storeInfo__item">
                        <div class="storeInfo__icon">
                            <img src="./images/phone-icon.svg" alt="icon">
                        </div>
                        <h3 class="storeInfo__title">
                            098.655.2323
                        </h3>
                        <p class="storeInfo__text">
                            Gọi ngay
                        </p>
                    </div>
                </div>
            </div>


        </section>

    <!-- End Store Info Section -->
    <!-- Our Specials Section -->
    <section id="ourSpecials" data-aos="fade-down"
    data-aos-easing="linear"
    data-aos-duration="1000">
            <div class="ourSpecials__wrapper">
                <div class="ourSpecials__left">
                    <div class="ourSpecials__item">
                        <div class="ourSpecials__item__img">
                            <img src="./images/food-3.png" alt="Món đặc biệt 1">
                        </div>
                        <h2 class="ourSpecials__item__title">Khoai lang ngọt chiên Texas</h2>
                        <h3 class="ourSpecials__item__price">78.000₫</h3>
                        <div class="ourSpecials__item__stars">
                            <img src="./images/5star.png" alt="5 Stars">
                        </div>
                        <p class="ourSpecials__item__text">
                            Khoai lang ngọt chiên giòn rụm kết hợp cùng công thức sốt đậm đà với tỏi băm, rau tươi,
                            hạt điều và sốt ketchup Texas đặc trưng
                            sẽ kích thích mọi giác quan của bạn.
                        </p>
                    </div>
                    <div class="ourSpecials__item">
                        <div class="ourSpecials__item__img">
                            <img src="./images/food-1.png" alt="Món đặc biệt 1">
                        </div>
                        <h2 class="ourSpecials__item__title">Salad Nga</h2>
                        <h3 class="ourSpecials__item__price">90.000₫</h3>
                        <div class="ourSpecials__item__stars">
                            <img src="./images/4.5star.png" alt="4.5 Stars">
                        </div>
                        <p class="ourSpecials__item__text">
                            Công thức Salad tuyệt đỉnh mang đậm hương vị Moscow là sự pha trộn giữa mỳ sợi, rau củ,
                            trái cây tươi và bơ đảm bảo làm hài lòng ngay cả những vị khách ăn kiêng kĩ tính nhất.
                        </p>
                    </div>
                </div>
                <div class="ourSpecials__right">
                    <h2 class="ourSpecials__title">Các Món Đặc Biệt</h2>
                    <p class="ourSpecials__text">
                        Tất cả các món ăn của chúng tôi đều được chuẩn bị hàng ngày tại 
                        nhà hàng với chất lượng tốt nhất, mang đến những bữa ăn tươi ngon nhất
                        đến với các khách hàng yêu quý.
                    </p>
                    <a href="Restro/customer" class="btn primary-btn">Đặt bàn ngay!</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Special Section -->
    <!-- Top Dishes -->
    <section id="dishGrid" data-aos="zoom-out-up"
    >
        <div class="container">
            <h2 class="dishGrid__title">
                Món Ăn Hàng Đầu
            </h2>
            <div class="dishGrid__wrapper">
                <div class="dishGrid__item">
                    <div class="dishGrid__item__img">
                        <img src="./images/food-1.png" alt="Food IMG">
                    </div>
                    <div class="dishGrid__item__info">
                        <h3 class="dishGrid__item__title">
                            Salad Nga
                        </h3>
                        <h3 class="dishGrid__item__price">90.000₫</h3>
                        <div class="dishGrid__item__stars">
                            <img src="./images/4.5star.png" alt="4.5">
                        </div>
                    </div>
                </div>
                <div class="dishGrid__item">
                    <div class="dishGrid__item__img">
                        <img src="./images/food-2.png" alt="Food IMG">
                    </div>
                    <div class="dishGrid__item__info">
                        <h3 class="dishGrid__item__title">
                            Nộm cà rốt xu hào
                        </h3>
                        <h3 class="dishGrid__item__price">35.000₫</h3>
                        <div class="dishGrid__item__stars">
                            <img src="./images/3.5star.png" alt="3.5">
                        </div>
                    </div>
                </div>
                <div class="dishGrid__item">
                    <div class="dishGrid__item__img">
                        <img src="./images/food-6.png" alt="Food IMG">
                    </div>
                    <div class="dishGrid__item__info">
                        <h3 class="dishGrid__item__title">
                            Tofu Thập cẩm
                        </h3>
                        <h3 class="dishGrid__item__price">85.000₫</h3>
                        <div class="dishGrid__item__stars">
                            <img src="./images/4star.png" alt="4">
                        </div>
                    </div>
                </div>
                <div class="dishGrid__item">
                    <div class="dishGrid__item__img">
                        <img src="./images/food-7.png" alt="Food IMG">
                    </div>
                    <div class="dishGrid__item__info">
                        <h3 class="dishGrid__item__title">
                            Cơm chiên nấm hương hạt sen
                        </h3>
                        <h3 class="dishGrid__item__price">60.000₫</h3>
                        <div class="dishGrid__item__stars">
                            <img src="./images/4.5star.png" alt="4.5">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    <!-- End top Dishes -->
    <!-- Discount Section -->
    <section id="discount" data-aos="fade-down"
    data-aos-easing="linear"
    data-aos-duration="1500">
        <div class="container">
            <div class="discount__wrapper">
                <div class="discount__images">
                    <div class="discount__img1">
                        <img src="./images/food-8.png" alt="">
                    </div>
                    <div class="discount__img2">
                        <img src="./images/food-9.png" alt="">
                    </div>
                    <div class="discount__img3">
                        <img src="./images/food-10.png" alt="">
                    </div>
                </div>
                <div class="discount__info">
                    <h3 class="discount__text">
                        20% OFF
                    </h3>
                    <h3 class="discount__title">Giảm giá các món ăn 4-5✰ mới</h3>
                    <h3 class="discount__price">
                        <span class="discount__oldPrice">80.000₫</span>
                        <span class="discount__newPrice">64.000₫</span>
                        <p class="discount__or">|</p>
                        <span class="discount__oldPrice">56.000₫</span>
                        <span class="discount__newPrice">45.000₫</span>
                    </h3>
                    <div class="discount__stars">
                        
                        <img src="./images/5star.png" alt="">   
                    </div>
                    <a href="Restro/customer" class="btn primary-btn">Đặt Bàn</a>
                </div>
            </div>
        </div>
    </section>

    <!-- End Discount Section -->
    <!-- Events Media -->
    <section id="eventsMedia" data-aos="fade-up-right">
        <div class="container">
            <div class="eventsMedia__wrapper">
                <div class="eventsMedia__1">
                    <img src="./images/eventsMedia1.png" alt="Events">
                    <a href="https://www.youtube.com/watch?v=QXWAReyqf98" class="eventsMedia__1__playButton">
                    <img src="./images/playIcon.svg" alt="playButton">
                </a>
                </div>
                <div class="eventsMedia__2">
                    <img src="./images/eventsMedia3.png" alt="Events">
                </div>
            </div>
        </div>
    </section>

    <!-- End Events Media -->
    <!-- Events Info -->
    <section id="eventsInfo" data-aos="fade-up-left">
        <div class="container">
            <div class="eventsInfo__wrapper">
                <div class="eventsInfo__left">
                    <div class="eventsInfo__item">
                        <div class="eventsInfo__item__img">
                            <img src="./images/event-corporate.png" alt="events">
                        </div>
                        <div class="eventsInfo__item__info">
                            <h2 class="eventsInfo__item__title">
                                Sự Kiện Công Ty
                            </h2>
                            <p class="eventsInfo__item__text">
                                OG Denver là nơi hoàn hảo để tổ chức các sự kiện quan trọng, đặc biệt là các cuộc họp
                            mặt hợp tác hay hội nghị công ty diễn ra vào giờ hành chính.                            </p>
                        </div>
                    </div>
                    <div class="eventsInfo__item">
                        <div class="eventsInfo__item__img">
                            <img src="./images/event-weedings.png" alt="events">
                        </div>
                        <div class="eventsInfo__item__info">
                            <h2 class="eventsInfo__item__title">
                                Lễ Cưới
                            </h2>
                            <p class="eventsInfo__item__text">
                                Cần tìm nơi thích hợp để tổ chức lễ đính hôn? Đừng lo, đã có OG Denver
                            luôn sẵn sàng giúp bạn có một ngày trọng đại đáng nhớ.</p>
                        </div>
                    </div>
                </div>
                <div class="eventsInfo__right">
                    <h2 class="eventsInfo__title">
                        Đặt Sự Kiện
                    </h2>
                    <p class="eventsInfo__text">
                        Đặt chỗ cho các sự kiện tại OG Denver để có cơ hội trải nghiệm sự thú vị và độc nhất.
                    </p>
                    <a href="./contact.html" class="btn primary-btn">Liên hệ ngay!</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Events Info -->

    <!-- Why Us Section -->
    <section id="whyUs" >
        <div class="container">
            <div class="whyUs__wrapper">
                <div class="whyUs__left" data-aos="fade-right">
                    <h2 class="whyUs__title">
                        Tại Sao Chọn Chúng Tôi
                    </h2>
                    <p class="whyUs__text">
                        Chất lượng phục vụ, đồ ăn, không gian và giá cả luôn là ưu tiên hàng
                        đầu của khách hàng trong việc lựa chọn một nhà hàng phù hợp. Hiểu được điều đó,
                        OG Denver mang đến cho quý khách hàng trải nghiệm ẩm thực đầy tinh tế với những món 
                        ăn hảo hạng cùng một không gian rộng rãi, thoáng mát, đầy thơ mộng ngay giữa 
                        lòng Hà Nội.
                    </p>
                </div>
                <div class="whyUs__right" data-aos="fade-left">
                    <div class="whyUs__items__wrapper">
                        <div class="whyUs__item">
                            <div class="whyUs__item__icon">
                                <img src="./images/whyUs-icon1.svg" alt="quality food">
                            </div>
                            <div class="whyUs__item__text">Chất lượng món ăn</div>
                        </div>
                        <div class="whyUs__item">
                            <div class="whyUs__item__icon">
                                <img src="./images/whyUs-icon2.svg" alt="quality food">
                            </div>
                            <div class="whyUs__item__text">Hương vị cổ điển</div>
                        </div>
                        <div class="whyUs__item">
                            <div class="whyUs__item__icon">
                                <img src="./images/whyUs-icon3.svg" alt="quality food">
                            </div>
                            <div class="whyUs__item__text">Đầu bếp chuyên nghiệp</div>
                        </div>
                        <div class="whyUs__item">
                            <div class="whyUs__item__icon">
                                <img src="./images/whyUs-icon4.svg" alt="quality food">
                            </div>
                            <div class="whyUs__item__text">Dịch vụ tốt nhất</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- End Why us -->
<!-- Review Section -->
    <div class="review" data-aos="zoom-in">
        <div class="container">
            <div class="review__wrapper">
                <h2 class="review__title">Khách Hàng Nói Gì?</h2>
                <div class="review__items__wrapper">
                    <div class="review__item">
                        <div class="review__item__img">
                            <img src="./images/mck.png" alt="MCK">
                        </div>
                        <div class="review__item__info">
                            <h3 class="review__item__name">Rapper MCK</h3>
                            <div class="review__item__stars">
                                <img src="./images/4.5star.png" alt="Stars">
                            </div>
                            <p class="review__item__text">
                                OG Denver là quán ruột của mình suốt 3-4 năm nay. Nhớ hồi xưa 
                                bạn gái mình cũng rất thích nơi này nên đây thường là địa điểm
                                hẹn hò quen thuộc của bọn mình. Không khí của quán thì cứ phải gọi là 
                                "Chìm Sâu",xứng đáng 5 sao trên mọi tiêu chí, nhưng mình trừ 0.5 sao vì bạn gái
                                chia tay mình rồi.
                            </p>
                        </div>
                    </div>
                    <div class="review__item">
                        <div class="review__item__img">
                            <img src="./images/bomman.png" alt="Bomman">
                        </div>
                        <div class="review__item__info">
                            <h3 class="review__item__name">Streamer Bomman</h3>
                            <div class="review__item__stars">
                                <img src="./images/5star.png" alt="Stars">
                            </div>
                            <p class="review__item__text">
                                Nếu phải nói đến quán ăn ở Hà Nội nào để lại cho mình ấn tượng nhất 
                                thì chắc chắn phải là OG Denver. Từ không gian, cách phục vụ đến đồ ăn 
                                ở đây đều khiến mình cực kì hài lòng. Vợ mình đặc biệt thích món Salad Nga của quán,
                                rất độc lạ mà cực kì healthy.
                            </p>
                        </div>
                    </div>
                    <div class="review__item">
                        <div class="review__item__img">
                            <img src="./images/hat.png" alt="Hà Anh Tuấn">
                        </div>
                        <div class="review__item__info">
                            <h3 class="review__item__name">Ca Sĩ Hà Anh Tuấn</h3>
                            <div class="review__item__stars">
                                <img src="./images/5star.png" alt="Stars">
                            </div>
                            <p class="review__item__text">
                                Lần đầu đến đây sau lời giới thiệu của quản lý, Hà Anh Tuấn đã rất bất ngờ
                                với chất lượng món ăn ở đây. Phong cách nhẹ nhàng của quán cũng khiến mình cảm thấy
                                rất thư thái, dần dần quán đã trở thành địa chỉ mà Tuấn tìm tới mỗi khi thèm hương vị
                                những món ăn truyền thống.
                            </p>
                        </div>
                    </div>
                    <div class="review__item">
                        <div class="review__item__img">
                            <img src="./images/quynhkool.png" alt="Quỳnh Kool">
                        </div>
                        <div class="review__item__info">
                            <h3 class="review__item__name">Diễn Viên Quỳnh Kool</h3>
                            <div class="review__item__stars">
                                <img src="./images/4star.png" alt="Stars">
                            </div>
                            <p class="review__item__text">
                                Quỳnh ghé thăm quán lần đầu vào thứ Bảy vừa rồi và rất thích món Tofu Thập Cẩm ở đây.
                                Thái độ của nhân viên ở đây cũng vô cùng thân thiện và niềm nở. Chắc chắn Quỳnh sẽ còn ghé lại đây lần nữa 
                                cùng bạn bè của Quỳnh. Một góp ý nhỏ cho quán là nếu quán có thể mở rộng chỗ để xe ô tô thì tốt quá.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Review -->
<!-- Newsletter Section -->
    <section id="newsletter" data-aos="fade-up">
        <div class="container">
            <div class="newsletter__wrapper">
                <div class="newletter__info">
                    <h3 class="newsletter__title">
                        Nhận Thông Báo Mới
                    </h3>
                    <p class="newsletter__text">
                        Nhận thông báo về những tin tức và chương trình ưu đãi mới nhất dành cho khách hàng
                        tại OG Denver
                    </p>
                </div>
                <div class="newsletter__form">
                    <form action="">
                        <label for="email">
                            <input type="email" placeholder="Email của bạn">
                            <button type="submit">Nhận</button>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </section>

<!-- End Newsletter  -->



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
                                <a href="https://www.instagram.com/theogdenver/">
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
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a href="menu.html">Menu</a>
                        </li>
                        <li>
                            <a href="booking.html">Đặt bàn</a>
                        </li>
                        <li>
                            <a href="about.html">Về chúng tôi</a>
                        </li>
                        <li>
                            <a href="contact.html">Liên hệ</a>
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
                            <a href="contact.html">Liên hệ</a>
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
                            <a href="tel:+0862382314">SĐT: 086.238.2314</a>
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