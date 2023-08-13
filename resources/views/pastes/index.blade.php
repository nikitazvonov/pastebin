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
                <form action="/pastes" method="POST">
                    @csrf
                    <div>
                        <label for="body">New Paste</label>
                        <textarea name="body" cols="30" rows="10"></textarea>
                    </div>
                    <div>
                        <label for="syntax_highlighting">Syntax Highlighting:</label>
                        <select name="syntax_highlighting">
                            <option disabled selected>None</option>
                        </select>
                    </div>
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
                        <label for="paste_exposure">Paste Exposure:</label>
                        <select name="paste_exposure">
                            <option value="public" selected>Public</option>
                            <option value="unlisted">Unlisted</option>
                            <option value="Private">Private</option>
                        </select>
                    </div>
                    <div>
                        <label for="title">Paste Name / Title:</label>
                        <input type="text" name="title">
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Create New Paste">
                    </div>
                </form>
            </div>
        </article>
    </section>
</body>
</html>