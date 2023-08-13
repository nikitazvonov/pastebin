<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pastebin - Sign Up Page</title>
</head>
<body>
    @include('includes.header')
    <section>
        <article>
            <h1>Sign Up Page</h1>
            <div>
                <form action="/users" method="POST">
                    @csrf
                    <div>
                        <label for="name">Username:</label>
                        <input type="text" name="name" placeholder="Your username">
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" name="password" placeholder="Your password">
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Login">
                    </div>
                </form>
            </div>
        </article>
    </section>
</body>
</html>