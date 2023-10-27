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
        <h1 class="編集画面"></h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="post">
                @csrf
                @method('put')
                
                <div class="content__title">
                    <h2>Title</h2>
                    <input type="text" name="post[title]" value="{{ $post->title }}" />
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                <div class="content__body">
                    <h2>Body</h2>
                    <textarea name="post[body]">{{ $post->body }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <input type="submit" value="保存">
            </form>
            <div class="footer">
                <a href={{ url("/posts/"); }}>元に戻る</a>
            </div>
        </div>
    </body>
</html>