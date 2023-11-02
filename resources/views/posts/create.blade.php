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
        <form action="/posts" method="post">
        @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" value="{{ old('post.title') }}" />
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="category">
                <h2>Category</h2>
                <select name="post[category_id]">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <p class="category__error" style="color:red">{{ $errors->first('post.category') }}</p>
            </div>
            <input type="submit" value="store">
        </form>
        <div class="footer">
            <a href={{ url("/posts/"); }}>元に戻る</a>
        </div>
    </body>
</html>