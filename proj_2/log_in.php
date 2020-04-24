<?php require __DIR__. '/part/header.php'; ?>
<?php require __DIR__. '/part/nav.php'; ?>
<div class="container">
    <div id="info-bar" class="alert alert-info" role="alert" style="display: none">
        123
    </div>
    <div class="row">
        <div class="col">
            <form name="form1" method="post" onsubmit="return checkForm()" novalidate>
                <div class="form-group">
                    <label for="email">Email</label>
                    <!-- 可以下pattern屬性驗證輸入的格式-->
                    <input type="text" class="form-control" id="email" name="email" required>
                    <small id="email_help" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <small id="password_help" class="form-text"></small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>


<?php require __DIR__. '/part/scripts.php'; ?>
<?php require __DIR__. '/part/footer.php'; ?>
