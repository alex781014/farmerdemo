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

    input {
        width: 75px;
    }
</style>
<form id="form1" name="form1" class="d-flex flex-wrap" onsubmit="sendData(event)" enctype="multipart/form-data">
    <div class=" container mt-3">
        <div class="row">
            <div class="col-3 ">

                <?php foreach ($rows as  $r) : ?>
                    <button type="button" onclick="showimg(event)" class="btn btn-success mb-3" data-img="./customized_products_img/<?= $r['product_img'] ?>" data-price="<?= $r['product_price'] ?>">
                        <?= $r['product_name'] ?>
                    </button>
                <?php endforeach; ?>

            </div>
            <div class="col-9 ">
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
                    <select class="form-control" id="exampleFormControlSelect1" name="lunchbox_stock">
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
    const foodArea = document.querySelector(".foodArea")
    const card = document.querySelector(".card")
    const priceArea = document.querySelector(".priceArea")
    let str = "";
    let products = [];
    let totalPrice = [];
    let sum = 0;

    function showimg(event) {
        const btn = event.currentTarget;
        const name = btn.innerText;
        const img = btn.getAttribute("data-img");
        const price = parseInt(btn.getAttribute("data-price"));

        if (products.length + 1 > 5) {
            alert("食材只能選五樣唷~")
            // window.location.href = "customized_products.php"
            return
        }

        str = `<div class="card">
                    <img src="${img}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <p class="card-text">${btn.innerText.trim()}</p>
                        <p class="card-text">價格:${price}</p>
                        <a href="#" class="btn btn-danger" onclick="delete_it(event)" data-pName=${name}>刪除</a>
                    </div>
                </div>`
        foodArea.innerHTML += str;
        products.push(name);
        totalPrice.push(price);
        for (let t = 0; t < totalPrice.length; t++) {
            sum += totalPrice[t];
        }
        priceArea.innerHTML = `<p>總價為${sum}元</p>`;

    }

    function delete_it(e) {
        const currentProduct = e.target.getAttribute('data-pName');
        products = products.filter(product => product !== currentProduct);
        const de = event.target.closest(".card");
        de.remove();
    }

    async function sendData(event) {
        event.preventDefault();
        const form1 = document.getElementById('form1')
        const fd = new FormData(form1);
        fd.append('products', JSON.stringify(products));

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