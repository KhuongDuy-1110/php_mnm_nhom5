<?php
$this->fileLayout = "LayoutTrangTrong.php";
?>
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Login into account</h4>
            <?php if (isset($_GET["notify"]) && $_GET["notify"] == "error"):?>
                <p style="color: red;">Invalid email or password !</p>
            <?php elseif (isset($_GET["notify"]) && $_GET["notify"] == "non-active"):?>
                <p style="color: red;">Your account hasn't been activated !</p>
            <?php endif; ?>
            <form method="post" action="index.php?controller=account&action=loginPost">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" name="email" required="">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Password<span>*</span></p>
                            <input type="password" name="password" required="">
                        </div>
                        <div class="checkout__input">
                            <button type="submit" class="site-btn">Log in</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="dang-ky" class="site-btn">Register</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>