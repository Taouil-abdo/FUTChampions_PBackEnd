<?php

// include "Players.php";

$player = new Players();
$rows = $player->getData();

///delete
if(isset($_GET['player_id']) && !empty($_GET['player_id'])){
    $id=$_GET['player_id'];
    $player->delete($id);
}

// addPLayer
if (isset($_POST['add']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $result = $player->addPlayer($_POST, $_FILES);
}

//////update
// if(isset($_GET['player_id'])){
//     $id=$_GET['player_id'];
//     $playerID = $player->getPlayerID($id);

//     var_dump($playerID);

// }

