<?php
require_once "function.php";
require_once "subject.class.php";

$asignatura_code = $asignatura_name = $asignatura_type = '';
$asignatura_codeErr = $asignatura_nameErr = $asignatura_typeErr = '';

$subjectlist = new Asignatura();

if (($_SERVER ['REQUEST_METHOD'] == 'POST') && !empty("ddd")){
    $asignatura_code = clean_input($_POST['asignatura_code']);
    $asignatura_name = clean_input($_POST['asignatura_name']);
    $asignatura_type = clean_input($_POST['asignatura_type']) ? clean_input($_POST['asignatura_type']): '';
    

  
if(empty($asignatura_code)){
    $asignatura_codeErr = 'this is required';
}

if(empty($asignatura_name)){
    $asignatura_nameErr = 'this is required';
}

if(empty($asignatura_type)){
    $asignatura_typeErr = 'this is required';
}

if(empty($asignatura_codeErr) && empty($asignatura_nameErr) &&  empty($asignatura_typeErr)){
$subjectlist ->asignatura_code = $asignatura_code;   
$subjectlist ->asignatura_name = $asignatura_name;
$subjectlist ->asignatura_type = $asignatura_type;

if($subjectlist->addsub()){
    echo "ADDED successfully";
    header("Refresh:3; url=subject.php");
    exit;
} else {
    // Display an error message if something went wrong during insertion
    echo 'Something went wrong when adding the new product. ';
}

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <style>
        /* Error message style */
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <!-- Form to collect product details -->
    <form action="" method="post">
        <!-- Span is for ERROR indication -->
        <!-- Label is for NOTE whats in the Field -->
        <!-- Input is for INPUTING -->
        <span class="error">* are required field</span>
        <br>
        <label for="asignatura_code">asignatura_code</label><span class="error">*</span>
        <br>
        <input type="text" name="asignatura_code" id="asignatura_code" value="<?= $asignatura_code?>">
        <br>
        <!-- If nameErr is not Empty -->
        <?php if (!empty($asignatura_codeErr)): ?>
            <span class="error"><?= $asignatura_codeErr ?></span><br>
        <?php endif;?>
       
        <label for="asignatura_name">Name</label><span class="error">*</span><br>
        <input type="text" name=asignatura_name id=asignatura_name value="<?=$asignatura_name?>">
        <br>
        <?php
        if(!empty($asignatura_nameErr))?>
            <span" class="error"><?=$asignatura_nameErr?></span>
       <?php
       
       ?>
        
       

        <!-- asignatura_type Dropdown with Validation error -->
        <label for="asignatura_type">asignatura_type</label><span class="error">*</span>
        <br>
        <select name="asignatura_type" id="asignatura_type">
            <option value="">Select asignatura_type</option>
            <option value="normal"<?= (isset($asignatura_type) && $asignatura_type == 'normal') ? 'selected=true' : ''?>>normal</option>
            <option value="easy" <?= (isset($asignatura_type) && $asignatura_type == 'easy') ? 'selected=true' : ''?>>easy</option>
        </select>
        <br>
        <?php if (!empty($asignatura_typeErr)): ?>
            <span class="error"><?= $asignatura_typeErr ?></span>
            <br>
        <?php endif; ?>

       
        <!-- Submit Button -->
        <input type="submit" value="Add Book">
    </form>
</body>
</html>

