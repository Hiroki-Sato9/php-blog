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
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                <button onclick="location.href='/posts/{{ $post->id }}/edit'">
                    編集
                </button>
                
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('delete')
                    <button type="button" onclick='deletePost({{ $post->id }})'>
                        削除
                    </button>
                </form>
                
            </div>
            @endforeach
        </div>
        <div class="paginate">
            {{ $posts->links() }}
        </div>
        <script>
            let deletePost = (id) => {
                'use strict'
                
                if (confirm('削除すると復元できません。\n本当に削除しますか')){
                    document.querySelector(`#form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>