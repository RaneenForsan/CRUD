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
<tbody>
<?php
$conn = new mysqli('localhost','root','', 'services');
$conn = new mysqli('localhost','root','', 'services');
$result = $conn->query("SELECT * FROM form_data");

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
 exit();   
?>
