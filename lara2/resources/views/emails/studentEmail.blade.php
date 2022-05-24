<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>

    <h1>Hi, {{ $user->name }}</h1>
    <p>{{ $user->email }}</p>


    <p class="name" style="display: none;">{{ $user->name }}</p>
    <p class="email" style="display: none;">{{ $user->email }}</p>

    <p>I'm inviting you to my class.</p>

    <a href="http://127.0.0.1:8000/invitation/{{ $user->name }}/{{ $user->email }}/{{ $course_code }}">
        Click here to decide.
    </a>
     
    <p>Thank you</p>

</body>
</html>