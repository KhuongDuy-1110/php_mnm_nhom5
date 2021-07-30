<?php
//    load file LayoutTrangChu.php
$this->fileLayout = "LayoutTrangTrong.php";
?>
<div class="col-lg-12 col-md-12">
    <div class="product__discount">
        <div class="section-title product__discount__title">
            <h2>Sale Off</h2>
        </div>
        <div class="row">
            <div class="product__discount__slider owl-carousel">
                <?php foreach ($data as $rows): ?>
                    <div class="col-lg-4">
                        <div class="product__discount__item">
                            <div class="product__discount__item__pic set-bg"
                                 data-setbg="assets/upload/products/<?php echo $rows->photo; ?>"
                                 title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>">
                                <div class="product__discount__percent">-<?php echo $rows->discount; ?>%</div>
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__discount__item__text" style="margin-bottom: 30px;">
                                <span>Dried Fruit</span>
                                <h5>
                                    <a href="san-pham/chi-tiet/<?php echo $rows->id; ?>.html"><?php echo $rows->name; ?></a>
                                </h5>
                                <div class="product__item__price">
                                    $<?php echo number_format($rows->price - ($rows->price * $rows->discount / 100)); ?>
                                    <span>$<?php echo number_format($rows->price); ?></span></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div style="height: 50px;"></div>
        <div class="filter__item">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="filter__sort">
                        <span>Sort By</span>
                        <select onchange="location.href = 'index.php?controller=products&action=category&id=<?php echo $category_id; ?>&order='+this.value;">
                            <option value="0">Default</option>
                            <option value="priceAsc">Giá tăng dần</option>
                            <option value="priceDesc">Giá giảm dần</option>
                            <option value="nameAsc">Sắp xếp A-Z</option>
                            <option value="nameDesc">Sắp xếp Z-A</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="filter__found">
                        <h6><span>[x]</span> Products found</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3">
                    <div class="filter__option">
                        <span class="icon_grid-2x2"></span>
                        <span class="icon_ul"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach ($data as $rows): ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="assets/upload/products/<?php echo $rows->photo; ?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="san-pham/chi-tiet/<?php echo $rows->id; ?>.html"><?php echo $rows->name; ?></a></h6>
                            <h5>$<?php echo number_format($rows->price - ($rows->price * $rows->discount / 100)); ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>

        <div class="product__pagination">
            <?php for ($i = 1; $i <= $numPage; $i++): ?>
                <a href="index.php?controller=products&action=category&id=<?php echo $category_id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>
            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
        </div>
    </div>
</div>