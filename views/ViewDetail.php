<?php
//    load file LayoutTrangChu.php
$this->fileLayout = "LayoutTrangTrong.php";
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="assets/frontend/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Your satisfaction is our target</h2>
                    <div class="breadcrumb__option">
                        <a href="trang-chu">Home</a>
                        <a href="#">Products</a>
                        <span><?php echo $record->name ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                             src="assets/upload/products/<?php echo $record->photo;?>" alt="">
                    </div>
                    <?php foreach ($data as $rows): ?>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="assets/upload/products/<?php echo $rows->photo;?>"
                                 src="assets/upload/products/<?php echo $rows->photo;?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?php echo $record->name;?></h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price"><?php echo ($record->price - ($record->price*$record->discount/100)); ?> $</div>
                    <!--                    <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam-->
                    <!--                        vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet-->
                    <!--                        quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p>-->
                    <div style="border:1px solid #dddddd; margin-top: 15px; margin-bottom: 25px;">
                        <h4 style="padding-left: 10px;">Rating</h4>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/img/star.jpg"></td>
                                <td><span class="label label-primary"><?php echo $this->modelGetStar($record->id,1); ?> vote</span></td>
                            </tr>
                            <tr>
                                <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/img/star.jpg"> <img src="assets/frontend/img/star.jpg"></td>
                                <td><span class="label label-warning"><?php echo $this->modelGetStar($record->id,2); ?> vote</span></td>
                            </tr>
                            <tr>
                                <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/img/star.jpg"> <img src="assets/frontend/img/star.jpg"> <img src="assets/frontend/img/star.jpg"></td>
                                <td><span class="label label-danger"><?php echo $this->modelGetStar($record->id,3); ?> vote</span></td>
                            </tr>
                            <tr>
                                <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/img/star.jpg"> <img src="assets/frontend/img/star.jpg"> <img src="assets/frontend/img/star.jpg"> <img src="assets/frontend/img/star.jpg"></td>
                                <td><span class="label label-info"><?php echo $this->modelGetStar($record->id,4); ?> vote</span></td>
                            </tr>
                            <tr>
                                <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/img/star.jpg"> <img src="assets/frontend/img/star.jpg"> <img src="assets/frontend/img/star.jpg"> <img src="assets/frontend/img/star.jpg"> <img src="assets/frontend/img/star.jpg"></td>
                                <td><span class="label label-success"><?php echo $this->modelGetStar($record->id,5); ?> vote</span></td>
                            </tr>
                        </table>
                        <br>
                    </div>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                    </div>
                    <a href="index.php?controller=cart&action=create&id=<?php echo $record->id;?>" class="primary-btn">ADD TO CARD</a>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Availability</b> <span>In Stock</span></li>
                        <li><b>Shipping</b> <span>01 day shipping.</span></li>
                        <li><b>Weight</b> <span>0.5 kg</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                               aria-selected="true">Related</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p><?php echo $record->description; ?></p>
                                <p><?php echo $record->content; ?>></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>