@extends('layouts.app')

@section('contents')
<div class="container">    
     <br />
    
<div class="row">
    <form method="post" id="dynamic_form">
        <span id="result"></span>
        <table class="striped" id="user_table">
    <thead>
    <tr>
        <th width="35%">Name</th>
        <th width="35%">Name Bangla </th>
        <th width="35%">Links  </th>
        <th width="30%">Action</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
    <tr>
                    <td></td>
                    <td>
                @csrf
                <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
        </td>
    </tr>
    </tfoot>
</table>
    </form>
   </div>
  </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <script>
$(document).ready(function(){

 var count = 1;

 dynamic_field(count);

 function dynamic_field(number)
 {
  html = '<tr>';
        html += '<td><input type="text" name="name[]" class="form-control" /></td>';
        html += '<td><input type="text" name="name_bn[]" class="form-control" /></td>';
        html += '<td><input type="text" name="links[]" class="form-control" /></td>';
        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            $('tbody').append(html);
        }
        else
        {   
            html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
            $('tbody').html(html);
        }
 }

 $(document).on('click', '#add', function(){
  count++;
  dynamic_field(count);
 });

 $(document).on('click', '.remove', function(){
  count--;
  $(this).closest("tr").remove();
 });

 $('#dynamic_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'{{ route("headers.store") }}',
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
                $('#save').attr('disabled','disabled');
            },
            success:function(data)
            {
                if(data.error)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                }
                else
                {
                    dynamic_field(1);
                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                }
                $('#save').attr('disabled', false);
            }
        })
 });

});
</script>   
@endsection