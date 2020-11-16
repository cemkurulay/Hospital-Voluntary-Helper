<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="hospital.css">
</head>
<body>

    <?php
        require "db.php";
        //get floors from database
        $floors = $db->query("select fno from floors order by fno desc")->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <div>
            <h1>
                Choose Floor
            </h1>
        </div>
        <!-- showing all the floors in the screen, when any floor is clicked, it redirects to the appropriate floor page -->
        <div class="row">
            <?php foreach ($floors as $fno) : ?>
                <a class="floora" href="floor.php?floor=<?= $fno["fno"] ?>"><div class="floorbox col s8 offset-s2"><?= $fno["fno"] ?></div></a>
                <div class="row"></div>
            <?php endforeach ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>