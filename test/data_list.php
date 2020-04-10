<?php
require __DIR__ . '/__connect_db.php';
$page_name = 'data-list';

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
                        <li class="page-item <?= $page==1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page - 1 ?>">
                                <i class="far fa-arrow-alt-circle-left"></i>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i===$page ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                        <?php endfor; ?>
                        <li class="page-item <?= $page==$totalPages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page + 1 ?>">
                                <i class="far fa-arrow-alt-circle-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col"><i class="fas fa-trash-alt"></i></th>
                <th scope="col">#</th>
                <th scope="col">item_name</th>
                <th scope="col">item_num</th>
                <th scope="col">color</th>
                <th scope="col">color_num</th>
                <th scope="col"><i class="fas fa-edit"></i></th>

            </tr>
            </thead>
            <tbody>
            <?php while ($row = $stmt->fetch()): ?>
                <tr>
                    <td>
                        <a href="data_delete.php?sid=<?= $row['sid'] ?>">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    <td><?= strip_tags($row['sid']); ?></td>
                    <td><?= strip_tags($row['item_name']); ?></td>
                    <td><?= strip_tags($row['item_num']); ?></td>
                    <td><?= strip_tags($row['color']); ?></td>
                    <td><?= strip_tags($row['color_num']); ?></td>
                    <td>
                        <a href="data_delete.php?sid=<?= $row['sid'] ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>

                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    </div>
    <?php include __DIR__ . '/part/footer.php' ?>