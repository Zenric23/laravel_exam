
<?php
    $refFiles = [];

    foreach($files as $file) {
    
        if($file->course_code == $courseCode) {
            array_push($refFiles, $file);
        } else {
            continue;
        }
     
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Laravel 8 File Upload Example - Tutsmake.com</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
 
    <div class="container-fluid mt-5">
        <a href="/my-classes">back to classes</a>
        <h2 class="mb-5" style="margin-top: 30px;">Class "{{ $subject->desc }}" resources.</h2>
        <div class="panel-body"> 
            <div class="col-md-8">    
            <!-- @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif -->
        
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ url('upload/image/store/' . $courseCode)}}" method="POST" enctype="multipart/form-data">
            @csrf
                    <div class="col-md-6">
                        <input type="file" name="fileInput" class="form-control">
                    </div>     
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success my-5">Upload</button>
                    </div>     
            </form>
            </div>    
        </div>

        @if (count($refFiles) > 0)
        <p class="text-secondary">Note: click here the filename to download.</p>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">file name</th>
                <th scope="col">course_code</th>
                </tr>
            </thead>
            <tbody>
                @foreach($refFiles as $file)
                    <tr>
                    <td>{{ $file->id }}</td>
                    <td class="text-primary">
                        <a href="{{ $file->path }}">{{ $file->name }}</a>
                    </td>
                    <td>{{ $file->course_code }}</td>
                    
                    <td class="file-link d-none">{{ $file->path }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        @if (count($refFiles) == 0)
        <div class="text-center mt-5">No resources uploaded yet.</div>
        @endif
    </div>

    <script>
        const files = document.querySelectorAll('.file-link');
        
        files.forEach(file=> {
            file.addEventListener('click', (e)=> {
                window.open(e.target.textContent)
            })
        })
    </script>

</body>
</html>