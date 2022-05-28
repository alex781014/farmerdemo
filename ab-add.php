<?php require __DIR__ . '/parts/connect_db.php';

$pageName = 'ab-add';
$title = '新增通訊錄 - 有機の小鱻肉';

?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增食材</h5>
                    <!-- form 給name 方便拿參照 -->
                    <form name="form1" onsubmit="sendData(); return false;" novalidate>
                        <div class="mb-3">
                            <label for="product_id_1" class="form-label">* 食材編號</label>
                            <input type="text" class="form-control" id="product_id_1" name="product_id_1" require>
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="product_name_1" class="form-label">* 食材品名</label>
                            <input type="text" class="form-control" id="product_name_1" name="product_name_1">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="product_price_1" class="form-label">食材價格</label>
                            <input type="text" class="form-control" id="product_price_1" name="product_price_1">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="reference_receipt_id " class="form-label">菜譜參考編號</label>
                            <input type="text" class="form-control" id="reference_receipt_id" name="reference_receipt_id">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="food_img" class="form-label">食材圖片</label>
                            <input type="text" class="form-control" id="food_img" name="food_img">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="food_introduce" class="form-label">食材介紹</label>
                            <input type="text" class="form-control" id="food_introduce" name="food_introduce">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="food_list" class="form-label">食材清單</label>
                            <input type="text" class="form-control" id="food_list" name="food_list">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="food_Origin" class="form-label">產地</label>
                            <input type="text" class="form-control" id="food_Origin" name="food_Origin">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="category_sid" class="form-label">分類編號</label>
                            <input type="text" class="form-control" id="category_sid" name="category_sid">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="product_stock" class="form-label">庫存</label>
                            <input type="text" class="form-control" id="product_stock" name="product_stock">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="total_product_price" class="form-label">總價格</label>
                            <input type="text" class="form-control" id="total_product_price" name="total_product_price">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="calorie" class="form-label">卡路里</label>
                            <input type="text" class="form-control" id="calorie" name="calorie">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="custom_remark" class="form-label">備註欄</label>
                            <textarea name="custom_remark" id="custom_remark" name="custom_remark" cols="73" rows="5"></textarea>
                            <div class="form-text"></div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    async function sendData() {
        const fd = new FormData(document.form1);
        const r = await fetch('ab-add-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result)
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>