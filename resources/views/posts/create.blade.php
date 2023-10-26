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
        @foreach ($errors->all() as $error)
           <div>
               {{ $error }}
           </div> 
        @endforeach
        <form action="/posts" method="post">
        @csrf
            <div>
                <label for="title">title</label>
                <input type="text" name="title" value="{{ old('title') }}" />
            </div>
            <div>
                <label for="body">body</label>
                <textarea name="body">{{ old('body') }}</textarea>
            </div>
            <input type="submit" value="保存する">
        </form>
        <div class="footer">
            <a href={{ url("/posts/"); }}>元に戻る</a>
        </div>
    </body>
</html>