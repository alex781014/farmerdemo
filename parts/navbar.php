    <style>
        .navbar .navbar-nav .nav-link.active {
            background-color: #00f;
            color: white;
            font-weight: 800;
            border-radius: 5px;
        }
    </style>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'index' ? 'active' : '' ?>" aria-current="page" href="index_.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'product-listR' ? 'active' : '' ?>" href="product-listR.php">產品列表</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'product-Creat' ? 'active' : '' ?>" href="product-Creat.php">新增產品</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'customized_products' ? 'active' : '' ?>" href="customized_products.php">客製化商品</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
    </div>