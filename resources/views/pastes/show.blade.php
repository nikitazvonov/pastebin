<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>{{ $paste->title }} - Pastebin</title>
</head>
<body>
    @include('includes.header')
    <section>
        <article>
            @include('includes.aside')
            <div>
                <strong>{{ $paste->title }}</strong>
            </div>
            <div>
                @if ($paste->syntax_highlighting === null)
                    <p>text</p>
                @else
                    <p>{{ $paste->syntax_highlighting }}</p>
                @endif
                {{ $paste->body }}
            </div>
        </article>
    </section>
</body>
</html>