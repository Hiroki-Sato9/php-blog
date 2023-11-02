<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">
        <h1>{{ $post->title }}</h1>
        <div class="content">
            <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
            <div class="content_post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>
            </div>
            <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        </div>
        <div class="footer">
            <a href={{ url("/posts/"); }}>元に戻る</a>
        </div>
    </body>
</html>