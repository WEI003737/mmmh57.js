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
<!--                <tr>-->
<!--                    <td></td>-->
<!--                    <td></td>-->
<!--                    <td></td>-->
<!--                    <td></td>-->
<!--                    <td></td>-->
<!--                </tr>-->
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

    const escapeTag = str =>{
        return str.split('&').join('&amp;').split('<').join('&lt;').split('>').join('&gt;')
    };

    const itemTpl = o =>{
        console.log('o:', o)
        return`
            <tr>
                <td>${escapeTag(o.sid)}</td>
                <td>${escapeTag(o.item_name)}</td>
                <td>${escapeTag(o.item_num)}</td>
                <td>${escapeTag(o.color)}</td>
                <td>${escapeTag(o.color_num)}</td>
            </tr>`;
    };

    const paginationTpl = (obj) =>{
        //{active:true, page:2}
      return`
        <li class="page-item ${obj.active ? 'active' : ''}">
            <a class="page-link" href="#${obj.page}">${obj.page}</a>
        </li>
      `;
    };

    function getDataByPage(page=1) {
        $.get('data_list_2_api.php', {page:page}, function(data){
            console.log(data)
            //頁碼 ---
            let pStr = '';
            for(let i=1; i<=data.totalPages; i++){
                pStr += paginationTpl({
                    active: page===i,
                    page: i
                })
            }
            pagination.html(pStr);

            //資料表格 ---
            let tStr = '';
            for(let i=0; i<data.rows.length; i++){
                let item = data.rows[i];
                // console.log(item)
                tStr += itemTpl(item)
            }
            tbody.html(tStr);
        }, 'json')

    };

    function whenHashChange(){
        let hashStr = location.hash.slice(1);
        let page = parseInt(hashStr);

        if(page){
            getDataByPage(page);
        }else {
            getDataByPage(1);
        }
    };

    window.addEventListener("hashchange", whenHashChange);
    whenHashChange();

</script>

<?php include __DIR__ . '/part/footer.php' ?>