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


<div class="container mt-4 ">
    <h1>Detail Todo List</h1>
    <?php
        $todoID = $_GET["todoID"];
        if($todoID!=""){
            $todo = getTodoListWithID($todoID);
            $tempDate = date_create($todo["reminder_date"]);
            $showDate = date_format($tempDate, "d F Y");
    ?>
    
        <div class="card" style="width: 48 rem;">
        <div class="card-body">
            <div class="row">
                <div class="col-sm">
                    <h4 class="card-title mt-4 mb-4"><?=$todo["title"]?></h4>
                    <p class="card-text"><?=$todo["notes"]?></p>
                    <p class="card-text">Category : <?=$todo["category"]?></p>
                    <p class="card-text">Reminder date : <?=$showDate?></p>
                    <a href="index.php" class="btn btn-primary mt-4">Back to List</a>


                </div>
                <?php 
                if ($todo["photo"]!="" ) {
                ?>
                    <div class="col-sm">
                    <img src="<?=$todo["photo"]?>" class="card-img-top img-thumbnail rounded" alt="...">  
                    </div>
                <?php
                }
                ?>
               
            </div>
        </div>
        </div>
    <?php 

    }

    ?>

</div>
</body>
</html>