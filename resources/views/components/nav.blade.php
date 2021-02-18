<nav class="nav_bar">
    <div class="nb_side">
        @guest
            <a href="{{ route('login') }}" class="@if ($currentPage === 'login') nb_item-active @endif">
                <div class="nb_item">login</div>
                <div class="nb_item_footer"></div>
            </a>
            <a href="{{ route('register') }}" class="@if ($currentPage === 'register') nb_item-active @endif">
                <div class="nb_item">register</div>
                <div class="nb_item_footer"></div>
            </a>
        @endguest
        @auth
            <a href="#">
                <div class="nb_item">Sergey Marchuk</div>
                <div class="nb_item_footer"></div>
            </a>
            <a href="#">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nb_item">logout</button>
                    <div class="nb_item_footer"></div>
                </form>
            </a>
        @endauth
    </div>
    <div class="nb_side">
        @auth
            <a href="{{ route('admin') }}" class="@if ($currentPage === 'admin') nb_item-active @endif">
                <div class="nb_item">admin</div>
                <div class="nb_item_footer"></div>
            </a>
        @endauth
        <a href="{{ route('home') }}" class="@if ($currentPage === 'home') nb_item-active @endif">
            <div class="nb_item">home</div>
            <div class="nb_item_footer"></div>
        </a>
        <a href="{{ route('about') }}" class="@if ($currentPage === 'about') nb_item-active @endif">
            <div class="nb_item">about</div>
            <div class="nb_item_footer"></div>
        </a>
        <a href="{{ route('blog') }}" class="@if ($currentPage === 'blog') nb_item-active @endif">
            <div class="nb_item">blog</div>
            <div class="nb_item_footer"></div>
        </a>
    </div>
</nav>
