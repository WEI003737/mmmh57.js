<?php
$logInData = [['alice','1234'], ['john','111'], ];
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['account']) and isset($_POST['password'])) {
    if ($_POST['account'] == 'alice' and $_POST['password'] == '1234') {
        $_SESSION['loginUser'] = 'alice';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if (isset($_SESSION['loginUser'])): ?>
    <div>
        <?= $_SESSION['loginUser'] ?>, 您好!
    </div>
    <a href="a20200406-09-logout.php">登出</a>
<?php else: ?>
    <form action="" method="post">
        <input type="text" name="account" placeholder="account"><br>
        <input type="password" name="password" placeholder="password"><br>
        <input type="submit">
    </form>
<?php endif; ?>
</body>
</html>