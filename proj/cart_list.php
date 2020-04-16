<?php
require __DIR__.'/__connect_db.php';

$pKeys = array_keys($_SESSION['cart']);

$rows = []; // 預設值
$data_ar = []; // dict

if(!empty($pKeys)){
    $sql = sprintf("SELECT *FROM products WHERE sid IN(%s)",implode(',',$pKeys));
    $rows = $pdo->query($sql)->fetchAll();

    foreach($rows as $r){
        $r['quantity'] = $_SESSION['cart'][$r['sid']];
        $data_ar[$r['sid']] = $r;

    }
};
?>
<?php include __DIR__ . '/part/header.php' ?>
<?php include __DIR__ . '/part/nav.php' ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col"><i class="fas fa-trash-alt"></i></th>
                        <th scope="col">封面</th>
                        <th scope="col">商品</th>
                        <th scope="col">價錢</th>
                        <th scope="col">數量</th>
                        <th scope="col">小計</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($_SESSION['cart'] as $sid => $qty):
                        $item = $data_ar[$sid];
                        ?>
                    <tr class="p-item" data-sid="<?= $sid ?>">
                        <td><a href="#" onclick="removeProductItem(event)"><i class="fas fa-trash-alt"></i></a></td>
                        <td><img src="imgs/small/<?= $item['book_id'] ?>.jpg" alt=""></td>
                        <td><?= $item['bookname'] ?></td>
                        <td class="price" data-price="<?= $item['price'] ?>"></td>
                        <td>
                            <select class="form-control quantity" data-qty="<?= $item['quantity'] ?>" onchange="changeQty(event)">
                                <?php for($i=1; $i<=20; $i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </td>
                        <td class="sub-total"></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>


                <div class="alert alert-info" role="alert">
                      總計: <span id="totalAmount"></span>
                </div>
                <?php if(isset($_SESSION['loginUser'])): ?>
                    <a href="save-orders.php" class="btn btn-success">結帳</a>
                <?php else: ?>
                    <div class="alert alert-danger" role="alert">
                        請先登入會員再結帳
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/part/scripts.php'; ?>
    <script>

        const dallorCommas = function(n){
            return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        };

        function removeProductItem(event){
            event.preventDefault(); //避免 <a> 的連結
            const tr = $(event.target).closest('tr.p-item');
            const sid =tr.attr('data-sid');

            $.get('add_to_cart_api.php', {sid}, function(data){
                tr.remove();
                countCartObj(data);
                calPrices()
            }, 'json');
        };

        function changeQty(event){
            let qty = $(event.target).val();
            let tr = $(event.target).closest('tr');
            let sid = tr.attr('data-sid');

            $.get('add_to_cart_api.php', {sid, qty}, function(data){
                countCartObj(data);
                calPrices()
            }, 'json');

        }

        function calPrices(){
            const p_items = $('.p-item');
            let total = 0;
            if(! p_items.length){
                location.href = 'product_list.php';
                return;
            }

            p_items.each(function(i,el){
                console.log($(this).attr('data-sid'));

                const $price = $(el).find('.price');
                $price.text('$ ' + $price.attr('data-price'));

                const $qty = $(el).find('.quantity');
                if($qty.attr('data-qty')){
                    $qty.val($qty.attr('data-qty'));
                }
                $qty.removeAttr('data-qty');

                const $sub_total = $(el).find('.sub-total');

                $sub_total.text('$ ' + $price.attr('data-price') * $qty.val());
                total += $price.attr('data-price') * $qty.val();
            })

            $('#totalAmount').text( '$ ' + total);
        };

        calPrices();

    </script>
<?php include __DIR__ . '/part/footer.php' ?>