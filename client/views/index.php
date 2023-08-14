<section>
    <div class="menu-title">Fuji Luxurry Menu</div>
    <h2 id="top-product">Sản phẩm mới</h2>
    <div class="row">
        <?php foreach ($productsTop as $row) { ?>
            <div class="col-1-of-4 product">
                <img src="<?php echo $row['image'] ?>" alt="product">
                <div class="product-info">
                    <div class="title"><?php echo $row['name'] ?></div>
                    <div class="price"><?php echo number_format($row['price_s'], 0, ',', '.') . ' đ' ?></div>
                    <div class="add-to-cart" data-id="<?php echo $row['id'] ?>">
                        <i class="fa-solid fa-cart-plus"></i>
                        <span>Thêm</span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <h2 id="products">Sản phẩm</h2>
    <div class="row">
        <?php foreach ($products as $row) { ?>
            <div class="col-1-of-4 product">
                <img src="<?php echo $row['image'] ?>" alt="product">
                <div class="product-info">
                    <div class="title"><?php echo $row['name'] ?></div>
                    <div class="price"><?php echo number_format($row['price_s'], 0, ',', '.') . ' đ' ?></div>
                    <div class="add-to-cart" data-id="<?php echo $row['id'] ?>">
                        <i class="fa-solid fa-cart-plus"></i>
                        <span>Thêm</span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<div class="modal">
</div>