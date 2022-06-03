<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
    
<div class="container mt-5">
    <h2 class="text-center">
        Hi {{ $name }}! would you like to Accept the invitation?

        <div class="flex mt-4">
            <span class="accept btn btn-success col-md-6">
                Yes
            </span>
            <span class="rejected btn btn-danger col-md-6">
                No
            </span>
        </div>
    </h2>
</div>


<script type="text/javascript">

    document.querySelector('.rejected').addEventListener('click', ()=> {
        window.close()
    })
  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      
    $(".accept").click(function(){
        const id = parseInt(window.location.pathname.split("/")[2]);
        const name = window.location.pathname.split("/")[3].replace('%20', ' ');
        const email = window.location.pathname.split("/")[4];
        const course_code = window.location.pathname.split("/")[5];
  
        $.ajax({
            type:'POST',
            url:"{{ route('ajax.send.invitation') }}",
            data:{
               id:id,
               name:name,
               email:email,
               course_code:[course_code],
            },
            success:function(data){
                alert(data.accepted);
            }
        });

    });
  
</script>

</body>
</html>
