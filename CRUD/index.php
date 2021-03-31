
<!DOCTYPE html>
 <html>
     <head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <br><div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <center><h3 class="text-muted">Add Services</h3></center>
<form id="fupForm" enctype="multipart/form-data" class="mt-5">
    <div class="form-group">
        <label for="name">Title</label>
        <input type="text" class="form-control" id="Title" name="Title" placeholder="Enter Title" required />
    </div><br>
    <div class="form-group">
        <label for="body">Email</label>
        <input type="text" class="form-control" id="body" name="body" placeholder="Enter email" required />
    </div><br>
    <div class="form-group">
        <label for="file">Image</label>
        <input type="file" class="form-control" id="file" name="file" required />
    </div><br>
    <input type="submit" name="submit" class="btn btn-primary submitBtn mt-3" value="Add Post"/>
</form>
</div>
<div class="col-sm-3"></div>
</div>
<script>
    $(document).ready(function(e){
    // Submit form data via Ajax
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: new FormData(e.target),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },
            success: function(response){ //console.log(response);
                $('.statusMsg').html('');
                if(response.status == 1 &&  response.data !== undefined){
                    let data = response.data,
                        html = `<tr>
     <td  scope="row">0</td>
     <td  scope="row"> ${data.title}</td>
     <td  scope="row">${data.body}</td>
     <td  scope="row"><img src="uploads/${data.file_name}" width="250" height="200"></td>
     <td>
       <span class='delete btn btn-danger' data-id='${data.id}'>Delete</span>
     </td>
    </tr>`;         
                    $('#tbody-container').prepend(html);
                    alert("Data inserted Sucessfully")
                    $('#fupForm')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
});
    

    
</script>

<script>
    // File type validation
$("#file").change(function() {
    var file = this.files[0];
    var fileType = file.type;
    var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'image/jpeg', 'image/png', 'image/jpg'];
    if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
        alert('Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.');
        $("#file").val('');
        return false;
    }
});
</script>
    
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
<table class="table mt-5">
  <thead>
<tr>
 <th>ID</th>
 <th>Email</th>
 <th>Name</th>
 <th>Image</th>
<th>Delete</th>
</tr>
</thead>
<tbody id ="tbody-container">
<?php 
$conn = new mysqli('localhost','root','', 'services');
$result = $conn->query("SELECT * FROM form_data");
if ($result->num_rows > 0) {
$count = 1;
while ($row = $result->fetch_assoc()) {
    $id            =  $row['id'];
    $Title         = $row['Title'];
    $body          =  $row['body'];
    $file_name     =  $row['file_name'];

  ?>
    <tr>
     <td  scope="row"><?= $count; ?></td>
     <td  scope="row"><?= $Title; ?></td>
     <td  scope="row"><?= $body; ?></td>
     <td  scope="row"><img src="uploads/<?=$file_name?>" width="250" height="200"></td>
     <td>
       <span class='delete btn btn-danger' data-id='<?= $id;?>'>Delete</span>
     </td>
    </tr>
  <?php
   $count++;
  }}
 ?>
</tbody>
</table>
</div>
<div class="col-sm-1"></div>
</div>  
    
    
    
    
    
    
    <!--Script-->   
     <script>
$(document).ready(function(){
 // Delete 
 $('.delete').click(function(){
   var el = this;
  
   // Delete id
   var deleteid = $(this).data('id');
 
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'delete_Services.php',
        type: 'POST',
        data: { id:deleteid },
        success: function(response){

          if(response == 1){
	    // Remove row from HTML Table
	    $(el).closest('tr').css('background','tomato');
	    $(el).closest('tr').fadeOut(800,function(){
	       $(this).remove();
	    });
          }else{
	    alert('Invalid ID.');
          }

        }
      });
   }

 });

});
        </script>
                                      
								 

</body>
</html>