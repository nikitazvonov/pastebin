<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pastebin</title>
</head>
<body>
    @include('includes.header')
    <section>
        <article>
            <div>
                <form action="/{name}" method="GET">
                    @csrf
                    <div>
                        <label for="username">Username:</label>
                        <input type="text" name="username" placeholder="Your username">
                    </div>
                    <div>
                        <label for="password">Username:</label>
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