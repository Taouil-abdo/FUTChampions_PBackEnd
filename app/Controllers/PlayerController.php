<?php

include __DIR__.'/../Models/Players.php';

class PlayerController{

    public static function showPlayers()
    {
        $rows = Players::getData();
        return $rows;
    }


    public static function countAllPlayers(){
        $totalPlayers = Players::countAllPlayers();
        return $totalPlayers;

    }

    public static function getAllNationalities(){
        $nationalites=Players::getAllNationalities();
        return $nationalites;
    }

    public static function getAllClubs(){
        $Clubs=Players::getAllClubs();
        return $Clubs;
    }


///delete
    public static function delete(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
           $id=$_GET['id'];
           Players::delete($id);
        }
    }

// addPLayer
    public static function addNewPlayer(){

        if (isset($_POST['add']) && $_SERVER["REQUEST_METHOD"] == "POST") {
            $result = Players::addPlayer($_POST, $_FILES);
        }
    }


    public static function getPlayerID(){

        if (isset($_GET['player_id']) && !empty($_GET['player_id'])) {
            $id=$_GET['player_id'];
            $selectedplayer = Players::getPlayerID($id);
        }

        return $selectedplayer;
    }
//////update

    public static function updatePlayer(){

        if(isset($_POST['update'])) {
           $id=$_GET['player_id'];
           Players::updatePlayer($_POST,$_FILES,$id);
        }
    }

}


  
