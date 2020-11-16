<?php
    require "db.php";
    //extracting get method's data
    $room = $_GET["room"];
    $request = $_GET["request"];

    //deleting the request of the room
    $sql = "delete from requests where roomno = ? and rname like ? " ;
    $stmt = $db->prepare($sql);
    $stmt->execute([$room, $request]);

    //redirecting back to the room page
    header("Location: room.php?room=" . $room ) ;

  