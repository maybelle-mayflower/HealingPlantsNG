
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/"><div class="logo">Hh<sub>NG</sub></div></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route('plant-bible')}}" class="nav-link">HerbCyclopedia</a></li>
                <li class="nav-item"><a href="{{ route ('recipe.book')}}" class="nav-link">Recipe Book</a></li>
                <li class="nav-item"><a href="{{ route ('plant.store')}}" class="nav-link">Shop</a></li>
                <li class="nav-item"><a href="{{ route ('blog')}}" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>


                @guest
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Sign In</a></li>
                @else
                <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" style="z-index: 1000;">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
                <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->