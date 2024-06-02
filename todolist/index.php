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
    <h1>My Todo List</h1>
    <ol class="list-group list-group-numbered">

        <?php
            $all = getAllTodoList();
            while ($todo = $all->fetch_assoc()) {
        ?>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw-bold"><?=$todo["title"]?></div>
                <?=$todo["reminder_date"]?>
                <span class="badge text-bg-primary rounded-pill"><?=$todo["category"]?></span>
                </div>
                <a href="read_detail.php?todoID=<?=$todo["todo_id"]?>">
                  <button type="button" class="btn btn-info">View</button>
                </a>
            </li>
        <?php
            }
        ?>
    </ol>

</div>
</body>
</html>