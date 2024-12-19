<?php

include "Database.php";

class clubs extends Database {

    public function __construct(){
        parent::__construct();
    }

    public function getData() {
        $query = "SELECT * FROM clubs 
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

    public function delete($club_id){

        $query = "DELETE FROM clubs where club_id = $club_id ";
        $result = $this->conn->query($query);
        if($result == true){
            header("Location:dashboard.php");

		}else{
			echo "Record does not delete try again";
		    }
     }



     // Add a player
public function addclub($data, $files) {

    $clubName = $this->conn->real_escape_string($data['clubName']);
    

    // Upload player image
    $club_img = $this->uploadFile($files['club_img'], "uploads/players/");

    $query = "INSERT INTO players (FullName,club_img)
              VALUES ('$clubName', $club_img)";
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


// Update player
public function updatePlayer($data, $files, $player_id) {
    $fullName = $this->conn->real_escape_string($data['FullName']);x                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
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
    $query = "SELECT * FROM Players WHERE player_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $player_id);
    $stmt->execute();
    $result = $stmt->get_result();
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
