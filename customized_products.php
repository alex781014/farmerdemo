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
                    <button type="button" onclick="showimg(event)" class="btn btn-success mb-3" data-img="./customized_products_img/<?= $r['product_img'] ?>">
                        <?= $r['product_name'] ?>
                    </button>
                <?php endforeach; ?>

            </div>
            <div class="col-9 ">
                <div class="foodArea d-flex">

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
    let str = "";
    let products = []

    function showimg(event) {
        const btn = event.currentTarget;
        const name = btn.innerText;
        const img = btn.getAttribute("data-img");
        if (products.length + 1 > 5) {
            alert("食材只能選五樣唷~")
            // window.location.href = "customized_products.php"
            return
        }

        str = `<div class="card">
                    <img src="${img}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <p class="card-text">${btn.innerText.trim()}</p>
                        <a href="#" class="btn btn-danger" onclick="delete_it(event)" data-pName=${name}>刪除</a>
                </div>`
        foodArea.innerHTML += str
        products.push(name);
        console.log(products)
    }

    // btn.addEventListener("click", e => {
    //     str = `<div class="card">
    //                 <img src="./customized_products_img/<?= $r['product_img'] ?>" class="card-img-top" alt="...">
    //                 <div class="card-body text-center">
    //                     <p class="card-text"><?= $r['product_name'] ?></p>
    //                     <a href="#" class="btn btn-danger" onclick="delete_it(event)">刪除</a>
    //             </div>`
    //     foodArea.innerHTML += str
    //     limit.push(str);
    //     console.log(limit)
    //     if (limit.length > 5) {
    //         console.log("123")
    //         alert("食材只能選五樣唷~")
    //         window.location.href = "customized_products.php"
    //     }
    // })

    function delete_it(event) {
        const currentProduct = event.target.getAttribute('data-pName')
        products = products.filter(product => product !== currentProduct)
        const de = event.target.closest(".card");
        de.remove();
    }

    async function sendData(event) {
        event.preventDefault();
        const form1 = document.getElementById('form1')
        const fd = new FormData(form1);
        fd.append('products', JSON.stringify(products))

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