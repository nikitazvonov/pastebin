<div>
    <aside>
        @auth
            <h2>My Pastes</h2>
                @if ($myPastes->isEmpty())
                    You don't have any paste yet!
                @else
                    <ul>
                        @foreach ($myPastes as $myPaste)
                        <li>
                            <a href="/pastes/{{ $myPaste->hash }}">{{ $myPaste->title }}</a> <br>
                            @if ($myPaste->syntax_highlighting === null)
                                {{ $myPaste->created_at->diffForHumans() }}
                            @else
                                {{ $myPaste->syntax_highlighting }} | {{ $myPaste->created_at->diffForHumans() }}
                            @endif
                        </li> 
                        @endforeach
                    </ul>
                @endif
                <h2>Public Pastes</h2>
                @if ($publicPastes->isEmpty())
                    There are no pastes uploaded!
                @else
                    <ul>
                        @foreach ($publicPastes as $publicPaste)
                        <li>
                            <a href="/pastes/{{ $publicPaste->hash }}">{{ $publicPaste->title }}</a> <br>
                            @if ($publicPaste->syntax_highlighting === null)
                                {{ $publicPaste->created_at->diffForHumans() }}
                            @else
                                {{ $publicPaste->syntax_highlighting }} | {{ $publicPaste->created_at->diffForHumans() }}
                            @endif
                        </li> 
                        @endforeach
                    </ul>
                @endif
        @endauth
        @guest
        <h2>Public Pastes</h2>
            @if ($publicPastes->isEmpty())
                There are no pastes uploaded!
            @else
                <ul>
                    @foreach ($publicPastes as $publicPaste)
                    <li>
                        <a href="/pastes/{{ $publicPaste->hash }}">{{ $publicPaste->title }}</a> <br>
                        @if ($publicPaste->syntax_highlighting === null)
                            {{ $publicPaste->created_at->diffForHumans() }}
                        @else
                            {{ $publicPaste->syntax_highlighting }} | {{ $publicPaste->created_at->diffForHumans() }}
                        @endif
                    </li> 
                    @endforeach
                </ul>
            @endif
        @endguest
    </aside>
</div>