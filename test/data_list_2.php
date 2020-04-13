<?php
require __DIR__ . '/__connect_db.php';
$page_name = 'data-list2';
?>

<?php include __DIR__ . '/part/header.php' ?>
<?php include __DIR__ . '/part/nav.php' ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <!-- <li class="page-item">
                            <a class="page-link" href="?page=">
                                <i class="far fa-arrow-alt-circle-left"></i>
                            </a>
                        </li>

                        <li class="page-item">
                                <a class="page-link" href="?page=</a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="?page=">
                                <i class="far fa-arrow-alt-circle-right"></i>
                            </a>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </div>

    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">item_name</th>
                <th scope="col">item_num</th>
                <th scope="col">color</th>
                <th scope="col">color_num</th>
            </tr>
            </thead>
            <tbody class="data-tbody">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
<?php include __DIR__ . '/part/scripts.php' ?>
<script>
    /*
    運作的流程 steps
    1.取得資料 (包成function)
    2.生頁碼列的按鈕
    3.生資料表格
    */

    const pagination = $(".pagination"),
        tbody = $(".data-tbody");

    function getDataByPage(page=1) {
        $.get('data_list_2_api.php', {page:page}, function(data){
            console.log(data)
        }, 'json')

    };

    getDataByPage();


</script>

<?php include __DIR__ . '/part/footer.php' ?>