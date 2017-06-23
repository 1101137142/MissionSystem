<?php

class SingleplayerModel extends Model {

    function SelectMissionAndPoint() {

        $sql = "SELECT `MissionID`, `MissionName`, `MissionPoint`, `MissionCreateTime`, `MissionFinishTime`, `MissionEndTime`, `MissionStatus`, `MissionPeriod`, `MissionAttribute` FROM `missionsystem_missionlist` ";
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function SelectKPIMission() {
        $sql = "SELECT `MissionID`,`MissionName`,`MissionPoint`,`MissionFinishQuantity`,`MissionStatus`,`MissionPeriod` FROM `missionsystem_missionlist` WHERE MissionKPI=1 and MissionStatus=0";
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function SelectFinishKPIMission() {
        $sql = "SELECT `MissionID`,`MissionName`,`MissionPoint`,`MissionFinishQuantity`,`MissionStatus`,`MissionPeriod` FROM `missionsystem_missionlist` WHERE MissionKPI=1 and MissionStatus=1";
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function SelectPlayerScore($ID) {
        $sql = "SELECT `PlayerScore` FROM `missionsystem_players` WHERE PlayerID=?";
        $stmt = $this->cont->prepare($sql);
        $count = $stmt->execute(array($ID));
        $status = $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

?>
