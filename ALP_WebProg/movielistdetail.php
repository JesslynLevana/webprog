<?php include_once ("controllermovielist.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>TODO LIST</title>
</head>
<body>
<?php include_once ("navigation.php"); ?>


<div class="container mt-4 ">
    <h1>Movie Detail</h1>
    <?php
        $movieID = $_GET["movieID"];
        if($movieID!=""){
            $movie = getMovieWithID($movieID);
            $tempDate = date_create($movie["reminder_date"]);
            $showDate = date_format($tempDate, "d F Y");
    ?>
    


        <div class="card" style="width: 48 rem;">
        <div class="card-body">
            <div class="row">
                <div class="col-sm">
                    <h4 class="card-title mt-4 mb-4"><?=$movie["title"]?></h4>
                    <img src="<?=$movie["image"]?>" alt="">
                    <p class="card-text"><?=$movie["description"]?></p>
                    <p class="card-text">Genre : <?=$movie["genre"]?></p>
                    <p class="card-text">Duration : <?=$movie["duration"]?></p>
                    <p class="card-text">Release date : <?=$showDate?></p>
                    <a href="showmovielist.php" class="btn btn-primary mt-4">Back to Movie List</a>


                </div>
                <?php 
                if ($movie["image"]!="" ) {
                ?>
                    <div class="col-sm">
                    <img src="<?=$movie["image"]?>" class="card-img-top img-thumbnail rounded" alt="...">  
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