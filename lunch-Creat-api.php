<?php
require __DIR__ . '/parts/connect_db.php';
header('Content-Type: application/json');
$output = [
    'success' => false,
    'postDate' => $_POST,
    'code' => 0,
    'error' => '',
];
// 後端檢查是否空值
if (empty($_POST['lunch_name'])) {
    $output['error'] = '沒有資料';
    $output['code'] = 403;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

// if (empty($_POST['product_name_1'])) {
//     $output['error'] = '沒有資料';
//     $output['code'] = 403;
//     echo json_encode($output, JSON_UNESCAPED_UNICODE);
//     exit;
// }

$lunch_1 = $_POST["lunch_1"] ?? '';
$lunch_2 = $_POST["lunch_2"] ?? '';
$lunch_3 = $_POST["lunch_3"] ?? '';
$lunch_4 = $_POST["lunch_4"] ?? '';
$lunch_5 = $_POST["lunch_5"] ?? '';
$lunch_name = $_POST["lunch_name"] ?? '';
$total_price = $_POST["total_price"] ?? '';


$sql = "INSERT INTO `customized_lunch`(
     `lunch_1`, `lunch_2`, `lunch_3`, `lunch_4`, `lunch_5`, `lunch_name`, `total_price`
    ) VALUES (
        ?,?,?,?,?,?,?,?
    )";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $lunch_1,
    $lunch_2,
    $lunch_3,
    $lunch_4,
    $lunch_4,
    $lunch_5,
    $lunch_name,
    $total_price,
]);

if ($stmt->rowCount() == 1) {
    $output['success'] = true;
    $output['lastInsertId'] = $pdo->lastInsertId();
} else {
    $output['error'] = '資料無法新增';
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
