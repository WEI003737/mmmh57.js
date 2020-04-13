<?php
require __DIR__ . '/__connect_db.php';
$page_name = 'data-list2';
?>

<?php include __DIR__ . '/part/header.php' ?>
<?php include __DIR__ . '/part/nav.php' ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <!-- <li class="page-item">
                            <a class="page-link" href="?page=">
                                <i class="far fa-arrow-alt-circle-left"></i>
                            </a>
                        </li>

                        <li class="page-item">
                                <a class="page-link" href="?page=</a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="?page=">
                                <i class="far fa-arrow-alt-circle-right"></i>
                            </a>
                        </li> -->
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
            <!--
                <tr>
                    <td><?= strip_tags($row['sid']); ?></td>
                    <td><?= strip_tags($row['item_name']); ?></td>
                    <td><?= strip_tags($row['item_num']); ?></td>
                    <td><?= strip_tags($row['color']); ?></td>
                    <td><?= strip_tags($row['color_num']); ?></td>
                </tr> -->
            </tbody>
        </table>
    </div>
    </div>
<?php include __DIR__ . '/part/scripts.php' ?>

<?php include __DIR__ . '/part/footer.php' ?>