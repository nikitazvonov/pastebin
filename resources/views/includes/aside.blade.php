<div>
    <aside>
        @auth
            <h2>My Pastes</h2>
            <ul>
                @foreach ($myPastes as $myPaste)
                <li>
                    <a href="/{{ $myPaste->hash }}">{{ $myPaste->title }}</a> <br>
                    @if ($myPaste->syntax_highlighting === null)
                        {{ $myPaste->created_at->diffForHumans() }}
                    @else
                        {{ $myPaste->syntax_highlighting }} | {{ $myPaste->created_at->diffForHumans() }}
                    @endif
                </li> 
                @endforeach
            </ul>
            <h2>Public Pastes</h2>
            <ul>
                @foreach ($publicPastes as $publicPaste)
                <li>
                    <a href="/{{ $publicPaste->hash }}">{{ $publicPaste->title }}</a> <br>
                    @if ($publicPaste->syntax_highlighting === null)
                        {{ $publicPaste->created_at->diffForHumans() }}
                    @else
                        {{ $publicPaste->syntax_highlighting }} | {{ $publicPaste->created_at->diffForHumans() }}
                    @endif
                </li> 
                @endforeach
            </ul>
        @endauth
        @guest
        <h2>Public Pastes</h2>
        <ul>
            @foreach ($publicPastes as $publicPaste)
            <li>
                <a href="/{{ $publicPaste->hash }}">{{ $publicPaste->title }}</a> <br>
                @if ($publicPaste->syntax_highlighting === null)
                    {{ $publicPaste->created_at->diffForHumans() }}
                @else
                    {{ $publicPaste->syntax_highlighting }} | {{ $publicPaste->created_at->diffForHumans() }}
                @endif
            </li> 
            @endforeach
        </ul>
        @endguest
    </aside>
</div>