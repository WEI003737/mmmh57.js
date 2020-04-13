<?php
require __DIR__ . '/20200411-08-01.php';

$output = [
    'success' => false,
    'error' => '請輸入關鍵字',
    'code' => 0,
    'postData' => $_POST
];

if(isset($_POST['search'])){

    $search = $_POST['search'];

    if($search == ''){
        echo $output['error'];
        exit;
    }else {

        $sql = 'SELECT * FROM dishes WHERE dish_name LIKE "%$search%"';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }

}


?>

<?php require __DIR__ . '/part/header.php' ?>
<?php require __DIR__ . '/part/scripts.php'; ?>
<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="search">Enter Key Word:</label>
            <input type="search" class="form-control" id="search" name="search" value="<?= $search ?>" required>
            <small id="search_help" class="form-text text-muted"></small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">dish-name</th>
            <th scope="col">price</th>
            <th scope="col">spicy</th>
        </tr>
        </thead>
        <tbody>

        <?php while($search = $stmt -> fetch()): ?>
        <tr>
            <th scope="row"><?= $search['sid'] ?></th>
            <td><?= $search['dish_name'] ?></td>
            <td><?= $search['price'] ?></td>
            <td><?= $search['is_spicy'] ?></td>
        </tr>
        <?php endwhile; ?>

        </tbody>
    </table>
</div>

<?php require __DIR__ . '/part/footer.php'; ?>
