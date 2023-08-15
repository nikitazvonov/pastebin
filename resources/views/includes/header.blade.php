<section>
    <header>
        <div>
            <a href="/">PASTEBIN</a>
        </div>
        @auth
            <div>
                <a href="/users/{{ auth()->user()->name }}">{{ auth()->user()->name }}</a>
                <a href="/logout">LOGOUT</a>
            </div>
        @endauth
        @guest
            <div>
                <a href="/login">LOGIN</a>
                <a href="/signup">SIGN UP</a>
            </div>
        @endguest
    </header>
</section>