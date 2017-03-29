<?php

class SingleplayerModel extends Model {
    
    function SelectMissionAndPoint() {

        $sql = "SELECT `MainTableID`, `MainTableName` FROM `Kuas_ERP_C_MainTable` where `MainTableID`>0";
        $stmt = $this->cont->prepare($sql);
        $count = $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
