<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hash-tags</title>
    <style>
        .box{
            position: fixed;
            top: 0;
        }
        .block-1{
            height: 900px;
            background: #7abaff;
        }
        .block-2{
            height: 900px;
            background: #86cfda;
        }
        .block-3{
             height: 900px;
             background: #7abaff;
         }
    </style>
</head>
<body>
<div class="box">
    <a href="#block-1">block-1</a>
    <a href="#block-2">block-2</a>
    <a href="#block-3">block-3</a>


</div>
<div id="block-1" class="block-1">a</div>
<div id="block-2" class="block-2">b</div>
<div id="block-3" class="block-3">b</div>


<script>
window.addEventListener("hashchange", function (e) {
    console.log(location.hash);
})
console.log(location.hash);
</script>

</body>
</html>