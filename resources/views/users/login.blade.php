<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Pastebin - Login Page</title>
</head>
<body>
    @include('includes.header')
    <section>
        <article>
            @include('includes.aside')
            <h1>Login Page</h1>
            <div>
                <form action="/authenticate" method="POST">
                    @csrf
                    <div>
                        <label for="name">Username:</label>
                        <input type="text" name="name" placeholder="Your username">
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" name="password" placeholder="Your password">
                        @error('password')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button>Login</button>
                    </div>
                </form>
            </div>
        </article>
    </section>
</body>
</html>