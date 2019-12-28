 <?php 
    include("header.php");
    include("search2.php");
 ?>
 <html>
     <head>
          <title>Seek Sports Post</title>
          <link rel = "stylesheet" href = "css/style.css">
          
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     </head>
     <body>
          <div  style="position: absolute; top:40px">
               <br />
               <br />
               <h2 align="center">Sports Post</h2>
               <div class="form-group">
                    <form name="add_name" id="add_name">
                         <div class="table-responsive">
                              <table class="table table-bordered" id="dynamic_field">
                                   <tr>
                                        <b>Sports:
                                          <select id = "sportsn" onchange = "getSelectValue();">
                                            <option value = "Badminton">Badminton</option>
                                            <option value = "Basketball">Basketball</option>
                                            <option value = "Floorball">Floorball</option>
                                            <option value = "Table Tennis">Table Tennis</option>
                                          </select><br>
                                          <b>Location:
                                            <select id = "locationn" onchange = "getSelectValue2();">
                                              <option value = "MPSH1">MPSH1</option>
                                              <option value = "MPSH2">MPSH2</option>
                                            </select></br>
                                            <input id="sports3" type="hidden" name="sports3" value="" />
                                            <input id="location3" type="hidden" name="location3" value="" />
                                            <b>Date:
                                            <input type = "date" name = "date">
                                          <script>
                                            function getSelectValue()
                                            {
                                              document.getElementById("sports3").value = document.getElementById("sportsn").value;
                                            }
                                            function getSelectValue2()
                                            {
                                              document.getElementById("location3").value = document.getElementById("locationn").value;
                                            }
                                            getSelectValue();
                                            getSelectValue2();
                                          </script>
                                   </tr>
                              </table>
                              <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /><br>
                            <h5>Expired data will not be displayed.</h5>
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
               url:"add1.php",
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
