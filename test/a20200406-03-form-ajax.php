<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>a20200406-03-form-ajax</title>
</head>
<body>
<form action="" name="form1" onsubmit="return mySubmit()">
    <input type="hidden" name="massage" value="Hi">
    <input type="number" id="a" name="a"> + <input type="number" id="b" name="b"><button>=</button>
    <input type="text" id="c" disabled="disabled">
</form>

<script src="../jquery-3.4.1.js"></script>
<script>
    function mySubmit(){
        $.post('a20200406-04-form-ajax-api.php', $(document.form1).serialize(), function(data){
            console.log(data);
            $("#c").val(data.c);
        }, 'json');

        return false;
    };
    /*
    function mySubmit(){
        $.post('a20200406-04-form-ajax-api.php', {
            a: document.querySelector("#a").value,
            b: document.querySelector("#b").value,
        }, function(data){
            console.log(data);
            $("#c").val(data.c);
        }, 'json');

        return false;
    };
    */
</script>
</body>
</html>