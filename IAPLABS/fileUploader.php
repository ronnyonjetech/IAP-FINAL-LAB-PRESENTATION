<?php

class  FileUploader{
    private static $target_directory = "uploads/";
    private static $size_limit = 500000;
    private $file_original_name;
    private $file_type;
    private $file_size;
    private $final_file_name;
    private $target_file;

    /**getters and setetrs */
    public function setOriginalName($name){
        $this->file_original_name = $name;
    
    }
    public function getOriginalName(){
        return $this->file_original_name;
    }
    public function setFileType($type){
        $this->file_type = $type;
    }
    public function getFileType(){
        return $this->file_type;
    }
    public function setFileSize($size){
        $this->file_size = $size;
    }
    public function getFileSize(){
        return $this->file_size;
    }
    public function setFinalFileName($final_name){
        $this->final_file_name = $final_name;
    }
    public function getFinalFileName(){
        return $this->final_file_name;
    }

    public function uploadFile(){
        if($this->fileWasSelected()){
        $this->target_file = self::$target_directory . basename($_FILES["profilePic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
            if($this->fileTypeIsCorrect()){
                if($this->fileSizeIsCorrect()){
                    if(!$this->fileAlreadyExists()){
                        return $this->saveFilePathTo();
                    }
                }
            }
        }
        else{ return false;}
    }
    //checks if file already exists
    public function fileAlreadyExists(){
        if (file_exists($this->target_file)) {
            session_start();
            $_SESSION['form_errors'] = "Profile Image file Already exists";
            header("Refresh:0");
            die();
            return true;
          }else{ return false; }
    }

    public function saveFilePathTo(){
        if(move_uploaded_file($_FILES["profilePic"]["tmp_name"], $this->target_file)){
            return true;
        }else{ 
            session_start();
            $_SESSION['form_errors'] = "An error occured in uploading Profile image! Try Again";
            header("Refresh:0");
            die();
            return false;
        }
    }

    public function moveFile(){}
    //Checks if image file is a actual image or fake image file
    public function fileTypeIsCorrect(){
        
        $check = getimagesize($_FILES["profilePic"]["tmp_name"]);
        if($check !== false) {
            return true;
        } else {
            session_start();
            $_SESSION['form_errors'] = "Profile Image file is not an Image! Please upload an Iamge";
            header("Refresh:0");
            die();
            return false;
        }
    }
    //checks if file size is allowed
    public function fileSizeIsCorrect(){
        $this->file_size = $_FILES["profilePic"]["size"];
        if ($this->getFileSize() > self::$size_limit) {
            session_start();
            $_SESSION['form_errors'] = "Your Profile Image file was too large";
            header("Refresh:0");
            die();
            return false;
          }else{ return true; }

    }
    //checks if file was selected
    public function fileWasSelected(){
    if(empty($_FILES["profilePic"])){
        session_start();
        $_SESSION['form_errors'] = "Please select a profile image file.";
        header("Refresh:0");
        die();
        return false;
    }else{ return true; }
    }

}

?>