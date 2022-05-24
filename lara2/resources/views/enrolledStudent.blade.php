
<?php
$enrollledStudents = [];

foreach($students as $student) {
    $subject_codes = json_decode($student->subject_codes, true);

    if (in_array($courseCode, $subject_codes)) {
        array_push($enrollledStudents, $student);
    } else {
        continue;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        
        <a class="mb-5 d-block" href="/my-classes">back to classes</a>
        <h1>Student of "{{ $subjectWew->desc }}" Class.</h1>
        
        @if (count($enrollledStudents) > 0)
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrollledStudents as $student)
                    <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    </tr>
                @endforeach
            </tbody>
         </table>
        @endif      

        @if (count($enrollledStudents) == 0)
        <div class="text-center mt-5">
                No student enrolled.
        </div>
        @endif  
        

        
    </div>

</body>
</html>