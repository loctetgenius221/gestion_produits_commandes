<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'admin')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="header">
        <nav>
            <ul>
                <li>
                    <a href="#" class="logo">
                        <span class="nav-item">Kane & Frères</span>
                    </a>
                </li>
                <li><a href="{{ route('admin.index') }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="nav-item">Acceuil</span>
                </a></li>
                <li><a href="{{ route('admin.commandes') }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="nav-item">Commandes</span>
                </a></li>
                <li><a href="{{ route('admin.produits') }}">
                    <i class="fa-solid fa-shop"></i>
                    <span class="nav-item">Produits</span>
                </a></li>
                <li><a href="{{ route('admin.categories') }}">
                    <i class="fa-solid fa-list"></i>
                    <span class="nav-item">Catégories</span>
                </a></li>
                <li><a href="{{ route('admin.clients') }}">
                    <i class="fa-solid fa-user"></i>
                    <span class="nav-item">Clients</span>
                </a></li>
                <li><a href="{{ route('admin.clients') }}" class="logout">
                    <form method="POST" action={{ route('logout') }}>
                        @csrf
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <button type="submit" class="nav-item">Deconnexion</button>
                    </form>
                </a></li>
            </ul>
        </nav>

        <section class="main-top">
            <h2>Bienvenue administrateur</h2>
        </section>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <!-- Footer content -->
    </footer>
</body>
</html>
