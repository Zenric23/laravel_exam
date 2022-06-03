<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-5">Class "{{ $courseName->desc }}" resources</h1>
    <a href="/enrolled-classes">back</a>
    <p class="text-secondary mt-5">Note: click the filename to download.</p>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Course_code</th>
        </tr>
      </thead>
      <tbody>
      @foreach($resources as $item)
        <tr>
          <td class="text-primary" style="cursor: pointer;">{{ $item->name }}</td>
          <td>{{ $item->course_code }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
</div>
</body>
</html>