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

        .search-form {
            margin-bottom: 20px;
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .search-form input[type="text"] {
            flex: 1;
            padding: 8px;
            font-size: 16px;
        }

        .search-form button {
            padding: 8px 16px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="{{ route('post.create') }}" class="btn">Add Post</a>
        <a href="/" class="btn">Go Home</a>
        <div class="search-form">
            <input type="text" id="search_input" placeholder="Search posts...">
            <button id="search_btn">Search</button>
        </div>
        <div id="postlist">
            @include('post::postlist', ['posts', $posts])
        </div>


    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function searchForm(){
            var search = $('#search_input').val();
            $.ajax({
                url: '{{ route('post.search') }}',
                type: 'GET',
                data: {
                    search : search
                },
                success : function(response){
                    $('#postlist').html(response)
                }
            })
        }

        $('#search_input').on('keyup', function(){
            searchForm();
        })

        $('#search_btn').on('click', function(){
            searchForm();
        })
    </script>
</body>

</html>
