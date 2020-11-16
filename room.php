<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- used materialize css framework -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="room.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>
</head>
<body>
    <!-- button for returning back to the hospital page -->
    <a id="returnlink" href="hospital.php"><i class="material-icons">home</i>Return to hospital</a>
    <?php
        require "db.php";
        //getting the information of a room from database
        $room = $_GET["room"];
        $requests = $db->query("select rname from requests 
                            where roomno = {$room}
                            ")->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
        <div>
            <h1>
                Room <?= $room ?>
            </h1>
        </div>

        <div class="row">
            <!-- table that shows the requests -->
            <div class="col s8">
                <table class="striped">
                    <tr style="height:60px" class="grey lighten-5">
                        <th style="width: 50%;">Request</th>
                        <th>Delete</th>
                    </tr>
                    <!-- every request is shown and there is a delete button next to them -->
                    <?php foreach ($requests as $request) : ?>
                        <tr>
                            <td><?= $request['rname'] ?></td>
                            <td>
                                <a href="deleteRequest.php?room=<?= $room ?>&request=<?= $request['rname'] ?>"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
            
            <div class="col s4">
                    <!-- web form to add new request to a room -->
                    <div class="row">
                        <form action="addRequest.php" method="post">
                            <div class="input-field col s8">
                                <input type="hidden" value="<?= $room ?>" name="roomno" />
                                <input placeholder="New Request" id="requestname" name="requestname" type="text" class="validate">
                                <label for="requestname">Request Name</label>
                            </div>
                            <button id="addbtn" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></button>
                        </form>
                    </div>
                    <!-- web form to change the status of a room -->
                    <div class="row">
                        <form action="changeStatus.php" method="post">
                            <div class="input-field col s8">
                                <input type="hidden" value="<?= $room ?>" name="roomno" />
                                <select name="roomstatus">
                                <option value="" disabled selected>Choose room status</option>
                                <option value="1">Full</option>
                                <option value="0">Empty</option>
                                <option value="-1">Do not enter!</option>
                                </select>
                                <label>Room status</label>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit" id="btnchange" name="action">Change
                                <i class="material-icons right">cached</i>
                            </button>
                        </form>
                    </div>
            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        //activating jquery for select box 
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
</body>
</html>