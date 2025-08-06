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
        <form action="#" method="post">
            <label for="title">Post Title <span style="color:red;">*</span></label>
            <input type="text" id="title" name="title" placeholder="Enter post title" required />

            <label for="content" style="margin-top: 18px;">Post Content</label>
            <textarea id="content" name="content" placeholder="Write your post content here..."></textarea>

            <button type="submit" class="btn-submit">Create Post</button>
        </form>
    </div>

</body>

</html>
