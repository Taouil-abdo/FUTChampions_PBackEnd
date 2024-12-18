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


}



?>
