<?php

include_once __DIR__ . '/../config/Database.php';


class Nationalities {


    public static function getNationalityData() {
        $db=Database::getInstance();
        $conn=$db->getConnection();

        $query = "SELECT * FROM nationalities";
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

    public static function deleteNationality($Nationality_id){

        $db=Database::getInstance();
        $conn=$db->getConnection();

        $query = "DELETE FROM nationalities where nationality_id = $Nationality_id ";
        $result = $conn->query($query);
        if($result == true){
            header("Location:Nationality.php");
		}else{
			echo "Record does not delete try again";
		    }
    }

    public static function addNationality($data,$files) {
        $db=Database::getInstance();
        $conn=$db->getConnection();

        $Nationality = $conn->real_escape_string($data['Nationality']);
    
        $flag_img = $files['flag_img']['name'];
        $temp_file = $files['flag_img']['tmp_name'];
        $folder = "../../app/uploads/players/$flag_img";
        move_uploaded_file($temp_file, $folder);
    
        $query = "INSERT INTO nationalities (nationality,flag_img) VALUES ('$Nationality', '$flag_img')";
           $result = $conn->query($query);
           header("Location:Nationality.php");
    }


    public static function updateNationality($data, $files, $nationality_id) {
        $db=Database::getInstance();
        $conn=$db->getConnection(); 

        $nationality = $conn->real_escape_string($data['nationality']);
    
        $flag_img = $files['flag_img']['name'];
        $temp_file = $files['flag_img']['tmp_name'];
        $folder = "../../app/uploads/players/$flag_img";
        move_uploaded_file($temp_file, $folder);
    
        $query = "UPDATE nationalities SET nationality = ?, flag_img = ? WHERE nationality_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $nationality,$flag_img,$nationality_id);
        if($stmt->execute()){
            header("Location:Nationality.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    public static function getNationalityID($nationality_id){
        $db=Database::getInstance();
        $conn=$db->getConnection();

        $query = "SELECT * FROM nationalities WHERE nationality_id = $nationality_id";
        $result = $conn->query($query);
        $rows = $result->fetch_assoc();
        return $rows;
    }



    public static function getClubByID($club_id)
    {
        $db=Database::getInstance();
        $conn=$db->getConnection(); 

        $query="SELECT * FROM Clubs where club_id = $club_id";
        $result = $conn->query($query);
        $rows = $result->fetch_assoc();
        return $rows;

    }
}
?>