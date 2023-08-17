<section>
    <header>
        <div>
            <a href="/">PASTEBIN</a>
        </div>
        @auth
            <div>
                <a href="{{ route('users.show', auth()->user()->name) }}">{{ auth()->user()->name }}</a>
                <a href="{{ route('users.logout') }}">LOGOUT</a>
            </div>
        @endauth
        @guest
            <div>
                <a href="{{ route('users.login') }}">LOGIN</a>
                <a href="{{ route('users.create') }}">SIGN UP</a>
            </div>
        @endguest
    </header>
</section>