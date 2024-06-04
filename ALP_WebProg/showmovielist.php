<!-- include once hanya akan manggil 1x, ngecek apakah sblmnya sdh dipanggil -->
<?php include_once("controllermovielist.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <title>MovieList</title>
</head>
<body>

<?php include_once ("navigation.php"); ?>

<div class="grid grid-cols-4 gap-4">
    
    <?php
    $result = readMovielist();
    foreach ($result as $barisdata) {
    ?>
    
    <!-- <?php
        // $all = readMovielist();
        // while ($movie = $all->fetch_assoc()) {
    ?> -->
        <ul>
            <div class="mx-4 my-4 border-2 border-black p-4">
                <img src="<?=$barisdata["image"]?>" alt="">
                <li><?=$barisdata["title"]?></li>
                <li><?=$barisdata["description"]?></li>
                <li><?=$barisdata["genre"]?></li>
                <li><?=$barisdata["duration"]?></li>
                <li><?=$barisdata["release_date"]?></li>
                
                <a href="movielistdetail.php?movieID=<?=$movie["movielist_id"]?>">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                    focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 
                    dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View Detail</button>
                </a>
            </div>
            
        </ul>


    <?php
    }
    ?>
    </div>
</body>
</html>