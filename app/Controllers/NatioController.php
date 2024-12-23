<?php

include __DIR__.'/../Models/Nationalities.php';

class NatioController{


    public static function getNationalityData(){

        $rows = Nationalities::getNationalityData();
        return $rows;

    }
    public static function deleteNationality(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id=$_GET['id'];
            Nationalities::deleteNationality($id);
        }
    }
    public static function addNationality(){
        if (isset($_POST['addNat']) && $_SERVER["REQUEST_METHOD"] == "POST") {
            Nationalities::addNationality($_POST,$_FILES);
        }
    }
    
    public static function getNationalityID(){
        if (isset($_GET['nationality_id']) && !empty($_GET['nationality_id'])) {
            $id=$_GET['nationality_id'];
            $nat=Nationalities::getNationalityID($id);
        }

        return $nat;
    }
    
    public static function updateNationality(){
        if(isset($_POST['update'])) {
            $id=$_GET['nationality_id'];
            Nationalities::updateNationality($_POST,$_FILES,$id);
          }
    }
    
    

    
    
    

    
}