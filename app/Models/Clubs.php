<?php

include_once __DIR__ . '/../config/Database.php';

class clubs {

    public static function getClubData() {

        $db=Database::getInstance();
        $conn=$db->getConnection();

        $query = "SELECT * FROM clubs";
        $result = $conn->query($query);
        if ($result == false) {
            return false;
        }
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public static function deleteClub($club_id){

        $db=Database::getInstance();
        $conn=$db->getConnection();

        $query = "DELETE FROM clubs where club_id = $club_id";
        $result = $conn->query($query);
        if($result == true){
            header("Location:Club.php");
		}else{
			echo "Record does not delete try again";
		    }
    }

    public static function addClub($data, $files) {

        $db=Database::getInstance();
        $conn=$db->getConnection();

        $clubName = $conn->real_escape_string($data['clubName']);

        $club_img = $files['club_img']['name'];
        $temp_file = $files['club_img']['tmp_name'];
        $folder = "../../app/uploads/players/natio/$club_img";
        move_uploaded_file($temp_file, $folder);
    
        $query = "INSERT INTO Clubs (clubName,club_img)VALUES ('$clubName','$club_img')";
           $result = $conn->query($query);

           header("Location:Club.php");

    }

    public static function getclubID($club_id){
        $db=Database::getInstance();
        $conn=$db->getConnection();

        $query = "SELECT * FROM clubs WHERE club_id = $club_id";
        $result = $conn->query($query);
        $rows = $result->fetch_assoc();
        return $rows;
    }

    public static function updateClub($data, $files, $club_id) {
        $db=Database::getInstance();
        $conn=$db->getConnection();

        $clubName = $conn->real_escape_string($data['clubName']);
        $club_img = $files['club_img']['name'];
        $temp_file = $files['club_img']['tmp_name'];
        $folder = "../../app/uploads/players/natio/$club_img";
        move_uploaded_file($temp_file, $folder);
    
        $query = "UPDATE clubs SET clubName = ?, club_img = ? WHERE club_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $clubName,$club_img,$club_id);
        if($stmt->execute()){
            header("Location:Club.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    }


    public static function getClubByID($club_id)
    {
        $db=Database::getInstance();
        $conn=$db->getConnection(); 

        $query="SELECT * FROM Clubs where club_id = $club_id";
        $result=$conn->query($query);
        $rows=$result->fetch_assoc();
        return $rows;

    }

}