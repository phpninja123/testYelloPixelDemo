<?php
    @session_start();
    @define('SLIDER_PATH', 'http://52.26.13.216/Admin/uploads/');
    @define('IMAGE_PATH', 'http://52.26.13.216/Admin/ProjectImage/');

    // Check if image file is a actual image or fake image
     $_REQUEST['target'] = $_REQUEST['table'];
     $uniqueFileName = uploadFile();
     if( $uniqueFileName || !empty($_POST['id']))
     {
        // echo "The file ". basename( $uniqueFileName). " has been uploaded.";
        //echo('ID passed: '.$_REQUEST['id']);
        //echo .$_REQUEST['table'];
        $name = array();
       //echo($_REQUEST['target']); die();
        switch($_REQUEST['target'])
        {
            case 2:
                //$temp = $_REQUEST["#txtImgCat option:selected"];
                $name[0] = $_REQUEST["ddselectBox"];
                $name[1] = ( $uniqueFileName != 1 ) ? $uniqueFileName : '';
                if(isset($_REQUEST['chkBox'])){
                    $name[2] = 1;
                }
                else{
                    $name[2] = 0;
                }
                //$name[2]= $_REQUEST['id'];
                //$_REQUEST['name'] = $name;
                 if(!empty($_REQUEST['id']))
                {
                    $_REQUEST['operation'] = 'update';            
                }
                else
                {
                    $_REQUEST['operation'] = "new";
                }
                $_REQUEST['name'] = $name;
                //print_r($name); die();
                break;
            case 4:
                $name[0] = ( $uniqueFileName != 1 ) ? $uniqueFileName : '';
                //$name[1]= $_REQUEST['id'];
                //print_r($name); die();
                
                $_REQUEST['name'] = $name;
                if(!empty($_REQUEST['id']))
                {
                    $_REQUEST['operation'] = 'update';            
                }
                else{
                     $_REQUEST['operation'] = "new";
                }
                //echo ($_REQUEST['operation']);
                break;
        }
        
        require_once('php/DAO.php');
    } 
    else 
    {
        //echo "Sorry, there was an error uploading your file.";
        $_SESSION['error_message'] = 'Sorry, we cannot create this record right now, pls try later.';
        echo "<script>window.location = 'slider.php';</script>"; 
    }
        


function uploadFile()
{
    if(!empty($_FILES["fileToUpload"]["name"]))
    {
        $target_dir = '';
        $target_file = '';
        $string = str_replace(' ', '', $_FILES["fileToUpload"]["name"]);
        $originalFileName = $string;
        $fileNameData = explode(".", $originalFileName);
        $uniqueFileName = $fileNameData[0].mt_rand(1111111, 999999999).date("Y-m-d_h-i-s").'.'.$fileNameData[1]; 
        
        switch($_REQUEST['target'])
        {
            case 2:
                $target_dir = "ProjectImage/";
                $target_file = $target_dir . $uniqueFileName;
                //print_r('file name: '.$uniqueFileName); 
            break;
            case 4:
                $target_dir = "uploads/";
                $target_file = $target_dir . $uniqueFileName;
            break;

        }
        
        $uploadOk = 1;
        $imageFileType = pathinfo($target_dir.$originalFileName,PATHINFO_EXTENSION);
        // print_r($imageFileType); die();
        // Allow certain file formats
        $error = '';
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
        {
            $error .= "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        
        if($check !== false) 
        {
            $error .= "<br><p>File is an image - " . $check["mime"] . ".</p>";
            $uploadOk = 1;
        } 
        else 
        {
            $error .= "<br><p>File is not an image.</p>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) 
        {
            $error .= "<br>Sorry, your file was not uploaded.";
            die();
            $_SESSION['error_message'] = $error;
            return false;
            //echo "<button>back</button>";
        } 
        else // if everything is ok, try to upload file
        {
            // print_r($_FILES["fileToUpload"]["tmp_name"]);
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
            {
                return $uniqueFileName;
            }
        }
    }
    else
    {
        return true; // For Update case
    }
}

?>