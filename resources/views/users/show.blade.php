<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>{{ $user->name }}'s Pastebin - Pastebin</title>
</head>
<body>
    @include('includes.header')
    <section>
        <article>
            @include('includes.aside')
            <h1>{{ $user->name }}'s Pastebin</h1>
            <p>This user joined Pastebin {{ $user->created_at->diffForHumans() }}</p>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>EXPOSURE</th>
                                <th>NAME / TITLE</th>
                                <th>ADDED</th>
                                <th>EXPIRES</th>
                                <th>SYNTAX</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pastes as $paste)
                                <tr>
                                    <td>{{ $paste->paste_exposure }}</td>
                                    <td><a href="{{ route('pastes.show', $paste->hash) }}">{{ $paste->title }}</a></td>
                                    <td>{{ $paste->created_at->diffForHumans() }}</td>
                                    @if ($paste->paste_expiration === null)
                                        <td>Never</td>
                                    @else
                                        <td>{{ $paste->paste_expiration }}</td>
                                    @endif
                                    @if ($paste->syntax_highlighting === null)
                                        <td>None</td>
                                    @else
                                        <td>{{ $paste->syntax_highlighting }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $pastes->links() }}
        </article>
    </section>
</body>
</html>