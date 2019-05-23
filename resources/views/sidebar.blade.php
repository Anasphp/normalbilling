<nav id="sidebar" class="card redial-border-light px-2 mb-4">
    <div class="sidebar-scrollarea">
        <ul class="metismenu list-unstyled mb-0" id="menu">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard pr-1"></i> Dashboard</a></li>
            <li><a href="{{ url('/addProducts') }}"><i class="fa fa-cart-plus pr-1"></i> Add Products</a></li>
            <li><a href="{{ url('/listProducts') }}"><i class="icofont icofont-shopping-cart pr-1"></i> List Products</a></li>
            <li><a href="{{ url('/setGst') }}"><i class="fa fa-percent pr-1"></i> Set GST</a></li>
            <li><a href="{{ url('/createBill') }}"><i class="fa fa-book pr-1"></i> Create Bill</a></li>
            <li><a href="{{ url('/listBill') }}"><i class="fa fa-files-o pr-1"></i> List Bill</a></li>
        </ul>
    </div>
</nav>