<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="floor.css">
</head>
<body>
    
    <?php
        require "db.php";
        $floor = $_GET["floor"];
        //getting room information of the floor from database 
        $rooms = $db->query("select rno, status from rooms 
                            where floor = {$floor}
                            ")->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
        <div>
            <h1>
                Choose Room
            </h1>
        </div>

        <!-- showing all the rooms of the floor in the screen and their colors according to their statuses, when any room is clicked, it redirects to the appropriate room page -->
        <div class="row">
            <?php foreach ($rooms as $room) : ?>
                <!-- setting the color of the room -->
                <?php $roomcolor = "red"; if($room["status"]==0){$roomcolor = "green";} elseif($room["status"]==1){$roomcolor = "yellow";} ?>
                <a href="room.php?room=<?= $room["rno"]?>"><div class="roombox <?= $roomcolor ?> col s1 offset-s1"><?= $room["rno"]?></div></a>
            <?php endforeach ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>