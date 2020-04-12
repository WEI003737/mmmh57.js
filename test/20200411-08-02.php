<?php

require __DIR__ . '/20200411-08-01.php';

$output = [
    'success' => false,
    'error' => 'Please enter a vaild minimum price',
    'code' => 0,
    'postData' => $_POST
];

if(isset($_POST['min_price'])){

    $min_price = filter_input(INPUT_POST, 'min_price', FILTER_VALIDATE_INT);

    if($min_price == 0){
        echo $output['error'];
        exit;
    }

    $sql = 'SELECT * FROM dishes WHERE price >=? ORDER BY price ';
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute(array($min_price));

}


?>

<?php require __DIR__ . '/part/header.php' ?>
<?php require __DIR__ . '/part/scripts.php'; ?>
<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="min_price">Enter Min-Price:</label>
            <input type="min_price" class="form-control" id="min_price" name="min_price" required>
            <small id="min_price_help" class="form-text text-muted"></small>
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
        <?php if(isset($_POST['min_price'])): ?>
        <?php while($dishes = $stmt -> fetch()): ?>
        <tr>
            <th scope="row"><?= $dishes['sid'] ?></th>
            <td><?= $dishes['dish_name'] ?></td>
            <td><?= $dishes['price'] ?></td>
            <td><?= $dishes['is_spicy'] ?></td>
        </tr>
        <?php endwhile; ?>
    <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/part/footer.php'; ?>