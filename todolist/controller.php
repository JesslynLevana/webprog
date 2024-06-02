<?php 

// open connection to DB
function connectDB() {
    $hostname = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "todolist";
    $conn = mysqli_connect($hostname, $username, $password, $database) or die("Error connect to Database");
    return $conn;
}

// close DB
function closeDB($conn) {
    mysqli_close($conn);
}

function getAllTodoList() {
    $koneksi = connectDB();
    $sql = "SELECT * FROM `todo`, category WHERE todo.category_id = category.category_id;";
    $result = mysqli_query($koneksi, $sql);
    closeDB($koneksi);
    return $result;
}

// teruma parameter id
function getTodoListWithID($id) {
    $result = NULL;
    $koneksi = connectDB();
    $sql = "SELECT * FROM `todo`, category WHERE todo.category_id = category.category_id
    AND todo_id=".$id;
    $allData = mysqli_query($koneksi, $sql);

    if ($allData != NULL) {
        $result = $allData->fetch_assoc();
    }
    closeDB($koneksi);
    return $result;
}

function createTodoList($title, $notes, $catID, $remDate, $photo_location) {
    $koneksi = connectDB();
    $sql = "INSERT INTO `todo` (`todo_id`, 
                        `title`, 
                        `notes`, 
                        `photo`, 
                        `reminder_date`, 
                        `category_id`)  
                    VALUES (NULL, 
                        '$title', 
                        '$notes', 
                        '$photo_location', 
                        '$remDate', 
                        '$catID');";
    $result = mysqli_query($koneksi, $sql);

    if ($result ==  1){
        $result = mysqli_insert_id($koneksi);
    }
    closeDB($koneksi);
    return $result;
}


 function getAllCategories() {
    $koneksi = connectDB();
    $sql = "SELECT * FROM `category`";
    $result = mysqli_query($koneksi, $sql);
    closeDB($koneksi);
    return $result;
}

function uploadImage($foldername, $photoFile) {

    $target_dir = $foldername."/";
    $target_file = $target_dir . basename($photoFile["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $result = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
        $result = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($photoFile["size"] > 500000) {
        $result = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $result = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $result .= "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($photoFile["tmp_name"], $target_file)) {
            $result = 1;
        } else {
            $result = "Sorry, there was an error uploading your file.";
        }
    }
    return $result;
}
?>