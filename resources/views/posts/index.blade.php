<html>
    <body>
        <h1>title</h1>
        <p>This is a sample body.</p>
        
        <div class="posts">
            @foreach ($posts as $post)
            <div class="post">
                <h2 class="title">{{ $post->title }}</h2>
                <p class="body">{{ $post->body }}</p>
            </div>
            @endforeach
        </div>
    </body>
</html>