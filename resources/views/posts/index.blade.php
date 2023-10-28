<html>
    <body>
        <h1>title</h1>
        <p>This is a sample body.</p>
        <a href="/posts/create">投稿作成</a>
        
        <div class="posts">
            @foreach ($posts as $post)
            <div class="post">
                <a href={{ url('posts/' . $post->id) }}>
                    {{ $post->title }}
                </a>
                <p class="body">{{ $post->body }}</p>
                <button onclick="location.href='/posts/{{ $post->id }}/edit'">
                    編集
                </button>
                
                <form action="/posts/{{ $post->id }}" method="post">
                @csrf
                @method('delete')
                    <button type="submit" onclick='return confirm("are you sure?")'>
                        削除
                    </button>
                </form>
                
            </div>
            @endforeach
        </div>
        <div class="paginate">
            {{ $posts->links() }}
        </div>
    </body>
</html>