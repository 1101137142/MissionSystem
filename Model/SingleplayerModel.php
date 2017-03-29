<?php

class SingleplayerModel extends Model {

    function SelectMissionAndPoint() {

        $sql = "SELECT `MissionID`, `MissionName`, `MissionPoint`, `MissionCreateTime`, `MissionFinishTime`, `MissionEndTime`, `MissionStatus`, `MissionPeriod`, `MissionAttribute` FROM `missionsystem_missionlist` ";
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function SelectKPIMission() {
        $sql="SELECT `MissionID`,`MissionName`,`MissionPoint`,`MissionFinishQuantity`,`MissionStatus`,`MissionPeriod` FROM `missionsystem_missionlist` WHERE MissionKPI=1";
        $stmt= $this->cont->prepare($sql);
        $status=$stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

}

?>
