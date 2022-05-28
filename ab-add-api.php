<?php
require __DIR__ . '/parts/connect_db.php';
header('Content-Type: application/json');
$output = [
    'success' => false,
    'postDate' => $_POST,
    'code' => 0,
    'error' => '',
];
// 後端檢查
if (empty($_POST['product_id_1'])) {
    $output['error'] = '沒有資料';
    $output['code'] = 403;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$productid1 = $_POST["product_id_1"];
$productname2 = $_POST["product_name_1"];
$productprice1 = $_POST["product_price_1"];
$referencereceiptid = $_POST["reference_receipt_id"];
$foodimg = $_POST["food_img"];
$foodintroduce = $_POST["food_introduce"];
$foodlist = $_POST["food_list"];
$foodOrigin = $_POST["food_Origin"];
$categorysid = $_POST["category_sid"];
$productstock = $_POST["product_stock"];
$totalproductprice = $_POST["total_product_price"];
$calorie = $_POST["calorie"];
$customremark = $_POST["custom_remark"];




$sql = "INSERT INTO customized_products(
     `product_id_1`, `product_name_1`, `product_price_1`, `reference_receipt_id`, `food_img`, `food_introduce`, `food_list`, `food_Origin`, `category_sid`, `product_stock`, 
     `total_product_price`, `calorie`, `custom_remark`
    ) VALUES (
        ?,?,?,?,?,
        ?,?,?,?,?,
        ?,?,?
    )";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $_POST["product_id_1"],
    $_POST["product_name_1"],
    $_POST["product_price_1"],
    $_POST["reference_receipt_id"],
    $_POST["food_img"],
    $_POST["food_introduce"],
    $_POST["food_list"],
    $_POST["food_Origin"],
    $_POST["category_sid"],
    $_POST["product_stock"],
    $_POST["total_product_price"],
    $_POST["calorie"],
    $_POST["custom_remark"]
]);

if ($stmt->rowCount() == 1) {
    $output['success'] = true;
    $output['lastInsertId'] = $pdo->lastInsertId();
} else {
    $output['error'] = '資料無法新增';
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
