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

    // Upload player image
    $player_img = $this->uploadFile($files['player_img'], "uploads/players/");

    $query = "INSERT INTO players (FullName, status, player_img, position, rating, pace, shooting, passing, dribbling, defending, physical, nationality_id, club_id)
              VALUES ('$fullName', '$status', '$player_img', '$position', $rating, $pace, $shooting, $passing, $dribbling, $defending, $physical, $nationality_id, $club_id)";
       $result = $this->conn->query($query);

}

// File upload helper function
private function uploadFile($file, $targetDir) {
    if ($file['error'] == UPLOAD_ERR_OK) {
        $filename = time() . "_" . basename($file['name']);
        $targetPath = __DIR__ . '/' . $targetDir . $filename;

        // Ensure the target directory exists
        if (!is_dir(dirname($targetPath))) {
            mkdir(dirname($targetPath), 0755, true);
        }

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $targetDir . $filename; // Return the relative path
        } else {
            error_log("Failed to move uploaded file to $targetPath");
            return null;
        }
    }
    return null;
}










}
?>
