<?php
if (isset($_GET['result'])) {
    if ($_GET['result'] == 'productnotadd') {
        echo '<div class="alert alert-danger" style="margin-bottom:0px;text-align:center;">
      <strong>Something Worng ! </strong> Product is not added.</div>';
    }
    if ($_GET['result'] == 'addproduct') {
        echo '<div class="alert alert-success" style="margin-bottom:0px;text-align:center;">
      <strong>Sussesfully added</strong></div>';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>This is Ecommerce</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        font-size: .875rem;
    }

    .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
    }

    /*
 * Sidebar
 */

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 35px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto;

    }

    @supports ((position: -webkit-sticky) or (position: sticky)) {
        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
        }
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #999;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
        color: inherit;
    }

    .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
    }

    /*
 * Content
 */

    [role="main"] {
        padding-top: 40px;
        /* Space for fixed navbar */
    }

    /*
 * Navbar
 */

    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }
</style>

<body>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar text-white">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="./home.php">
                                <span data-feather="home"></span><i class="fe fe-heart"></i>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="./order.php">
                                <span data-feather="file"></span>
                                Orders
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="./allproduct.php">
                                <span data-feather="shopping-cart"></span>
                                <i class="fe fe-heart"></i> Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./customers.php">
                                <span data-feather="users"></span>
                                Customers
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./addproduct.php">
                                <span data-feather="layers"></span>
                                Add product
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Categories</span>
                        <!-- <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="plus-circle"></span>
                        </a> -->
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="./mans.php">
                                <span data-feather="file-text"></span>
                                Men
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="womens.php">
                                <span data-feather="file-text"></span>
                                Women
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kids.php">
                                <span data-feather="file-text"></span>
                                Kids
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="accessories.php">
                                <span data-feather="file-text"></span>
                                Accessories
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- content area start -->
            <?php

            include('../inc/connection.php');

            $id = $_GET['epid'];
            $product_data = mysqli_query($connect, "SELECT * FROM products WHERE pid = $id");
            $product_slice = mysqli_fetch_array($product_data);
            ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-5">
                <div class="container">
                    <form action="../inc/editproduct.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="userid" value="<?php echo $id = $_GET['epid']; ?>">
                        <select id="inputState" class="form-control" name="pcategory" value="this">
                            <option selected><?php echo $product_slice['p_category']; ?></option>
                            <option value="men">Men</option>
                            <option value="women">Women</option>
                            <option value="kids">Kids</option>
                            <option value="accessories">Accessories</option>
                        </select>
                        <small id="emailHelp" class="form-text text-muted mb-4">Update product category</small>


                        <input type="pname" name="pname" class="form-control" value="<?php echo $product_slice['p_name']; ?>" placeholder="Enter Product Name">
                        <small id="emailHelp" class="form-text text-muted mb-4">Update product name</small>
                        <input type="pcode" name="pcode" class="form-control" placeholder="Enter Product Code" value="<?php echo $product_slice['p_code']; ?>">
                        <small id="emailHelp" class="form-text text-muted mb-4">Update product code</small>

                        <input type="pprice" name="pprice" class="form-control" placeholder="Enter Product Price" value="<?php echo $product_slice['p_price']; ?>">
                        <small id="emailHelp" class="form-text text-muted mb-4">Upload product price</small>


                        <input type="file" name="pimg" class="form-control-file mb-1">
                        <small id="emailHelp" class="form-text text-muted mb-4">Update product image</small>


                        <button class="btn btn-primary btn-block" type="submit">Update Product</button>
                    </form>
                </div>

            </main>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- For icons -->
    <script src="../../node_modules/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
    <!-- / -->


</body>

</html>