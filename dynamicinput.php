<html>
<head>
<title>jQuery Add & Remove Dynamically Input Fields in PHP</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-rc1/jquery.min.js"></script>
</head>
<body>
<form name="add_me" id="add_me">
<table id="dynamic">
<input type="text" name="name[]" placeholder="Enter Your Name"/>
<button type="button" name="add" id="add_input">Add</button>
</table>
<input type="button" name="submit" id="submit" value="Submit"/>
</form>
</body>
</html>
<script>
$(document).ready(function(){
 var i=1;
 $('#add_input').click(function(){
 i++;
 $('#dynamic').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter Your Name"/></td><td><button type="button" name="remove" id="'+i+'" class="btn_remove">Remove</button></td></tr>');
 });
 $(document).on('click', '.btn_remove', function(){
 var button_id = $(this).attr("id");
 $('#row'+button_id+'').remove();
 });
 $('#submit').click(function(){
 $.ajax({
 url:"insert.php",
 method:"POST",
 data:$('#add_me').serialize(),
 success: function(data)
 {
 alert(data);
 $('#add_me')[0].reset();
 }
 });
 });
});
</script>
