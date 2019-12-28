<?php include("header.php");
    include("search3.php");
    ?>
 <html>
     <head>
          <title>Seek Roommate Post</title>
          <link rel = "stylesheet" href = "css/style.css">
        
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     </head>
     <body>
          <div  style="position: absolute; top:40px; width: 20%">
               <br />
               <br />
               <h2 align="center">Roommate Post</h2>
               <div class="form-group">
                    <form name="add_name" id="add_name">
                         <div class="table-responsive">
                              <table class="table table-bordered" id="dynamic_field">
                                   <tr>
                                        <b>Hall of residence:
                                          <select id = "halll" onchange = "getSelectValue3();">
                                            <option value = "Eusoff">Eusoff</option>
                                            <option value = "Kent Ridge">Kent Ridge</option>
                                            <option value = "KE VII">KE VII</option>
                                            <option value = "Raffles">Raffles</option>
                                            <option value = "Sheares">Sheares</option>
                                            <option value = "Temasek">Temasek</option>
                                          </select><br>
                                          <b>Gender:
                                            <select id = "genderr" onchange = "getSelectValue4();">
                                              <option value = "Male">Male</option>
                                              <option value = "Female">Female</option>
                                            </select></br>
                                            <input id="hall0" type="hidden" name="hall0" value="" />
                                            <input id="gender0" type="hidden" name="gender0" value="" />
                                          <script>
                                            function getSelectValue3()
                                            {
                                              document.getElementById("hall0").value = document.getElementById("halll").value;
                                            }
                                            function getSelectValue4()
                                            {
                                              document.getElementById("gender0").value = document.getElementById("genderr").value; 
                                            }
                                            getSelectValue3();
                                            getSelectValue4();
                                          </script>
                                        <b>Course:<br>
                                          <input name = "course" type = "text" width = "30%" placeholder = "Enter your course" required><br>
                                        <b>Self Description:</br>
                                        <input name = "chk[]" type = "checkbox" id = "C1_btn" value = "Outgoing">Outgoing
                                        <input name = "chk[]" type = "checkbox" id = "C2_btn" value = "Quiet">Quiet
                                        <input name = "chk[]" type = "checkbox" id = "C3_btn" value = "Studious">Studious
                                        <input name = "chk[]" type = "checkbox" id = "C4_btn" value = "Sporty">Sporty<br>
                                        </br>
                                        <b>Prefered Roommate Type:</br>
                                        <input name = "chk2[]" type = "checkbox" id = "R1_btn" value = "Outgoing">Outgoing
                                        <input name = "chk2[]" type = "checkbox" id = "R2_btn" value = "Quiet">Quiet
                                        <input name = "chk2[]" type = "checkbox" id = "R3_btn" value = "Studious">Studious
                                        <input name = "chk2[]" type = "checkbox" id = "R4_btn" value = "Sporty">Sporty<br><br>
                                        <center>
                                        <b>Self description:<br>
                                          <textarea name = "interest" style="resize:none; width=60%"; rows="10"; cols="40"></textarea>
                                          </center>
                                   </tr>
                              </table>
                              <table class = "table table-bordered" id = "dynamic_field2"></table>
                              <center>
                              <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                             </center>
                         </div>
                    </form>
               </div>
          </div>
     </body>
</html>
<script>
$(document).ready(function(){
     $('#submit').click(function(){
          $.ajax({
               url:"add2.php",
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
