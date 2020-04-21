<script src="../jquery-3.4.1.js"></script>
<script src="../bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>
<script src="../fontawesome-free-5.13.0-web/js/all.js"></script>
<script>

    $.get('add_to_cart_api.php', function(data){
        countCartObj(data)

    }, 'json');

    function countCartObj(data) {
        let total = 0;
        for (let i in data) {
            total += data[i];
        }
        $('.cart-count').text(total);
    }

</script>