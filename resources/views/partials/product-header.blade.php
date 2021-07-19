<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <form class="form-inline" action="{{ route('product.search') }}" method="get">

        <div class="form-group mx-sm-2 mb-2">
            <label class="sr-only"> Nhập ID </label>
            <input type="text" c
                   lass="form-control"
                   name="product_id"
                   value="{{request()->product_id}}"
                   placeholder="Nhập Id">
        </div>

        <div class="form-group mx-sm-2 mb-2">
            <label class="sr-only"> Nhập tên sản phẩm </label>
            <input type="text"
                   class="form-control"
                   name="name"
                   value="{{ request()->name }}"
                   placeholder="Nhập tên sản phẩm">
        </div>

        <div class="form-group mx-sm-2 mb-2">
            <label class="sr-only"> Nhập tags sản phẩm </label>
            <input type="text"
                   class="form-control"
                   name="tags"
                   value="{{ request()->tags }}"
                   placeholder="Nhập tags sản phẩm">
        </div>

        <div class="form-group mx-sm-2 mb-2">
            <label class="sr-only"> Nhập tên sản phẩm </label>
            <select class="form-control" name="category_id">
                <option value="">Chọn danh mục sản phẩm</option>
                {!!$htmlOptionSearchHeader!!}
            </select>
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
