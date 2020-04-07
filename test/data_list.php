<?php

require __DIR__ . '/__connect_db.php';

$stmt = $pdo->query("SELECT * FROM product_top");

?>
<?php include __DIR__ . '/part/header.php' ?>
<?php include __DIR__ . '/part/nav.php' ?>
    <table class="table table-striped">
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

<?php include __DIR__ . '/part/footer.php' ?>