
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Form Validate</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      input[type='text'],
      input[type='email'],
      button {
        display: block;
        width: 100%;
        padding: 10px 5px;
        margin-bottom: 10px;
      }
      #form {
        width: 300px;
        margin: 0 auto;
      }
      .err {
        color: red;
      }
      input{
        margin-bottom: 5px;
      }
    </style>
  </head>
  <body>
    <?php

      $hasNoFormErr = true;

      $fullNameErr = "";
      $addressErr = "";
      $emailErr = "";
      $imageUploadErr = "";
      $contactNumErr = "";
      $citizenshipNumErr  ="";
      $fathersNameErr = "";

      $fullNameVal = "";
      $addressVal = "";
      $emailVal = "";
      $genderVal = "";
      $imageUploadVal = "";
      $contactNumVal = "";
      $citizenshipNumVal = "";
      $fathersNameVal = "";

      function generateUniqueImageName(){
        return bin2hex(((random_bytes(6))));
      }

      if($_SERVER["REQUEST_METHOD"] === "POST"){
   

        if(empty($_POST["fullname"])){
          $hasNoFormErr = false;
          $fullNameErr = "* fullname cannot be empty";
        }else{
          $hasNoFormErr = true;
          $fullNameErr = "";
          $fullNameVal = $_POST["fullname"];
        }

        if(empty($_POST["address"])){
          $hasNoFormErr = false;
          $addressErr = "* address field cannot be empty";
        }else{
          $hasNoFormErr = true;
          $addressErr  ="";
          $addressVal = $_POST["address"];
        }

        if(empty($_POST["email"])){
          $hasNoFormErr = false;
          $emailErr = "* email field cannot be empty";
        }else{
          $emailErr  ="";
          $hasNoFormErr = true;
          $emailVal = $_POST["email"];
          if(!filter_var($emailVal,FILTER_VALIDATE_EMAIL)){
            $hasNoFormErr = false;
            $emailErr = "* invalid email address";
          }
        }

        $genderVal = $_POST["gender"];

         if(empty($_POST["contactNumber"])){
          $hasNoFormErr = false;
        $contactNumErr = "* contact number field cannot be empty";
       }else{
        $hasNoFormErr = true;
        $contactNumErr  = "";
        $contactNumVal = $_POST["contactNumber"];
       }

       if(empty($_POST["citizenshipNumber"])){
        $hasNoFormErr = false;
        $citizenshipNumErr = "* citizenship number field cannot be empty";
       }else{
        $hasNoFormErr = true;
        $citizenshipNumErr  ="";
        $citizenshipNumVal = $_POST["citizenshipNumber"];
       }
       
       if(empty($_POST["fathersName"])){
        $hasNoFormErr = false;
          $fathersNameErr = "* fathers name field  cannot be empty";
       }else{
        $hasNoFormErr = true;
        $fathersNameErr  = "";
        $fathersNameVal = $_POST["fathersName"];
       }

        //file upload logic
       if(empty($_FILES["uploadImage"]["name"])){
        $hasNoFormErr = false;
        $imageUploadErr = "* image field cannot be empty";
       }else{
          $hasNoFormErr = true;
          $imageUploadErr  ="";
          $imageUploadVal = $_FILES["uploadImage"]["tmp_name"];
          $imageType = explode("/",$_FILES["uploadImage"]["type"])[1];
          $validImageTypes = array("jpg","jpeg","png");

          if(!in_array($imageType,$validImageTypes)){
            $hasNoFormErr = false;
            $imageUploadErr = "* invalid image extension valid extensions are jpg,png,jpeg";
          }
          
          if($hasNoFormErr){
            move_uploaded_file($imageUploadVal,"uploads/".generateUniqueImageName().'.'.$imageType);
            header("Location: ".$_SERVER["PHP_SELF"]);
            exit;
          }

       }
        
      }

    ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="form"  enctype="multipart/form-data">
      <h1>Question No:1</h1>

      <div class="err" id="fullname_err"><?php echo $fullNameErr; ?></div>
      <input
        type="text"
        id="fullname"
        name="fullname"
        placeholder="Enter FullName"
        value="<?php echo $fullNameVal; ?>"
      />

      <div class="err" id="address_err"><?php echo $addressErr; ?></div>
      <input
        type="text"
        id="address"
        name="address"
        placeholder="Enter Address"
        value="<?php echo $addressVal; ?>"
      />

      <div class="err" id="email_err"><?php echo $emailErr; ?></div>
      <input type="text" placeholder="Enter Email" id="email" name="email" value="<?php echo $emailVal; ?>" />

      <div>
        <p>Select gender</p>
        <label for="male">Male</label>
        <input
        checked
          class="gender_input"
          type="radio"
          name="gender"
          value="male"
          id="male"
        />

        <label for="female">Female</label>
        <input
          class="gender_input"
          type="radio"
          name="gender"
          value="female"
          id="female"
        />

        <label for="others">Others</label>
        <input
          class="gender_input"
          type="radio"
          name="gender"
          value="others"
          id="others"
        />
      </div>

      <div class="err" id="file_err" ><?php echo $imageUploadErr; ?></div>
      <input type="file" name="uploadImage" placeholder="select image"  />

      <div class="err" id="contactNumber_err"><?php echo $contactNumErr; ?></div>
      <input
        type="text"
        name="contactNumber"
        id="contactNumber"
        placeholder="Enter you contact number"
        value="<?php echo $contactNumVal; ?>"
      />

      <div class="err" id="citizenshipNumber_err"><?php echo $citizenshipNumErr; ?></div>
      <input
        type="text"
        name="citizenshipNumber"
        id="citizenshipNumber"
        placeholder="Enter citizenship number"
        value="<?php echo $citizenshipNumVal; ?>"
      />

      <div class="err" id="fathersName_err"><?php echo $fathersNameErr; ?></div>
      <input
        type="text"
        name="fathersName"
        id="fathersName"
        placeholder="Enter father's name"
        value="<?php echo $fathersNameVal; ?>"
      />

      <button type="submit">submit</button>
    </form>

    
    </script>
  </body>
</html>