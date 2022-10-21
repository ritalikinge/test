<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <h4>PRODUCTS</h4>

    </div>
    <ul class="nav">
        <li class="nav-item menu-items ">
            <a class="nav-link" href="{{ route('product_managements.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Product Managements</span>
            </a>
        </li>
        <li class="nav-item menu-items ">
            <a class="nav-link" href="{{url('all_product')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Add To Cart</span>
            </a>
        </li>
    </ul>
</nav>
