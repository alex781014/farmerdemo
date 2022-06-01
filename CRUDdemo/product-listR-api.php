<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'product-listR';
$title = '客製化商品 - 有機の小鱻肉';

//  ↑↑連資料庫  MVC的 M跟C 寫在這裡 再html出現之前
$perPage = 10;
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
    $sql = sprintf("SELECT * FROM customized_products ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll(); //query後會拿到PDOStatement($stmt)... 然後用->fetchAll() 的方法  記得!!這樣是陣列
}

$output = [
    'perPage' => $perPage,
    'page' => $page,
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'rows' => $rows
];
echo json_encode($output, JSON_UNESCAPED_UNICODE);
