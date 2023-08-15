<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
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