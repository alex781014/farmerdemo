<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'ab-list';
$title = '客製化商品 - 有機の小鱻肉';

//  ↑↑連資料庫  MVC的 M跟C 寫在這裡 再html出現之前
$perPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; //頁碼

if ($page < 1) {
    header('Location: ?page=1');
    exit;
}

$t_sql = "SELECT COUNT(1)  FROM customized_products"; //這拿出來只有一筆 欄位名稱叫COUNT(1)
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; //用索引式陣列抓出總筆數 因為t_sql的COUNT(1)只會有一欄 那欄裡面就是總比數用索引式陣列[0]抓出

$totalPages = ceil($totalRows / $perPage); //ceil無條件進位  總共有幾頁


$rows = []; //相當於預設值，如果沒有進到下面if就是空陣列
if (!empty($totalPages)) {  //如果有資料才往下走
    if ($page > $totalPages) {   //如果最大頁數大於總頁數，轉向在?page=$totalPages 記得雙引號才能塞變數 
        header("Location: ?page=$totalPages");
        exit;
    }
    $sql = sprintf("SELECT * FROM customized_products LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll(); //query後會拿到PDOStatement($stmt)... 然後用->fetchAll() 的方法  記得!!這樣是陣列

}






?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<!-- ↑↑ html開始 -->


<?php include __DIR__ . '/parts/navbar.php' ?>

<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link " href="?page=1"><i class="fa-solid fa-angles-left"></i></a>
                    </li>
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link " href="?page=<?= $page - 1 ?>"><i class="fa-solid fa-angle-left"></i></a>
                    </li>
                    <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
                        if ($i >= 1 and $i <= $totalPages) :
                    ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link " href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                    <?php endif;
                    endfor; ?>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link " href="?page=<?= $page + 1 ?>"><i class="fa-solid fa-angle-right"></i></a>
                    </li>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link " href="?page=<?= $totalPages ?>"><i class="fa-solid fa-angles-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>







    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <!-- 看資料表內要呈現那些內容 -->
                <th scope="col">產品編號</th>
                <th scope="col">品名</th>
                <th scope="col">產品價格</th>
                <th scope="col">產品編號</th>
                <th scope="col">品名</th>
                <th scope="col">產品價格</th>
                <th scope="col">產品編號</th>
                <th scope="col">品名</th>
                <th scope="col">產品價格</th>
                <th scope="col">產品編號</th>
                <th scope="col">品名</th>
                <th scope="col">產品價格</th>
                <th scope="col">產品編號</th>
                <th scope="col">品名</th>
                <th scope="col">產品價格</th>
                <th scope="col">圖片</th>
                <th scope="col">介紹</th>
                <th scope="col">清單</th>
                <th scope="col">產地</th>
                <th scope="col">食譜編號</th>
                <th scope="col">分類編號</th>
                <th scope="col">庫存</th>
                <th scope="col">總價格</th>
                <th scope="col">卡路里</th>
                <th scope="col">備忘錄</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <!--這個$r代表拿到某一筆  -->
                <!-- 然後欄位對上面資料 -->
                <tr>
                    <!--echo出來 這個代表某一筆的PK  以此類推-->
                    <td><?= $r['product_id_1'] ?></td>
                    <td><?= $r['product_name_1'] ?></td>
                    <td><?= $r['product_price_1'] ?></td>
                    <td><?= $r['product_id_2'] ?></td>
                    <td><?= $r['product_name_2'] ?></td>
                    <td><?= $r['product_price_2'] ?></td>
                    <td><?= $r['product_id_3'] ?></td>
                    <td><?= $r['product_name_3'] ?></td>
                    <td><?= $r['product_price_3'] ?></td>
                    <td><?= $r['product_id_4'] ?></td>
                    <td><?= $r['product_name_4'] ?></td>
                    <td><?= $r['product_price_4'] ?></td>
                    <td><?= $r['product_id_5'] ?></td>
                    <td><?= $r['product_name_5'] ?></td>
                    <td><?= $r['product_price_5'] ?></td>
                    <td><?= $r['food_img'] ?></td>
                    <td><?= $r['food_introduce'] ?></td>
                    <td><?= $r['food_list'] ?></td>
                    <td><?= $r['food_Origin'] ?></td>
                    <td><?= $r['category_sid'] ?></td>
                    <td><?= $r['product_stock'] ?></td>
                    <td><?= $r['reference_receipt_id'] ?></td>
                    <td><?= $r['total_product_price'] ?></td>
                    <td><?= $r['calorie'] ?></td>
                    <td><?= $r['custom_remark'] ?></td>

                </tr>
            <?php endforeach; ?>

        </tbody>

    </table>
</div>









<?php include __DIR__ . '/parts/scripts.php' ?>
<?php include __DIR__ . '/parts/html-foot.php' ?>

<!-- 把原本html內容拆拼起來 因為可以直接在中間放標籤 -->