<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
 <div class="container mt-5">
 <h2>Student Form</h2>
 <form id="studentForm" method="post"  action="insert76.php"  >
   <div class="form-group">
		<label  for="program"> Program </label>
  <?php
	  
   include 'conn.php';  
  $sql = "select * from tblprograms "; 
	$rs = $conn->query ($sql); ?>
	 <select  name='program' id='program' class='form-control'> 
	  <option value=''>Select Program </option> 
	<?php 
	while ($row =  $rs->fetch_assoc()) {  ?>
	<option  value=<?php echo $row['programcode'];?> > <?php echo $row['programcode'];?> </option>
     <?php      
	 }
	 ?>
 </select></div> 
 <div id='res' style='color:red;'></div> 
 

<div class="form-group">
<label  for="course">Course</label>
 <?php
$sql = "select * from tblcourse   "; 
	$rs = $conn->query ($sql);  ?>
  <select  name='course' id='course' class='form-control'> 
	  <option value=''>Select Course</option>
<?php 			 
	while ($row =  $rs->fetch_assoc()) {  ?>
	<option   value=<?php echo $row['course'];?> > <?php echo $row['course'];?> </option>
   <?php        }
      ?>                             
 </select> 
	</div>				 	
     <div class="form-group">
     <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" required>
       </div>
      <div class="form-group">
      <label for="email">Email:</label>
       <input type="email" class="form-control" id="email" name="email" required>
         </div>
        <div class="form-group">
        <label for="age">Age:</label>
         <input type="number" class="form-control" id="age" name="age" required>
        </div>
         <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="result"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
   $(document).ready(function() {
   $("#studenForm").submit(function(e) {
    e.preventDefault();
                
        $.ajax({
            type: "POST",
             url: "insert76.php",
           data: $(this).serialize(),
           success: function(res) {
           $("#result").html(res);
              }
                });
            });
        });
    </script>
 
<script type="text/javascript">
$(document).ready(function(){
 $('#program').on('change',function(){
        var program= $(this).val();
         
        if(program){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'program='+program,
              success:function(res){
				  alert(res);
			data= res.split("~");
            $('#course').html(data[0]);
			$('#res').html(data[1]);
             }
            });
	 } 		
	  });					
   });   
 </script> 
</body>
</html>
