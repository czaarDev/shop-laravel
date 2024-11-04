<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover"
    />

    <title>@yield('title', config('app.name'))</title>
    <meta
        name="description"
        content="@yield('description', config('app.name'))"
    />

    @include('includes.shop-css')
    @vite(['resources/js/app.js'])

</head>

<body>
<div class="d-flex flex-column" id="app" style="min-height: 100vh;">
    @include('includes.shop-cart-off-canvas')
    <!-- Search offcanvas -->
    <div
        class="offcanvas offcanvas-top"
        id="searchBox"
        data-bs-backdrop="static"
        tabindex="-1"
    >
        <div class="offcanvas-header border-bottom p-0 py-lg-1">
            <form class="container d-flex align-items-center">
                <input
                    type="search"
                    class="form-control form-control-lg fs-lg border-0 rounded-0 py-3 ps-0"
                    placeholder="Search the products"
                    data-autofocus="offcanvas"
                />
                <button
                    type="reset"
                    class="btn-close fs-lg"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"
                ></button>
            </form>
        </div>
        <div class="offcanvas-body px-0">
            <div class="container text-center">
                <svg
                    class="text-body-tertiary opacity-60 mb-4"
                    xmlns="http://www.w3.org/2000/svg"
                    width="60"
                    viewBox="0 0 512 512"
                    fill="currentColor"
                >
                    <path
                        d="M340.115,361.412l-16.98-16.98c-34.237,29.36-78.733,47.098-127.371,47.098C87.647,391.529,0,303.883,0,195.765S87.647,0,195.765,0s195.765,87.647,195.765,195.765c0,48.638-17.738,93.134-47.097,127.371l16.98,16.98l11.94-11.94c5.881-5.881,15.415-5.881,21.296,0l112.941,112.941c5.881,5.881,5.881,15.416,0,21.296l-45.176,45.176c-5.881,5.881-15.415,5.881-21.296,0L328.176,394.648c-5.881-5.881-5.881-15.416,0-21.296L340.115,361.412z M195.765,361.412c91.484,0,165.647-74.163,165.647-165.647S287.249,30.118,195.765,30.118S30.118,104.28,30.118,195.765S104.28,361.412,195.765,361.412z M360.12,384l91.645,91.645l23.88-23.88L384,360.12L360.12,384z M233.034,233.033c5.881-5.881,15.415-5.881,21.296,0c5.881,5.881,5.881,15.416,0,21.296c-32.345,32.345-84.786,32.345-117.131,0c-5.881-5.881-5.881-15.415,0-21.296c5.881-5.881,15.416-5.881,21.296,0C179.079,253.616,212.45,253.616,233.034,233.033zM135.529,180.706c-12.475,0-22.588-10.113-22.588-22.588c0-12.475,10.113-22.588,22.588-22.588c12.475,0,22.588,10.113,22.588,22.588C158.118,170.593,148.005,180.706,135.529,180.706z M256,180.706c-12.475,0-22.588-10.113-22.588-22.588c0-12.475,10.113-22.588,22.588-22.588s22.588,10.113,22.588,22.588C278.588,170.593,268.475,180.706,256,180.706z"
                    ></path>
                </svg>
                <h6 class="mb-2">Your search results will appear here</h6>
                <p class="fs-sm mb-0">
                    Start typing in the search field above to see instant search
                    results.
                </p>
            </div>
        </div>
    </div>

    <nav
        class="offcanvas offcanvas-start"
        id="navbarNav"
        tabindex="-1"
        aria-labelledby="navbarNavLabel"
    >
        <div class="offcanvas-body pt-0 py-3 pb-3">
            <!-- Navbar nav -->
            <div class="accordion" id="navigation">
                <!-- Categories collapse visible on screens < 992px wide (lg breakpoint) -->
                <div class="accordion-item border-0 d-lg-none">
                    <div class="accordion-header" id="headingCategories">
                        <button
                            type="button"
                            class="accordion-button animate-underline fw-medium collapsed py-2"
                            data-bs-toggle="collapse"
                            data-bs-target="#categoriesMenu"
                            aria-expanded="false"
                            aria-controls="categoriesMenu"
                        >
                            <i class="ci-grid fs-lg me-2"></i>
                            <span class="d-block animate-target py-1">Categories</span>
                        </button>
                    </div>
                    <div
                        class="accordion-collapse collapse"
                        id="categoriesMenu"
                        aria-labelledby="headingCategories"
                        data-bs-parent="#navigation"
                    >
                        <div class="accordion-body pb-3">
                            <div
                                class="dropdown-menu show position-static d-flex flex-column gap-4 shadow-none p-4"
                            >
                                <div>
                                    <div class="h6">Bakery &amp; bread</div>
                                    <ul class="nav flex-column gap-2 mt-n2">
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Shop all</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Bread</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Pastries</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Bakery cookies</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Cupcakes</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Buns &amp; rolls</a
                                            >
                                        </li>
                                    </ul>
                                    <div class="h6 pt-4">Meat products</div>
                                    <ul class="nav flex-column gap-2 mt-n2">
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Shop all</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Fresh meat</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Processed meat</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Seafood</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Poultry products</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Prepared meat</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <div class="h6">Vegetables</div>
                                    <ul class="nav flex-column gap-2 mt-n2">
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Shop all</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Leafy greens</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Root vegetables</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Allium vegetables</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Peppers and tomatoes</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Cruciferous</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Seasonal squashes</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Beans, peas &amp; lentils</a
                                            >
                                        </li>
                                    </ul>
                                    <div class="h6 pt-4">Sauces and ketchup</div>
                                    <ul class="nav flex-column gap-2 mt-n2">
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Shop all</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Tomato-based sauces</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Salad dressing</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Hot sauces</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <div class="h6">Fresh fruits</div>
                                    <ul class="nav flex-column gap-2 mt-n2">
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Shop all</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Citrus fruits</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Berries</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Tropical fruits</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Stone fruits</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Exotic fruits</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Melons</a
                                            >
                                        </li>
                                    </ul>
                                    <div class="h6 pt-4">Italian dinner</div>
                                    <ul class="nav flex-column gap-2 mt-n2">
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Shop all</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Pasta &amp; sauces</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Italian cheese</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Italian meats</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Desserts &amp; beverages</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <div class="h6">Beverages</div>
                                    <ul class="nav flex-column gap-2 mt-n2">
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Shop all</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Soft drinks</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Juices</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Sports &amp; energy drinks</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Tea and coffee</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Alcoholic beverages</a
                                            >
                                        </li>
                                    </ul>
                                    <div class="h6 pt-4">Dairy &amp; eggs</div>
                                    <ul class="nav flex-column gap-2 mt-n2">
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Shop all</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Chees</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Milk &amp; yogurt</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Sour cream</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Eggs</a
                                            >
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a
                                                class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="shop-catalog-grocery.html"
                                            >Butter &amp; margarine</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account button visible on screens < 768px wide (md breakpoint) -->
        <div class="offcanvas-header flex-column align-items-start d-md-none">
            <a
                class="btn btn-lg btn-outline-secondary w-100 rounded-pill"
                href="account-signin.html"
            >
                <i class="ci-user fs-lg ms-n1 me-2"></i>
                Account
            </a>
        </div>
    </nav>

    <header
        class="navbar navbar-expand navbar-sticky sticky-top d-block bg-body z-fixed py-1 py-lg-0 py-xl-1 px-0"
        data-sticky-element=""
    >
        <div class="container justify-content-start py-2 py-lg-3">
            <!-- Offcanvas menu toggler (Hamburger) -->
            <button
                type="button"
                class="navbar-toggler d-block d-md-none flex-shrink-0 me-3 me-sm-4"
                data-bs-toggle="offcanvas"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar brand (Logo) -->
            <a
                class="navbar-brand fs-2 p-0 pe-lg-2 pe-xxl-0 me-0 me-sm-3 me-md-4 me-xxl-5"
                href="index.html"
            >Cartzilla</a
            >

            <!-- Categories dropdown visible on screens > 991px wide (lg breakpoint) -->
            <div
                class="dropdown d-none d-lg-block w-100 me-4"
                style="max-width: 200px"
            >
                <button
                    type="button"
                    class="btn btn-lg btn-secondary w-100 border-0 rounded-pill"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    data-bs-trigger="hover"
                >
                    <i class="ci-grid fs-lg me-2 ms-n1"></i>
                    Categories
                    <i class="ci-chevron-down fs-lg me-2 ms-auto me-n1"></i>
                </button>
                <div
                    class="dropdown-menu rounded-4 p-4"
                    style="--cz-dropdown-spacer: 0.75rem; margin-left: -75px"
                >
                    <div class="d-flex gap-4">
                        <div style="min-width: 170px">
                            <div class="h6">Bakery &amp; bread</div>
                            <ul class="nav flex-column gap-2 mt-n2">
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Shop all</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Bread</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Pastries</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Bakery cookies</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Cupcakes</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Buns &amp; rolls</a
                                    >
                                </li>
                            </ul>
                            <div class="h6 pt-4">Meat products</div>
                            <ul class="nav flex-column gap-2 mt-n2">
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Shop all</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Fresh meat</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Processed meat</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Seafood</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Poultry products</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Prepared meat</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <div style="min-width: 170px">
                            <div class="h6">Vegetables</div>
                            <ul class="nav flex-column gap-2 mt-n2">
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Shop all</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Leafy greens</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Root vegetables</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Allium vegetables</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Peppers and tomatoes</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Cruciferous</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Seasonal squashes</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Beans, peas &amp; lentils</a
                                    >
                                </li>
                            </ul>
                            <div class="h6 pt-4">Sauces and ketchup</div>
                            <ul class="nav flex-column gap-2 mt-n2">
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Shop all</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Tomato-based sauces</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Salad dressing</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Hot sauces</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <div style="min-width: 170px">
                            <div class="h6">Fresh fruits</div>
                            <ul class="nav flex-column gap-2 mt-n2">
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Shop all</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Citrus fruits</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Berries</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Tropical fruits</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Stone fruits</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Exotic fruits</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Melons</a
                                    >
                                </li>
                            </ul>
                            <div class="h6 pt-4">Italian dinner</div>
                            <ul class="nav flex-column gap-2 mt-n2">
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Shop all</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Pasta &amp; sauces</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Italian cheese</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Italian meats</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Desserts &amp; beverages</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <div style="min-width: 170px">
                            <div class="h6">Beverages</div>
                            <ul class="nav flex-column gap-2 mt-n2">
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Shop all</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Soft drinks</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Juices</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Sports &amp; energy drinks</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Tea and coffee</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Alcoholic beverages</a
                                    >
                                </li>
                            </ul>
                            <div class="h6 pt-4">Dairy &amp; eggs</div>
                            <ul class="nav flex-column gap-2 mt-n2">
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Shop all</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Chees</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Milk &amp; yogurt</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Sour cream</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Eggs</a
                                    >
                                </li>
                                <li class="d-flex w-100 pt-1">
                                    <a
                                        class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                        href="shop-catalog-grocery.html"
                                    >Butter &amp; margarine</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search bar visible on screens > 768px wide (md breakpoint) -->
            <div class="position-relative w-100 d-none d-md-block me-3 me-xl-4">
                <input
                    type="search"
                    class="form-control form-control-lg rounded-pill"
                    placeholder="Search for products"
                    aria-label="Search"
                />
                <button
                    type="button"
                    class="btn btn-icon btn-ghost fs-lg btn-secondary text-bo border-0 position-absolute top-0 end-0 rounded-circle mt-1 me-1"
                    aria-label="Search button"
                >
                    <i class="ci-search"></i>
                </button>
            </div>

            <!-- Button group -->
            <div class="d-flex align-items-center gap-md-1 gap-lg-2 ms-auto">
                <!-- Theme switcher (light/dark/auto) -->
                <div class="dropdown">
                    <button
                        type="button"
                        class="theme-switcher btn btn-icon btn-outline-secondary fs-lg border-0 rounded-circle animate-scale"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        aria-label="Toggle theme (light)"
                    >
                      <span class="theme-icon-active d-flex animate-target">
                        <i class="ci-sun"></i>
                      </span>
                    </button>
                    <ul class="dropdown-menu" style="--cz-dropdown-min-width: 9rem">
                        <li>
                            <button
                                type="button"
                                class="dropdown-item active"
                                data-bs-theme-value="light"
                                aria-pressed="true"
                            >
                          <span class="theme-icon d-flex fs-base me-2">
                            <i class="ci-sun"></i>
                          </span>
                                <span class="theme-label">Light</span>
                                <i class="item-active-indicator ci-check ms-auto"></i>
                            </button>
                        </li>
                        <li>
                            <button
                                type="button"
                                class="dropdown-item"
                                data-bs-theme-value="dark"
                                aria-pressed="false"
                            >
                          <span class="theme-icon d-flex fs-base me-2">
                            <i class="ci-moon"></i>
                          </span>
                                <span class="theme-label">Dark</span>
                                <i class="item-active-indicator ci-check ms-auto"></i>
                            </button>
                        </li>
                        <li>
                            <button
                                type="button"
                                class="dropdown-item"
                                data-bs-theme-value="auto"
                                aria-pressed="false"
                            >
                          <span class="theme-icon d-flex fs-base me-2">
                            <i class="ci-auto"></i>
                          </span>
                                <span class="theme-label">Auto</span>
                                <i class="item-active-indicator ci-check ms-auto"></i>
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Search toggle button visible on screens < 768px wide (md breakpoint) -->
                <button
                    type="button"
                    class="btn btn-icon fs-xl btn-outline-secondary border-0 rounded-circle animate-shake d-md-none"
                    data-bs-toggle="collapse"
                    data-bs-target="#searchBar"
                    aria-controls="searchBar"
                    aria-label="Toggle search bar"
                >
                    <i class="ci-search animate-target"></i>
                </button>

                <!-- Delivery options button visible on screens < 1200px wide (xl breakpoint) -->
                <button
                    type="button"
                    class="btn btn-icon fs-lg btn-outline-secondary border-0 rounded-circle animate-scale d-xl-none"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#deliveryOptions"
                    aria-controls="deliveryOptions"
                    aria-label="Toggle delivery options offcanvas"
                >
                    <i class="ci-map-pin animate-target"></i>
                </button>

                <!-- Account button visible on screens > 768px wide (md breakpoint) -->
                <a
                    class="btn btn-icon fs-lg btn-outline-secondary border-0 rounded-circle animate-shake d-none d-md-inline-flex"
                    href="account-signin.html"
                >
                    <i class="ci-user animate-target"></i>
                    <span class="visually-hidden">Account</span>
                </a>

                <div id="header-app">
                    <header-component></header-component>
                </div>
            </div>
        </div>

        <!-- Search collapse available on screens < 768px wide (md breakpoint) -->
        <div class="collapse d-md-none" id="searchBar">
            <div class="container pt-2 pb-3">
                <div class="position-relative">
                    <i
                        class="ci-search position-absolute top-50 translate-middle-y d-flex fs-lg ms-3"
                    ></i>
                    <input
                        type="search"
                        class="form-control form-icon-start rounded-pill"
                        placeholder="Search for products"
                        data-autofocus="collapse"
                    />
                </div>
            </div>
        </div>
    </header>

    <!-- Page content -->
    <main class="content-wrapper">
        @yield('content')
    </main>

    @include('includes.shop-footer')

</div>
@include('includes.shop-js')
</body>
</html>
