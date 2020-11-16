<?php
require "db.php" ;
//update the status of the given room
if ( $_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST) ;
    $sql = "update rooms set status = ? where rno = ?" ;
    $stmt = $db->prepare($sql) ;
    $stmt->execute([$roomstatus, $roomno]) ;
}
//redirect back to the room page
header("Location: room.php?room=$roomno") ;
?>