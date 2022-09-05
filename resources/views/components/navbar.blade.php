<nav class="navbar navbar-expand-lg border border-bottom mb-4 bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">
        {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="/mau">Mau</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gak">Gak</a>
                </li> -->
                <li class="nav-item">
	                <a class="nav-link" href="/users">User</a>
                </li>
                <li class="nav-item">
	                <a class="nav-link" href="/products">Produk</a>
                </li>
                <li class="nav-item">
	                <a class="nav-link" href="/authlog">Auth Log</a>
                </li>
                <li class="nav-item">
	                <a class="nav-link" href="/users/datatable">Users DataTable</a>
                </li>
                <li class="nav-item">
	                <a class="nav-link" href="/products/datatables">Produk DataTable</a>
                </li>
                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>-
            </ul>
        </div>
    </div>
</nav>