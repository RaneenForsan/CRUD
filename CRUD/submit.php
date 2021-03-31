<?php 
$uploadDir = 'uploads/'; 
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
 
// If form is submitted 
if(isset($_POST['Title']) || isset($_POST['body']) || isset($_POST['file'])){ 
    // Get the submitted form data 
    $Title = $_POST['Title']; 
    $body = $_POST['body']; 
     
    // Check whether submitted data is not empty 
    if(!empty($Title)){ 
        // Validate body 
        if(empty($body)){ 
            $response['message'] = 'Please enter a valid email.'; 
        }else{ 
            $uploadStatus = 1; 
             
            // Upload file 
            $uploadedFile = ''; 
            if(!empty($_FILES["file"]["name"])){ 
                 
                // File path config 
                $fileName = basename($_FILES["file"]["name"]); 
                $targetFilePath = $uploadDir . $fileName; 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                 
                // Allow certain file formats 
                $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to the server 
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                        $uploadedFile = $fileName; 
                    }else{ 
                        $uploadStatus = 0; 
                        $response['message'] = 'Sorry, there was an error uploading your file.'; 
                    } 
                }else{ 
                    $uploadStatus = 0; 
                    $response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
                } 
            } 
             
            if($uploadStatus == 1){ 
                // Include the database config file 
                include_once 'dbConfig.php'; 
                // Insert form data in the database 
                $insert = $db->query("INSERT INTO form_data (Title,body,file_name) VALUES ('".$Title."','".$body."','".$uploadedFile."')"); 
                $lastInsertedId = mysqli_insert_id($db);
                if ((int) $lastInsertedId != 0) {//one sec ok
                    $query = $db->query('SELECT * from form_data where id =' . $lastInsertedId);
                    $response['data'] = mysqli_fetch_array($query);
                } 
                if($insert){ 
                    $response['status'] = 1; 
                    $response['message'] = 'Form data submitted successfully!'; 
                } 
            } 
        } 
    }else{ 
         $response['message'] = 'Please fill all the mandatory fields (name and email).'; 
    } 
} 
 
// Return response 
echo json_encode($response);
?>