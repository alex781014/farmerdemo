<?php require __DIR__ . '/parts/connect_db.php';

$pageName = 'customized_products';
$title = '客製化商品 - 有機の小鱻肉';

$rows = [];
$sql = sprintf("SELECT * FROM `product` WHERE `product_id`");
$rows = $pdo->query($sql)->fetchAll();
?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<style>
    .card {
        width: 400px;
    }

    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: contain;
    }
</style>
<form id="form1" name="form1" class="d-flex flex-wrap" onsubmit="sendData(event)" enctype="multipart/form-data">
    <div class=" container mt-3">
        <div class="row">
            <div class="col-3 ">

                <?php foreach ($rows as  $r) : ?>
                    <button type="button" onclick="showcard(event)" class="btn btn-success mb-3" data-img="./customized_products_img/<?= $r['product_img'] ?>" data-price="<?= $r['product_price'] ?>">
                        <?= $r['product_name'] ?>
                    </button>
                <?php endforeach; ?>

            </div>
            <div class="col-9 h-100 ">
                <div class="foodArea d-flex">

                </div>

                <div class="priceArea">
                </div>
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
                <button type="submit" class="btn btn-primary">送出</button>
            </div>
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
        priceArea.innerHTML = `<p>總價為${final}元</p>`
    }

    function delete_it(e) {
        const currentProduct = e.target.getAttribute('data-pName');
        const delprice = e.currentTarget.getAttribute('data-price')
        products = products.filter(product => product !== currentProduct);
        price = parseInt(delprice)
        const de = event.target.closest(".card");
        de.remove();
        totalPrice.pop();
        final = final - price;
        priceArea.innerHTML = `<p>總價為${final}元</p>`
    }

    function getcount() {
        d = lunchboxStock.value;
        finalPrice = final * d;
        priceArea.innerHTML = `<p>總價為${final * d}元</p>`
    }



    async function sendData(event) {
        event.preventDefault();
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
<?php include __DIR__ . '/parts/html-foot.php' ?>