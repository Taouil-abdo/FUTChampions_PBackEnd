<?php

include __DIR__.'/../Models/Clubs.php';

class ClubController{


    public static function getClubData(){
        $rows = Clubs::getClubData();
        return $rows;
    }

    public static function deleteClub(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id=$_GET['id'];
            clubs::deleteClub($id);
        }
    }

    public static function addClub(){
        if (isset($_POST['addClub']) && $_SERVER["REQUEST_METHOD"] == "POST") {
            clubs::addClub($_POST, $_FILES);
        }

    }

    public static function getClubByID() {
        if (isset($_GET['club_id']) && !empty($_GET['club_id'])) {
            $id = $_GET['club_id'];
            $clubData = Clubs::getClubByID($id);
        }
        return $clubData; 
    }
    

    public static function updateClub(){
        if(isset($_POST['update'])) {
            $id=$_GET['Club_id'];
            clubs::updateClub($_POST,$_FILES,$id);
          }
    }














}