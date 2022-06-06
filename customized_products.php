<?php require __DIR__ . '/parts/connect_db.php';

$pageName = 'customized_products';
$title = '客製化商品 - 有機の小鱻肉';

$rows = [];
$sql = sprintf("SELECT * FROM `product` WHERE `product_id`");
$rows = $pdo->query($sql)->fetchAll();
?>

<?php include __DIR__ . '/parts/html_head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<style>
    .card {
        width: 400px;
    }

    .card-img-top {
        width: 100%;
        height: 13vw;
        object-fit: contain;
    }

    .priceArea {
        cursor: default;
    }
</style>
<form id="form1" name="form1" class="d-flex flex-wrap needs-validation" onsubmit="sendData(event)" enctype="multipart/form-data">
    <div class=" container mt-3">
        <div class="row">
            <div class="col-2">
                <?php foreach ($rows as  $r) : ?>
                    <button type="button" onclick="showcard(event)" class="btn btn-success mb-3" data-img="./images/<?= $r['product_img'] ?>" data-price="<?= $r['product_price'] ?>">
                        <?= $r['product_name'] ?>
                    </button>
                <?php endforeach; ?>
            </div>
            <div class="col-8 h-100 ">
                <div class="foodArea d-flex">

                </div>

            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="">請為您的客製化便當命名</label>
                    <input type="text" class="form-control" name="lunchname" id="" placeholder="請輸入便當名稱">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">需要幾份</label>
                    <select onchange="getcount()" class="form-control lunchbox_stock" id="exampleFormControlSelect1" name="lunchbox_stock" required>
                        <option value="" selected disabled>-- 請選擇 --</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">備註欄</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="custom_remark"></textarea>
                </div>
                <div class="priceArea btn btn-success my-3">
                    <p class="mb-0">總價:</p>
                </div>
                <button type="submit" class="btn btn-primary" style="display:block">送出</button>
            </div>

</form>
</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    const btn = document.querySelector(".btn");
    const foodArea = document.querySelector(".foodArea");
    const card = document.querySelector(".card");
    const priceArea = document.querySelector(".priceArea");
    let str = "";
    let products = [];
    let totalPrice = [];
    let price;
    let final;
    let finalPrice;
    const lunchboxStock = document.querySelector(".lunchbox_stock");

    function showcard(event) {
        const btn = event.currentTarget;
        const name = btn.innerText;
        const img = btn.getAttribute("data-img");
        price = parseInt(btn.getAttribute("data-price"));
        if (products.length + 1 > 5) {
            alert("食材只能選五樣唷~")
            return
        }

        str = `<div class="card d-flex h-100 flex-column">
                    <img src="${img}" class="card-img-top flex-grow-1" alt="...">
                    <div class="card-body text-center ">
                        <p class="card-text ">${btn.innerText.trim()}</p>
                        <p class="card-text" >價格:${price}</p>
                        <a href="#" class="btn btn-danger " onclick="delete_it(event)" data-pName=${name} data-price=${price}>刪除</a>
                    </div>
                </div>`
        foodArea.innerHTML += str;
        products.push(name);

        totalPrice.push(price);
        let sum = 0;
        for (let i = 0; i < totalPrice.length; i++) {
            sum += totalPrice[i]
        }
        final = sum
        priceArea.innerHTML = `<p class="mb-0" >總價:${final}元</p>`
    }

    function delete_it(e) {
        const currentProduct = e.target.getAttribute('data-pName');
        const delprice = parseInt(e.target.getAttribute('data-price'))
        products = products.filter(product => product !== currentProduct);
        totalPrice = totalPrice.filter(i => i !== delprice)

        const de = event.target.closest(".card");
        de.remove();
        final = final - delprice;

        priceArea.innerHTML = `<p class="mb-0" >總價:${final}元</p>`
        lunchboxStock.value = lunchboxStock.options[0].value;

    }

    function getcount() {
        d = lunchboxStock.value;
        finalPrice = final * d;
        if (str == "") {
            return;
        } else {
            priceArea.innerHTML = `<p class="mb-0" >總價:${final * d}元</p>`

        }
    }



    async function sendData(event) {
        confirm("訂單即將送出，請確認訂單食材，如確認無誤請按'確定'送出訂單")
        const form1 = document.getElementById('form1')
        const fd = new FormData(form1);
        fd.append('products', JSON.stringify(products));
        fd.append('finalPrice', JSON.stringify(finalPrice));

        try {
            const response = await fetch('customized_products-creat-api.php', {
                method: 'POST',
                body: fd,
            })
            const result = await response.json();
        } catch (err) {
            console.log(err)
        }
    }
</script>
<?php include __DIR__ . '/parts/html_foot.php' ?>