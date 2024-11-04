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
                        <span class="d-block animate-target py-1">Categorias</span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Account button visible on screens < 768px wide (md breakpoint) -->
    @auth
        <div class="offcanvas-header flex-column align-items-start d-md-none">
            <a
                class="btn btn-lg btn-outline-secondary w-100 rounded-pill"
                href="account-signin.html"
            >
                <i class="ci-user fs-lg ms-n1 me-2"></i>
                Olá, {{ auth()->user()->name  }}
            </a>
        </div>
    @endauth

    @guest()
        <div class="offcanvas-header flex-column gap-3 align-items-start d-md-none">
            <a class="btn btn-primary w-100" href="{{route('login')}}">
                Entrar
            </a>

            <a class="btn btn-outline-primary w-100" href="{{route('register')}}">
                Criar Conta
            </a>
        </div>
    @endguest
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
        <a class="navbar-brand fs-2 p-0 pe-lg-2 pe-xxl-0 me-0 me-sm-3 me-md-4 me-xxl-5" href="/">
             <span class="flex-shrink-0 text-primary me-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"><path
                    d="M36 18.01c0 8.097-5.355 14.949-12.705 17.2a18.12 18.12 0 0 1-5.315.79C9.622 36 2.608 30.313.573 22.611.257 21.407.059 20.162 0 18.879v-1.758c.02-.395.059-.79.099-1.185.099-.908.277-1.817.514-2.686C2.687 5.628 9.682 0 18 0c5.572 0 10.551 2.528 13.871 6.517 1.502 1.797 2.648 3.91 3.359 6.201.494 1.659.771 3.436.771 5.292z"
                    fill="currentColor"></path><g fill="#fff"><path
                        d="M17.466 21.624c-.514 0-.988-.316-1.146-.829-.198-.632.138-1.303.771-1.501l7.666-2.469-1.205-8.254-13.317 4.621a1.19 1.19 0 0 1-1.521-.75 1.19 1.19 0 0 1 .751-1.521l13.89-4.818c.553-.197 1.166-.138 1.64.158a1.82 1.82 0 0 1 .85 1.284l1.344 9.183c.138.987-.494 1.994-1.482 2.33l-7.864 2.528-.375.04zm7.31.138c-.178-.632-.85-1.007-1.482-.81l-5.177 1.58c-2.331.79-3.28.02-3.418-.099l-6.56-8.412a4.25 4.25 0 0 0-4.406-1.758l-3.122.987c-.237.889-.415 1.777-.514 2.686l4.228-1.363a1.84 1.84 0 0 1 1.857.81l6.659 8.551c.751.948 2.015 1.323 3.359 1.323.909 0 1.857-.178 2.687-.474l5.078-1.54c.632-.178 1.008-.829.81-1.481z"></path><use
                        href="#czlogo"></use><use href="#czlogo" x="8.516" y="-2.172"></use></g><defs><path id="czlogo"
                                                                                                            d="M18.689 28.654a1.94 1.94 0 0 1-1.936 1.935 1.94 1.94 0 0 1-1.936-1.935 1.94 1.94 0 0 1 1.936-1.935 1.94 1.94 0 0 1 1.936 1.935z"></path></defs></svg>
          </span>
        </a>
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
                Categorias
                <i class="ci-chevron-down fs-lg me-2 ms-auto me-n1"></i>
            </button>
            <div
                class="dropdown-menu rounded-4 p-4"
                style="--cz-dropdown-spacer: 0.75rem; margin-left: -75px; width: 803px;"
            >
                <div class="row">
                    @for($i = 0; $i < 9; $i++)
                        <div class="col-lg-4 mb-3" style="min-width: 170px">
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

                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Search bar visible on screens > 768px wide (md breakpoint) -->
        <div class="position-relative w-100 d-none d-md-block me-3 me-xl-4">
            <input
                type="search"
                class="form-control form-control-lg rounded-pill"
                placeholder="Pesquisar produtos"
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

            <!-- Account button visible on screens > 768px wide (md breakpoint) -->
            @auth
                <a
                    class="btn btn-icon fs-lg btn-outline-secondary border-0 rounded-circle animate-shake d-none d-md-inline-flex"
                    href="account-signin.html"
                >
                    <i class="ci-user animate-target"></i>
                    <span class="visually-hidden">Account</span>
                </a>
            @endauth

            <!-- bag button -->
            <div id="header-app">
                <header-component></header-component>
            </div>
        </div>
        @guest()
            <div class="ms-5 d-none d-lg-flex gap-3">
                <button type="button" class="btn btn-primary">
                    Login
                </button>
                <button type="button" class="btn btn-outline-primary animate-scale">
                    Criar Conta
                </button>
            </div>
        @endguest
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
                    placeholder="Pesquisar produtos"
                    data-autofocus="collapse"
                />
            </div>
        </div>
    </div>
</header>
