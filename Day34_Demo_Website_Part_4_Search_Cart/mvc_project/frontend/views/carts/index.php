<!--Timeline items start -->
<div class="timeline-items container">
    <h2>Giỏ hàng của bạn</h2>
    <form action="" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th width="40%">Tên sản phẩm</th>
                <th width="12%">Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
                <th></th>
            </tr>

            <?php
            // Khai báo tổng giá trị đơn hàng
            $total_cart = 0;
            foreach ($_SESSION['cart']
                     AS $product_id => $cart): ?>
                <tr>
                    <td>
                        <img class="product-avatar img-responsive"
                             src="../backend/assets/uploads/<?php echo $cart['avatar'] ?>"
                             width="80">
                        <div class="content-product">
                            <a href="chi-tiet-san-pham/samsung-s9/<?php echo $product_id?>"
                               class="content-product-a">
                              <?php echo $cart['name']; ?>
                            </a>
                        </div>
                    </td>
                    <td>
                        <!--  cần khéo léo đặt name cho input số lượng, để khi xử lý submit form update lại giỏ hànTin nổi bậtg sẽ đơn giản hơn    -->
                        <input type="number" min="0"
                               name="<?php echo $product_id; ?>"
                               class="product-amount form-control"
                               value="<?php echo $cart['quantity']; ?>">
                    </td>
                    <td>
                      <?php echo number_format($cart['price']) ?>
                    </td>
                    <td>
                      <?php
                      $total_item = $cart['price'] * $cart['quantity'];
                      // Cộng dồn để lấy ra tổng giá trị đơn hàng
                      $total_cart += $total_item;
                      echo number_format($total_item);
                      ?>
                    </td>
                    <td>
                        <a class="content-product-a"
                           href="xoa-san-pham/<?php echo $product_id; ?>.html">
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td colspan="5" style="text-align: right">
                    Tổng giá trị đơn hàng:
                    <span class="product-price">
             <?php echo number_format($total_cart); ?> vnđ
            </span>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="product-payment">
                    <input type="submit" name="submit" value="Cập nhật lại giá" class="btn btn-primary">
                    <a href="thanh-toan.html" class="btn btn-success">Đến trang thanh toán</a>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<!--Timeline items end -->