 <?php 
  session_start();
  require('dbconfig/config.php');
  if (@$_SESSION["username"]) {
  include("header.php"); 
  include("search1.php");
  }
 ?>
 <html>
     <head>
          <title>Seek Study Post</title>
          <link rel = "stylesheet" href = "css/style.css">
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     </head>
     <body>
          <div style="position: absolute; top:40px">
               <br />
               <br />
               <h2>Study Post</h2>
               <div class="form-group">
                    <form name="add_name" id="add_name">
                         <div class="table-responsive">
                              <table class="table table-bordered" id="dynamic_field">
                                   <tr>  
                                        <b>Module Code:</b>
                                        <input name = "mod" type = "text"  placeholder = "Enter your module code" required/><br><br>
                                        <b>Prefered location:<br></b>
                                          <input name ="chk[]" type = "checkbox" id = "CLB_btn" value = "CLB"/>CLB<br>
                                          <input name ="chk[]" type = "checkbox" id = "L_btn" value = "Law">Law Library<br>
                                          <input name ="chk[]" type = "checkbox" id = "MU_btn" value = "Music">Music Library<br>
                                             <input name ="chk[]" type = "checkbox" id = "HSSM_btn" value = "HSSM">HSSM Library<br>
                                          <input name ="chk[]"type = "checkbox" id = "Science" value = "Science">Science Library<br>
                                          <input name ="chk[]" type = "checkbox" id = "C_btn" value = "Chinese">Chinese Library <br>
                                          <input name ="chk[]" type = "checkbox" id = "M_btn" value = "Medical">Medical Library<br>
                                          <input name ="chk[]" type = "checkbox" id = "Y_btn" value = "Yale-NUS">Yale-NUS Library</br><br>
                                        <b>Prefered Date:
                                        <input type="date" name="name[]" placeholder="DD/MM" class="form-control name_list" /><br>
                                        <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                   </tr>
                              </table>
                              <br>
                              <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                              <h5>Expired data will not be displayed.</h5>
                              </div>
                    </form>
               </div>
          </div>
     </body>
</html>

<script>
$(document).ready(function(){
     var i=1;
     var j=1;
     $('#add').click(function(){
          i++;
          $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="date" name="name[]" placeholder="DD/MM" class="form-control name_list"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
     });
     $(document).on('click', '.btn_remove', function(){
          var button_id = $(this).attr("id");
          $('#row'+button_id+'').remove();
     });
        $('#submit').click(function(){
          $.ajax({
               url:"add.php",
               method:"POST",
               data:$('#add_name').serialize(),
               success:function(data)
               {
                    alert(data);
                    $('#add_name')[0].reset();
               }
          });
           location.reload();
     });
});
</script>
