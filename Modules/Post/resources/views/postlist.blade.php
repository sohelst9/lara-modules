@foreach ($posts as $post)
    <h1>{{ $post->title }}</h1>
    <div class="meta">{{ $post->created_at->format('F j, Y, g:i A') }}</div>
    <div class="content">
        <p>{{ $post->content }}</p>
    </div>
    <div class="author">— by {{ $post->user?->name }}</div>
    <a href="" class="editbtn">Edit</a>
    <a href="{{ route('post.destroy', $post->id) }}" class="deletebtn">Delete</a>
@endforeach
