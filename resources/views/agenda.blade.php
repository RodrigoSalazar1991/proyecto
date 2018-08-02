@extends('layouts.app')
 
@section('content')

 <button onclick="backup()">fgfhjghjkhkj</button>
<script type="text/javascript">
  
    function backup() {
        $.ajax({
            type: "POST",
            url: '/admin/system/db-backup',
            data: {
               "_token": "{{ csrf_token() }}",
            },
            success: function (result) {
              alert("ok")

            },
            error: function (errors) {

               alert("error");
            }
        });
    }
</script>
<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.0.2/prototype.js"/>



@endsection
 