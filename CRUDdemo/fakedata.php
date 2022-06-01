<?php require __DIR__ . '/parts/connect_db.php';
exit; //功能關閉
echo microtime(true) . "<br>";
$ingredients = ['飯', '烏龍麵', '冬粉', '米粉', '王子麵', '無', '高麗菜', '空心菜', 'A菜', '茄子', '洋蔥', '菜瓜', '番茄炒蛋', '炒雞肉', '炒豬肉', '炒牛肉', '宮保雞丁', '炸排骨', '炸腿排', '牛小排'];

$sql = "INSERT INTO `customized_products`(
    `product_id_1`, `product_name_1`, `product_price_1`,`reference_receipt_id`, `food_img`, `food_introduce`, `food_list`, `food_Origin`, `category_sid`, `product_stock`, `total_product_price`, `calorie`, `custom_remark`
    ) VALUES (
    ?,?,?,?,?,?,?,?,?,?,
    ?,?,?
)";


// INSERT INTO 是新增語法
// $sql = "INSERT INTO `address_book`(  
//      `name`, `email`, `mobile`, `birthday`, `address`, `created_at`)
//  VALUES (
//      ?,?,?,
//      ?,?,NOW()
//      )";

$stmt = $pdo->prepare($sql);
for ($i = 0; $i < 100; $i++) {
    shuffle($ingredients);
    $stmt->execute([            //執行
        $i + 1,
        $ingredients[0],
        "15",
        "111",
        "image",
        "美味營養",
        "炒高麗菜，茄子",
        "阿里山",
        "1111",
        "999",
        "350",
        "300",
        "要加辣"
    ]);
};

echo microtime(true) . "<br>";
