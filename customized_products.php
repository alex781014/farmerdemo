<?php require __DIR__ . '/parts/connect_db.php';

$pageName = 'customized_products';
$title = '客製化商品 - 有機の小鱻肉';

$rows = [];
$sql = sprintf("SELECT * FROM `product` WHERE 1");
$rows = $pdo->query($sql)->fetchAll();

?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<style>
    .card {
        width: 400px;
    }
</style>
<div class="container mt-3">
    <div class="row">
        <div class="col-3 ">
            <?php foreach ($rows as $r) : ?>
                <input type="submit" class="btn btn-success mb-3" value="<?= $r['product_name'] ?>">
            <?php endforeach; ?>
        </div>
        <div class="col-9 ">
            <div class="foodArea d-flex">
                <?php foreach ($rows as $r) : ?>

                    <div class="card d-none">
                        <img src="./customized_products_img/<?= $r['product_img'] ?>" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <p class="card-text">食材名稱</p>
                            <a href="javascript:delete_it(<?= $r['sid'] ?>)" class="btn btn-danger">刪除</a>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>

            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">請為您的客製化便當命名</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="請輸入便當名稱">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">需要幾份</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">備註欄</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>