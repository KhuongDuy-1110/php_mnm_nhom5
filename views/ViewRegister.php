<?php
$this->fileLayout = "LayoutTrangTrong.php";
?>
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Register an account</h4>
            <?php if (isset($_GET["notify"]) && $_GET["notify"] == "error"):?>
                <p style="color: red;">Đăng ký chưa thành công, bạn hãy kiểm tra lại thông tin !</p>
            <?php elseif (isset($_GET["notify"]) && $_GET["notify"] == "confirm"):?>
                <p style="color: red;">Check your email to active your account !</p>
            <?php else: ?><p> Register now !</p><?php
            endif;
            ?>
        </div>
    </div>
    <form method="post" action="index.php?controller=account&action=registerPost">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="checkout__input">
                            <p>Name<span>*</span></p>
                            <input type="name" name="name" required="">
                        </div>
                    </div>
                </div>
                <div class="checkout__input">
                    <p>Email<span>*</span></p>
                    <input type="email" name="email" required="">
                </div>
                <div class="checkout__input">
                    <p>Address<span>*</span></p>
                    <input type="address" name="address" required="">
                </div>
                <div class="checkout__input">
                    <p>Phone<span>*</span></p>
                    <input type="phone" name="phone" required="">
                </div>
                <div class="checkout__input">
                    <p>Password<span>*</span></p>
                    <input type="password" name="password" required="">
                </div>
                <div class="checkout__input">
                    <button type="submit" class="site-btn">Register</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="dang-nhap" class="site-btn">Login</a>
                </div>
            </div>
        </div>
    </form>
    </div>
    </div>
</section>