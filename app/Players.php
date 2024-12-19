<?php

include "Database.php";

class Players extends Database {

    public function __construct(){
        parent::__construct();
    }

    public function getData() {
        $query = "SELECT p.*,nationality,clubName FROM Players p join Clubs c on p.club_id=c.club_id join nationalities n on p.nationality_id=n.nationality_id ";
        $result = $this->conn->query($query);
        if ($result == false) {
            return false;
        }
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function delete($player_id){

        $query = "DELETE FROM Players where player_id = $player_id ";
        $result = $this->conn->query($query);
        if($result == true){
            header("Location:dashboard.php");
		}else{
			echo "Record does not delete try again";
		    }
     }



     // Add a player
public function addPlayer($data, $files) {

    $fullName = $this->conn->real_escape_string($data['FullName']);
    $status = $this->conn->real_escape_string($data['status']);
    $position = $this->conn->real_escape_string($data['position']);
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
    $folder = "../../app/uploads/players/$player_img";
    move_uploaded_file($temp_file, $folder);

    

    $query = "INSERT INTO players (FullName, status, player_img, position, rating, pace, shooting, passing, dribbling, defending, physical, nationality_id, club_id)
              VALUES ('$fullName', '$status', '$player_img', '$position', $rating, $pace, $shooting, $passing, $dribbling, $defending, $physical, $nationality_id, $club_id)";
       $result = $this->conn->query($query);

}

// Update player
public function updatePlayer($data, $files, $player_id) {
    $fullName = $this->conn->real_escape_string($data['FullName']);
    $status = $this->conn->real_escape_string($data['status']);
    $position = $this->conn->real_escape_string($data['position']);
    $rating = (int) $data['rating'];
    $pace = (int) $data['pace'];
    $shooting = (int) $data['shooting'];
    $passing = (int) $data['passing'];
    $dribbling = (int) $data['dribbling'];
    $defending = (int) $data['defending'];
    $physical = (int) $data['physical'];
    $nationality_id = (int) $data['nationality_id'];
    $club_id = (int) $data['club_id'];

    // Upload player image
    $player_img = $this->uploadFile($files['player_img'], "uploads/players/");

    $query = "UPDATE players SET FullName = ?, status = ?, player_img = ?, position = ?, rating = ?, pace = ?, shooting = ?, passing = ?, dribbling = ?, defending = ?, physical = ?, nationality_id = ?, club_id = ? WHERE player_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("sssiiiiiiiiiii", $fullName, $status, $player_img, $position, $rating, $pace, $shooting, $passing, $dribbling, $defending, $physical, $nationality_id, $club_id, $player_id);
    if($stmt->execute()){
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}

public function getPlayerID($player_id){
    $query = "SELECT * FROM Players WHERE player_id = $player_id";
    $result = $this->conn->query($query);
    // $stmt->bind_param("i", $player_id);
    // $stmt->execute();
    // $result = $stmt->get_result();
    if ($result == false) {
        return false;
    }
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}







}
?>
