<div>search form category</div>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <!-- SEARCH FORM -->
    <form class="form-inline" method="get" action="{{ route('product.search') }}">

        <div class="form-group mx-sm-2 mb-2">
            <label class="sr-only"> Nhập ID </label>
            <input type="text" class="form-control" name="product_id"
                   placeholder="Nhập Id">
        </div>

        <div class="form-group mx-sm-2 mb-2">
            <label class="sr-only"> Nhập tên danh mucj</label>
            <input type="text"
                   value="{{ request()->name }}"
                   class="form-control" placeholder="Nhập tên danh muc" name="name">
        </div>



        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                    class="fas fa-th-large"></i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
