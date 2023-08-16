<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/hybrid.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>{{ $paste->title }} - Pastebin</title>
</head>
<body>
    @include('includes.header')
    <section>
        <article>
            @include('includes.aside')
                <div>
                    <strong>{{ $paste->title }}</strong><br>
                    @if ($paste->user_id === null)
                        <p>A GUEST | {{ $paste->created_at->format('F jS Y') }} | Paste expires: {{ $paste->paste_expiration === null ? 'Never' : $paste->paste_expiration }}</p>
                    @else
                        <p><a href="/users/{{ $paste->user->name }}">{{ strtoupper($paste->user->name) }}</a> | {{ $paste->created_at->format('F jS Y') }} | Paste expires: {{ $paste->paste_expiration === null ? 'Never' : $paste->paste_expiration }}</p>
                    @endif
                </div>
                <div>
                    @if ($paste->syntax_highlighting === null)
                        <p>text</p>
                    @else
                        <p>{{ $paste->syntax_highlighting }}</p>
                    @endif
                    @if ($paste->syntax_highlighting === null)
                        <textarea class="preserveLines" name="body" cols="100" rows="15" readonly>{{ $paste->body }}</textarea>
                    @else
                        <pre style="tab-size: 4;">
                            <code class="language-{{ $paste->syntax_highlighting }}">{{ $paste->body }}
                            </code>
                        </pre>
                    @endif
                </div>
        </article>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
</body>
</html>