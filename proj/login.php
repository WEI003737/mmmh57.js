<?php
$page_name = 'login';

?>
<?php include __DIR__ . '/part/header.php' ?>
<?php include __DIR__ . '/part/nav.php' ?>
    <style>
        .form-group small.form-text{
            color: red;
        }
    </style>
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
    </div>
<?php include __DIR__ . '/part/scripts.php'; ?>
    <script>
        const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

        function checkForm(){
             $.post('login_api.php', $(document.form1).serialize(), function(data){
                    if(data.success){
                        $('#info-bar').show().text('登入成功');
                        setTimeout(function(){
                            location.href = 'index_.php';
                        }, 1000);
                    } else {
                        $('#info-bar').show().text('請輸入正確的帳號以及密碼');
                    }
                }, 'json');

            return false;
        }
    </script>
<?php include __DIR__ . '/part/footer.php' ?>