<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Pastebin</title>
</head>
<body>
    @include('includes.header')
    <section>
        <article>
            @include('includes.aside')
                <div>
                    <form action="{{ route('pastes.store') }}" method="POST">
                        @csrf
                        <strong><label for="body">New Paste</label></strong><br>
                        <textarea class="preserveLines" name="body" cols="100" rows="15"></textarea>
                        @include ('includes.syntax')
                        <label for="paste_expiration">Paste Expiration:</label>
                        <select name="paste_expiration">
                            <option value="never" selected>Never</option>
                            <option value="10 minutes">10 minutes</option>
                            <option value="1 hour">1 hour</option>
                            <option value="3 hours">3 hours</option>
                            <option value="1 day">1 day</option>
                            <option value="1 week">1 week</option>
                            <option value="1 month">1 month</option>
                        </select>
                        @auth
                            <label for="paste_exposure">Paste Exposure:</label>
                            <select name="paste_exposure">
                                <option value="public" selected>Public</option>
                                    <option value="unlisted">Unlisted</option>
                                    <option value="private">Private</option>
                                </select>
                        @endauth
                        @guest
                            <label for="paste_exposure">Paste Exposure:</label>
                            <select name="paste_exposure">
                                <option value="public" selected>Public</option>
                                <option value="unlisted">Unlisted</option>
                                <option value="private" disabled>Private</option>
                            </select>
                        @endguest
                            <label for="title">Paste Name / Title:</label>
                            <input type="text" name="title">
                            <button>Create New Paste</button>
                    </form>
                </div>
        </article>
    </section>
</body>
</html>