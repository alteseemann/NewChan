<div class="burger-menu">

    <a href="#" class="burger-menu__button">
        <span class="burger-menu__lines"></span>
    </a>

    <nav class="burger-menu__nav">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="burger-menu__link">Мой профиль</a>
                <a href="{{ route('logout') }}" class="burger-menu__link">Выход</a>
            @else
                <a href="{{ url('/login') }}" class="burger-menu__link">Вход</a>
                @if (Route::has('register'))
                    <a href="{{ url('/register') }}" class="burger-menu__link">Регистрация</a>
                @endif
            @endif
        @endif
        <a href="/" class="burger-menu__link">Главная</a>
        <p class="burger-menu__link">Наши доски:</p>
        @foreach ($desks as $desk)
            <a href="{{route('enter_desk',['desk_id'=>"desk_$desk->id"])}}" class="burger-menu__link">
                @if (count($desk->threads) % 10 == 1)
                    {{$desk->name}}  ({{count($desk->threads)}} тред)
                @elseif (count($desk->threads) % 10 < 5)
                    {{$desk->name}}  ({{count($desk->threads)}} треда)
                @else
                    {{$desk->name}}  ({{count($desk->threads)}} тредов)
                @endif
            </a>
        @endforeach
    </nav>
    <div class="burger-menu__overlay"></div>
</div>

