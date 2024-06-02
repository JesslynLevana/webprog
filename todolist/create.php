<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>TODO LIST</title>
</head>
<body>
<?php include_once ("navi.php"); ?>

<?php
    if (isset($_POST["createNow"])) {
        $title = $_POST["inputTitle"];
        $notes = $_POST["inputNotes"];
        $catID = $_POST["inputCategory"];
        $remDate = $_POST["inputReminderDate"];

        
        $uploadImage = 1;
        $image_location = "";
        if (isset($_FILES["inputPhoto"])){
            $photo = $_FILES["inputPhoto"];
            $foldername = "image";
            $uploadImage = uploadImage($foldername, $photo);
            $image_location = $foldername."/".htmlspecialchars(basename($photo));
        }

        if ($uploadImage == 1){
            // save to database
            $inserted_id = createTodoList($title, $notes, $catID, $remDate, $image_location);
            header("Location:read_detail.php?todoID=".$inserted_id);
        } else {
            echo $uploadImage;
        }
    }
?>
<div class="container mt-4 mx-4"></div>
    <h1>Create new Todo</h1>
    <form class="row g-3" method="POST" action="create.php">
        <div class="col-12">
            <label for="inputTitle" class="form-label">To do</label>
            <input type="text" class="form-control" name="inputTitle" id="inputTitle">
        </div>
        <div class="col-12">
            <label for="inputNotes" class="form-label">Notes</label>
            <input type="text" class="form-control" name="inputNotes" id="inputNotes">
        </div>
        <div class="col-md-6">
            <label for="inputCategory" class="form-label">Category </label>
            <select id="inputCategory" name="inputCategory" class="form-select">
            <?php
                $all = getAllCategories();
                while ($cat = $all->fetch_assoc()) {
            ?>
                <option value="<?=$cat ["category_id"]?>"><?=$cat["category"]?></option>
            <?php } ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputReminderDate" class="form-label">Reminder Date</label>
            <input type="date" class="form-control" id="inputReminderDate" name="inputReminderDate">
        </div>
        <div class="mb-3">
            <label for="inputPhoto" class="form-label">Image</label>
            <input class="form-control" type="file" id="inputPhoto" name="inputPhoto">
        </div>
       

        <div class="col-12">
            <input type="submit" name="createNow" value="CREATE" class="btn btn-primary">Create</input>
        </div>
    </form>

</div>
</body>
</html>