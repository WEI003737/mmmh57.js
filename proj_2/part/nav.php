<?php
if(! isset($page_name)){
    $page_name = '';
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= $page_name=='product_list' ? 'active' : '' ?>">
                    <a class="nav-link" href="product_list.php">資料列表</a>
                </li>
                <li class="nav-item <?= $page_name=='cart_list.php' ? 'active' : '' ?>">
                    <a class="nav-link" href="cart_list.php">購物車
                        <span class="badge badge-pill badge-info cart-count">0</span></a>
                    </a>
                </li>

            </ul>
            <ul class="navbar-nav">
                <?php //print_r($_SESSION['loginUser'])  ?>
                <?php if(isset($_SESSION['loginUser'])): ?>
                    <li class="nav-item">
                        <a class="nav-link"><?= $_SESSION['loginUser']['nickname'] ?></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="">修改會員資料</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="login.php">登出</a>
                    </li>
                <?php else:  ?>
                    <li class="nav-item <?= $page_name=='login' ? 'active' : '' ?>">
                        <a class="nav-link" href="login.php">登入</a>
                    </li>
                    <li class="nav-item <?= $page_name=='register' ? 'active' : '' ?>">
                        <a class="nav-link" href="register.php">註冊</a>
                    </li>
                <?php endif;  ?>
            </ul>
        </div>
    </div>
</nav>
<style>

</style>
