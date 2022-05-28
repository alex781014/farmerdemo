<?php require __DIR__ . '/parts/connect_db.php';

$pageName = 'ab-add';
$title = '新增通訊錄 - 有機の小鱻肉';

?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<style>
    .form-control.red {
        border: 1px solid red;
    }

    .red {
        color: red;
    }
</style>
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
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="product_name_1" class="form-label">* 食材品名</label>
                            <input type="text" class="form-control" id="product_name_1" name="product_name_1" require>
                            <div class="form-text red"></div>
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

                        <!-- Button trigger modal -->
                        <button type="submit"  class=" btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            submit
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body red">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    const productid1 = document.form1.product_id_1;
    const prname1 = document.form1.product_name_1;
    const modal_body = document.querySelector(".modal-body")

    const fields = [productid1, prname1];
    const fieldsTexts = [];
    for (let f of fields) {
        fieldsTexts.push(f.nextElementSibling);
    }

    async function sendData() {
        // 欄位外觀回復原來狀態
        for (let i in fields) {
            fields[i].classList.remove("red");
            fieldsTexts[i].innerText = "";
        }

        let isPass = true;
        if (productid1.value.length < 3) {
            fields[0].classList.add("red");
            fieldsTexts[0].innerText = "編號至少3字元";
            modal_body.classList.add("red");
            modal_body.innerText = "資料無法新增，請檢查欄位";
            isPass = false;
        }
        if (prname1.value == "") {
            fields[1].classList.add("red");
            fieldsTexts[1].innerText = "品名不能為空";
            modal_body.classList.add("red");
            modal_body.innerText = "資料無法新增，請檢查欄位";
            isPass = false;
        }
        // if(email_f.value && !email_re.test(email_f,value)){}
        if (!isPass) {
            return;
        }

        const fd = new FormData(document.form1);
        const r = await fetch('ab-add-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result)
        if (result.success) {
            modal_body.classList.remove("red");
            modal_body.innerText = "資料新增成功"
            setTimeout(() => {
                productid1.value = "";
                prname1.value = "";
            }, 1500);

        }

    }
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>