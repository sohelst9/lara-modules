<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Post Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #212529;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            font-size: 36px;
            color: #343a40;
        }

        .meta {
            color: #6c757d;
            margin-bottom: 20px;
        }

        .content {
            font-size: 18px;
            line-height: 1.6;
        }

        .author {
            margin-top: 40px;
            font-style: italic;
            color: #555;
            text-align: right;
        }

        .btn {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 25px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .editbtn {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 15px;
            background-color: #29e309;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .deletebtn {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 15px;
            background-color: #e91139;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="{{ route('post.create') }}" class="btn">Add Post</a>
        <a href="/" class="btn">Go Home</a>
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


    </div>



</body>

</html>
