<html>
    <body>
        <h1>title</h1>
        <p>This is a sample body.</p>
        
        <div class="posts">
            @foreach ($posts as $post)
            <div class="post">
                <a href={{ url('posts/' . $post->id) }}>
                    {{ $post->title }}
                </a>
                <p class="body">{{ $post->body }}</p>
            </div>
            @endforeach
        </div>
        <div class="paginate">
            {{ $posts->links() }}
        </div>
    </body>
</html>