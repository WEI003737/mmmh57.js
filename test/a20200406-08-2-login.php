<?php
if (!isset($_SESSION)) {
    session_start();
}

$users = [
    'alice' => [
        'nickname' => 'a',
        'password' => '1234'
    ],
    'bill' => [
        'nickname' => 'b',
        'password' => '234'
    ],
    'cathy' => [
        'nickname' => 'c',
        'password' => '345'
    ],
];

if(isset($_POST['account']) and isset($_POST['password'])) {

    if(! empty($users[$_POST['account']])
        and
        $users[$_POST['account']]['password'] === $_POST['password']){

        $_SESSION['loginUser'] = [
            'account' => $_POST['account'],
            'nickname' => $users[$_POST['account']]['nickname'],
        ];
    }
};
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
        <?= $_SESSION['loginUser']['nickname'] ?>, 您好!
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