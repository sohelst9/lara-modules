<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create New Post</title>
    <style>
        /* Reset some default */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 25px;
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1.8px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            resize: vertical;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #007BFF;
            outline: none;
        }

        textarea {
            min-height: 120px;
        }

        .btn-submit {
            margin-top: 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 14px 25px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        select {
            width: 100%;
            padding: 12px 15px;
            border: 1.8px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            color: #444;
            background-color: white;
            appearance: none;
            /* Remove default arrow */
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23777' viewBox='0 0 16 16'%3E%3Cpath d='M4 6l4 4 4-4z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 12px 12px;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        select:focus {
            border-color: #007BFF;
            outline: none;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .container {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="{{ route('post.index') }}" class="btn">Back</a>
        <h2>Create New Post</h2>
        @if ($errors->any())
            <div class="error-box"
                style="
        background-color: #ffe0e0;
        border: 1px solid #ff5e5e;
        padding: 15px 20px;
        border-radius: 6px;
        margin-bottom: 25px;
        color: #b30000;
    ">
                <strong>There were some errors:</strong>
                <ul style="margin-top: 10px; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <label for="user_id">User <span style="color:red;">*</span></label>
            <select id="user_id" name="user_id">
                <option value="">select</option>
                <option value="1">User 1</option>
                <option value="2">User 2</option>
                <option value="7">User 3</option>

            </select>

            <label for="title" style="margin-top: 18px;">Post Title <span style="color:red;">*</span></label>
            <input type="text" id="title" name="title" placeholder="Enter post title" />

            <label for="content" style="margin-top: 18px;">Post Content</label>
            <textarea id="content" name="content" placeholder="Write your post content here..."></textarea>

            <button type="submit" class="btn-submit">Create Post</button>
        </form>
    </div>

</body>

</html>
