<?php
require __DIR__ . '/__connect_db.php';

$perPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//取得總筆數
$totalRows = $pdo->query("SELECT COUNT(1) FROM `product_top`")->fetch(PDO::FETCH_NUM)[0];

//算總頁數
$totalPages = ceil($totalRows / $perPage);

//print_r($totalRows);


//exit; 立刻結束程式
//die('aaaa'); 立刻結束程式

$sql = sprintf("SELECT * FROM `product_top` LIMIT %s,%s", ($page - 1) * $perPage, $perPage);

$stmt = $pdo->query($sql);

?>
<?php include __DIR__ . '/part/header.php' ?>
<?php include __DIR__ . '/part/nav.php' ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i===$page ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
        </div>

    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">item_name</th>
                <th scope="col">item_num</th>
                <th scope="col">color</th>
                <th scope="col">color_num</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $stmt->fetch()): ?>
                <tr>
                    <td><?= $row['sid'] ?></td>
                    <td><?= $row['item_name'] ?></td>
                    <td><?= $row['item_num'] ?></td>
                    <td><?= $row['color'] ?></td>
                    <td><?= $row['color_num'] ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    </div>
    <?php include __DIR__ . '/part/footer.php' ?>