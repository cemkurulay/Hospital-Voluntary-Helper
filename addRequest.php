<?php
require "db.php" ;
//inserting the given request name to the given room
if ( $_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST) ;
    $sql = "insert into requests (roomno, rname) values (?,?)" ;
    $stmt = $db->prepare($sql) ;
    $stmt->execute([$roomno, $requestname]) ;
}
//redirect back to the room page
header("Location: room.php?room=$roomno") ;
?>