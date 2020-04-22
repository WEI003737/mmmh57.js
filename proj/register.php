<?php
$page_name = 'register';

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
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <small id="name_help" class="form-text"></small>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" required>
                        <small id="mobile_help" class="form-text"></small>
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

        const $email = $("#email"),
            $name = $("#name"),
            $mobile = $("#mobile"),
            $password = $("#password"),
            $email_help = $("#email_help"),
            $name_help = $("#name_help"),
            $mobile_help = $("#mobile_help"),
            $password_help = $("#password_help");

        function checkForm(){
            let isPass = true; //有沒有通過檢查
            //回復提示設定
            $("#info-bar").hide();
            $email.css('border-color', '#ccc');
            $email_help.text('');

            $name.css('border-color', '#ccc');
            $name_help.text('');

            $mobile.css('border-color', '#ccc');
            $mobile_help.text('');

            $password.css('border-color', '#ccc');
            $password_help.text('');


            if($name.val().length < 2){
                $name.css('border-color', 'red');
                $name_help.text('請填寫正確的姓名');
                isPass = false;
            }

            if($email.val().length == 0){
                $email.css('border-color', 'red');
                $email_help.text('請填寫email');

                if(! email_re.test($email.val())){
                    $email.css('border-color', 'red');
                    $email_help.text('請填寫正確的 Email 格式');
                    isPass = false;
                }
            }

            if(! mobile_re.test($mobile.val())){
                $mobile.css('border-color', 'red');
                $mobile_help.text('請填寫正確的手機號碼');
                isPass = false;
            }

            if($password.val().length < 8){
                $password.css('border-color', 'red');
                $password_help.text('密碼必須大於8個英數字');
                isPass = false;
            }


            if(isPass){
                $.post('register_api.php', $(document.form1).serialize(), function (data){
                    if(data.success){
                        $('#info-bar').show().text('新增成功');
                        console.log(data)
                        setTimeout(function(){
                            location.href = 'index_.php';
                        }, 1000);
                    } else {
                        $('#info-bar').show().text('註冊失敗');
                    }
                }, 'json');
            }

            return false;
        }

    </script>
<?php include __DIR__ . '/part/footer.php' ?>