<?php
require __DIR__ . '/parts/connect_db.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postDate' => $_POST,
    'code' => 0,
    'error' => '',
];
if (empty($_POST['product_name'])) {
    $output['error'] = '沒有資料';
    $output['code'] = 403;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};




$productname1 = $_POST["product_name"] ?? '';
$productname2 = $_POST["product_name"] ?? '';
$productname3 = $_POST["product_name"] ?? '';
$productname4 = $_POST["product_name"] ?? '';
$productname5 = $_POST["product_name"] ?? '';
$lunchname =   $_POST["lunchname"] ?? '';
$total_price =   $_POST["total_price"] ?? '';
$lunchbox_stock =   $_POST["lunchbox_stock"] ?? '';
$total_calorie =   $_POST["total_calorie"] ?? '';
$custom_remark =   $_POST["custom_remark"] ?? '';
$reference_receipt_id =   $_POST["reference_receipt_id"] ?? '';




$sql = "INSERT INTO `customized_lunch`(`lunch_1`, `lunch_2`, `lunch_3`, `lunch_4`, `lunch_5`, `lunch_name`, `total_price`, `lunchbox_stock`, `total_calorie`, `custom_remark`, `reference_receipt_id`) VALUES (
    ?,?,?,?,?,
    ?,?,?,?,?,
    ?
)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $productname1,
    $productname2,
    $productname3,
    $productname4,
    $productname5,
    $lunchname,
    $total_price,
    $lunchbox_stock,
    $total_calorie,
    $custom_remark,
    $reference_receipt_id,
]);






if ($stmt->rowCount() == 1) {
    $output['success'] = true;
    $output['lastInsertId'] = $pdo->lastInsertId();
} else {
    $output['error'] = '資料無法新增';
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
