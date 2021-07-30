<nav class="humberger__menu__nav mobile-menu">
    <ul>
        <li class="active"><a href="trang-chu">Home</a></li>
        <li><a href="san-pham">Products</a>
            <ul class="header__menu__dropdown">
                <?php $categories = $this->modelListCategories(); ?>
                <?php foreach ($categories as $rows): ?>
                    <li>
                        <a href="san-pham/danh-muc/<?php echo Unicode::removeUnicode($rows->name); ?>/<?php echo $rows->id; ?>.html"><?php echo $rows->name; ?></a>
                    </li>
                    <?php $categoriesSub = $this->modelListCategoriesSub($rows->id); ?>
                    <?php foreach ($categoriesSub as $rowsSub): ?>
                        <li style="padding-left: 20px;"><a
                                    href="san-pham/danh-muc/<?php echo Unicode::removeUnicode($rowsSub->name); ?>/<?php echo $rowsSub->id; ?>.html"><?php echo $rowsSub->name; ?></a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </ul>
        </li>
        <li><a href="gio-hang">Cart</a></li>
        <li><a href="lien-he">Contact</a></li>
    </ul>
</nav>