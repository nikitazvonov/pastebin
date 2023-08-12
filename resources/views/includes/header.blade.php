<section>
    <header>
        <div>
            <a href="/">PASTEBIN</a>
        </div>
        @auth
            <div>
                <a href="/{name}">{{$name}}</a>
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