<?php

class SingleplayerModel extends Model {

    function SelectMissionAndPoint() {

        $sql = "SELECT `MissionID`, `MissionName`, `MissionPoint`, `MissionCreateTime`, `MissionFinishTime`, `MissionEndTime`, `MissionStatus`, `MissionPeriod`, `MissionAttribute` FROM `missionsystem_missionlist` ";
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function SelectKPIMission() {
        $sql = "SELECT T1.`MissionID`,T1.MissionName,T1.MissionPoint,T1.MissionEndTime,T1.`MissionPeriod`,T1.`MissionPeriodList`,
            T2.`RowID`,T2.LastFinishTime,T2.FinishQuantity,T2.Status
            FROM `missionsystem_missionlist` T1 
                LEFT JOIN `missionsystem_finishstatus` T2 ON T1.MissionID=T2.MissionID 
            WHERE T2.owner='2'";
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
        $status = $stmt->execute(array($ID));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function CreateMission($Name, $Point, $Period,$EndTime,$MissionAttribute,$MissionPeriodList) {
        if($EndTime!=''){
            $EndTime="'".$EndTime."'";
        }else{
            $EndTime='NULL';
        }
        try{
            $this->cont->beginTransaction();
            $sql = "SELECT MAX(MissionID)+1 as MissionID FROM `missionsystem_missionlist`";
            $stmt = $this->cont->prepare($sql);
            $status = $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            
            $MissionID=$result['MissionID'];
            
            
            $sqlx = "INSERT INTO `missionsystem_missionlist`( `MissionID`,`MissionName`, `MissionPoint`, `MissionCreateTime`,`MissionEndTime`,`MissionPeriod`,`MissionPeriodList`, `MissionAttribute`,`MissionCreater`) VALUES ('".$MissionID."','" . $Name . "'," . $Point . ",CURRENT_TIMESTAMP,".$EndTime.",'" . $Period . "','".$MissionPeriodList."','".$MissionAttribute."',".$_SESSION['PlayerID'].")";
            $stmtx = $this->cont->prepare($sqlx);
            $statusx = $stmtx->execute();
            $sqly = "INSERT INTO `missionsystem_finishstatus`( `MissionID`, `Owner`) VALUES ('".$MissionID."','".$_SESSION['PlayerID']."')";
            $stmty = $this->cont->prepare($sqly);
            $statusy = $stmty->execute();
            $this->cont->commit();
            
            $sqls="SELECT T1.`MissionID`,T1.`MissionName`,T1.`MissionPoint`,T1.`MissionEndTime`,T1.MissionPeriod,T2.`LastFinishTime`,T2.`FinishQuantity`,T2.`Status` FROM `missionsystem_missionlist` T1 LEFT JOIN `missionsystem_finishstatus` T2 on T1.MissionID=T2.MissionID WHERE T1.`MissionID`=:MissionID  AND T2.`Owner`=:Owner";
            $stmts = $this->cont->prepare($sqls);
            $statuss = $stmts->execute(array(':MissionID' => $MissionID,':Owner'=>$_SESSION['PlayerID']));
            
            return $stmts;
        } catch (Exception $e){
            $this->cont->rollback();
            return 'ERR';
        }
        
    }

    function selectNewCreateMission($Name, $Point, $Period) {
        $sql = "SELECT `MissionID`,`MissionName`,`MissionPoint`,`MissionFinishQuantity`,`MissionStatus`,`MissionPeriod` FROM `missionsystem_missionlist` WHERE MissionKPI=1 and MissionName=" . $Name . " and MissionPoint=" . $Point . " and MissionPeriod=" . $Period;
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function FinishMission($ID) {
        $sql = "UPDATE `missionsystem_missionlist` SET `MissionFinishQuantity`=`MissionFinishQuantity`+1 ,`MissionStatus` =1 WHERE `MissionID`=" . $ID . " and `MissionStatus`=0";
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();
        return $status;
    }

    function DelectMission($ID) {
        $sql = "DELETE FROM `missionsystem_missionlist` WHERE `MissionID`=" . $ID;
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();
        return $status;
    }

    function UnfinishMission($ID) {
        $sql = "UPDATE `missionsystem_missionlist` SET `MissionFinishQuantity`=`MissionFinishQuantity`-1 ,`MissionStatus` =0 WHERE `MissionID`=" . $ID . " and `MissionStatus`=1";
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();
        return $status;
    }

}

?>
