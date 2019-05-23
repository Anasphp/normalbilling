<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Billing - List Products</title>
    <link rel="icon" href="dist/images/favicon.ico" />

    <!--Plugin CSS-->
    <link href="dist/css/plugins.min.css" rel="stylesheet">

    <!--main Css-->
    <link href="dist/css/main.min.css" rel="stylesheet">
</head>
<body>
    @include('header', ['title' => "List Products"])

    <!-- main-content-->
    <div class="wrapper">
        @include('sidebar')
        <div id="content">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <div class="card redial-border-light redial-shadow mb-4">
                                <div class="card-body">
                                    <div class="card redial-border-light redial-shadow mb-4">
                                        <div class="card-body">
                                            <h6 class="header-title pl-3 redial-relative">Products</h6>
                                            <table class="table table-dark table-hover mb-0 redial-font-weight-500 table-responsive d-md-table">
                                                @if (count($listProducts) > 0)
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Sr.No</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Size</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = $listProducts->perPage() * ($listProducts->currentPage() - 1) + 1; ?>
                                                    @foreach($listProducts as $products)
                                                    <tr>
                                                        <th>{{$i++}}</th>
                                                        <td>{{$products->products_name}}</td>
                                                        <td>{{$products->products_size}}</td>
                                                        <td>{{$products->products_price}}</td>
                                                        <td>{{$products->products_price}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                @else
                                                <center>No Products Available</center>
                                                @endif
                                            </table>
                                            <center>
                                            {{ $listProducts->links() }}
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <!-- End main-content-->

    <!-- Top To Bottom-->
    <a href="#" class="scrollup text-center redial-bg-primary redial-rounded-circle-50"> 
        <h4 class="text-white mb-0"><i class="icofont icofont-long-arrow-up"></i></h4>
    </a>
    <!-- End Top To Bottom-->

    <!-- jQuery -->
    <script src="dist/js/plugins.min.js"></script>
    <script src="dist/js/common.js"></script>
</body>
</html>