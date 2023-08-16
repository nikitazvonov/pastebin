<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/resources/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Pastebin</title>
</head>
<body>
    @include('includes.header')
    <section>
        <article>
            @include('includes.aside')
                <div>
                    <form action="/pastes" method="POST">
                        @csrf
                        <div>
                            <strong><label for="body">New Paste</label></strong><br>
                            <textarea class="preserveLines" name="body" cols="100" rows="15"></textarea>
                        </div>
                        @include ('includes.syntax')
                        <div>
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
                        </div>
                        <div>
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
                        </div>
                        <div>
                            <label for="title">Paste Name / Title:</label>
                            <input type="text" name="title">
                        </div>
                        <div>
                            <button>Create New Paste</button>
                        </div>
                    </form>
                </div>
        </article>
    </section>
</body>
</html>