<?php

include_once __DIR__ . '/../config/Database.php';


class Players {


    public static function getData() {
        $db=Database::getInstance();
        $conn=$db->getConnection();
        
        $query = "SELECT p.*,n.*,c.* FROM Players p join Clubs c on p.club_id=c.club_id join nationalities n on p.nationality_id=n.nationality_id ";
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

    public static function delete($player_id){

        $db=Database::getInstance();
        $conn=$db->getConnection();

        $query = "DELETE FROM Players where player_id = $player_id ";
        $result = $conn->query($query);
        if($result == true){
            header("Location:Player.php");
		}else{
			echo "Record does not delete try again";
		    }
     }



     // Add a player
     public static function addPlayer($data, $files) {

        $db=Database::getInstance();
        $conn=$db->getConnection();

        $fullName = $conn->real_escape_string($data['fullName']);
        $status = $conn->real_escape_string($data['status']);
        $position = $conn->real_escape_string($data['position']);
        $rating =  (int) $data['rating'] ;
        $pace =  (int) $data['pace'] ;
        $shooting = (int) $data['shooting'] ;
        $passing = (int) $data['passing'] ;
        $dribbling = (int) $data['dribbling'] ;
        $defending = (int) $data['defending'] ;
        $physical = (int) $data['physical'] ;
        $diving = (int) $data['diving'] ;
        $handling =  (int) $data['handling'] ;
        $kicking = (int) $data['kicking'] ;
        $reflexes =  (int) $data['reflexes'] ;
        $speed =  (int) $data['speed'] ;
        $positioning =  (int) $data['positioning'] ;
        $nationality_id = (int) $data['nationality_id'];
        $club_id = (int) $data['club_id'];
    
        $player_img = $files['player_img']['name'];
        $temp_file = $files['player_img']['tmp_name'];
        $folder = "../../app/uploads/players/$player_img";
        move_uploaded_file($temp_file, $folder);
    
        $query = "INSERT INTO players (fullName, status, position,player_img, rating, pace, shooting, passing, dribbling, defending, physical, diving, handling, kicking, reflexes, speed, positioning, nationality_id, club_id)
                  VALUES ('$fullName', '$status', '$position','$player_img', $rating, $pace, $shooting, $passing, $dribbling, $defending, $physical, $diving, $handling, $kicking, $reflexes, $speed, $positioning, $nationality_id, $club_id)";
    
        if ($conn->query($query)) {
            header("Location:Player.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
    

// Update player
public static function updatePlayer($data, $files, $player_id) {
        $db=Database::getInstance();
        $conn=$db->getConnection();

    $fullName = $conn->real_escape_string($data['fullName']);
    $status = $conn->real_escape_string($data['status']);
    $position = $conn->real_escape_string($data['position']);
    $rating = (int) $data['rating'];
    $pace = (int) $data['pace'];
    $shooting = (int) $data['shooting'];
    $passing = (int) $data['passing'];
    $dribbling = (int) $data['dribbling'];
    $defending = (int) $data['defending'];
    $physical = (int) $data['physical'];
    $nationality_id = (int) $data['nationality_id'];
    $club_id = (int) $data['club_id'];

    $player_img = $files['player_img']['name'];
        $temp_file = $files['player_img']['tmp_name'];
        $folder = "../../../app/uploads/players/$player_img";
        move_uploaded_file($temp_file, $folder);

    $query = "UPDATE players SET fullName = ?, status = ?, position = ?, player_img = ?,  rating = ?, pace = ?, shooting = ?, passing = ?, dribbling = ?, defending = ?, physical = ?, nationality_id = ?, club_id = ? WHERE player_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssiiiiiiiiii", $fullName, $status,  $position,$player_img, $rating, $pace, $shooting, $passing, $dribbling, $defending, $physical, $nationality_id, $club_id, $player_id);

    if ($stmt->execute()) {
        header("Location:Player.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}


public static function getPlayerID($player_id){
    $db=Database::getInstance();
        $conn=$db->getConnection();
    $query = "SELECT * FROM Players WHERE player_id = $player_id";
    $result = $conn->query($query);
    $rows = $result->fetch_assoc();
    return $rows;
}

public static function countAllPlayers() {
    $db=Database::getInstance();
        $conn=$db->getConnection();
    $query = "SELECT COUNT(*) AS total_players FROM Players";
    $result = $conn->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total_players'];
    } else {
        return "Error counting players: " . $conn->error;
    }
}


public static function getAllNationalities()
{
        $db=Database::getInstance();
        $conn=$db->getConnection();

    $nationalitiesAll = $conn->query("SELECT nationality_id, nationality FROM nationalities");
    $nationalities = array();
    while ($nationality = $nationalitiesAll->fetch_assoc()) {
        $nationalities[]=$nationality;
    }
      return $nationalities;

}

public static function getAllClubs()
{
        $db=Database::getInstance();
        $conn=$db->getConnection();
    $ClubsAll = $conn->query("SELECT * FROM Clubs");
    $Clubs = array();
    while ($Club = $ClubsAll->fetch_assoc()) {
    
        $Clubs[]=$Club;
    }
      return $Clubs;

}




}
?>
