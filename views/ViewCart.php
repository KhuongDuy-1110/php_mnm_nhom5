<?php
//    load file LayoutTrangChu.php
    $this->fileLayout = "LayoutTrangTrong.php";
?>
<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <form action="index.php?controller=cart&action=update" method="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                        <tr>
                            <th class="shoping__product">Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <?php foreach ($_SESSION["cart"] as $product): ?>
                        <tbody>
                        <tr>
                            <td class="shoping__cart__item">
                                <img src="assets/upload/products/<?php echo $product["photo"]; ?>" alt="<?php echo $product["name"]; ?>" style="max-width: 20%;">
                                <h5><?php echo $product["name"]; ?></h5>
                            </td>
                            <td class="shoping__cart__price">
                                $<?php echo number_format($product["price"]-($product["price"]*$product["discount"])/100);?>
                            </td>
                            <td class="shoping__cart__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" id="qty" min="1" class="input-control" value="<?php echo $product["number"]; ?>" name="product_<?php echo $product["id"]; ?>" required="Không thể để trống">
                                    </div>
                                </div>
                            </td>
                            <td class="shoping__cart__total">
                                $<?php echo number_format(($product["price"]-($product["price"]*$product["discount"])/100)*$product["number"]);?>
                            </td>
                            <td class="shoping__cart__item__close">
                                <a href="index.php?controller=cart&action=delete&id=<?php echo $product['id'];?>">
                                    <span class="icon_close"></span>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                        <?php endforeach;?>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if($this->cartNumber()>0): ?>
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading" style="margin-right: 10px;"></span>
                            <input type="submit" value="Update Cart" class="primary-btn cart-btn cart-btn-right" style="border: 0px; padding: 0px;"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$<?php echo number_format($this->cartTotal()); ?></span></li>
                            <li>Total <span>$<?php echo number_format($this->cartTotal()); ?></span></li>
                        </ul>
                        <a href="index.php?controller=cart&action=checkout" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
    </form>
</section>
<!-- Shoping Cart Section End -->
