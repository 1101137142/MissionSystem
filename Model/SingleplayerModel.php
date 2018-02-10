<?php

class SingleplayerModel extends Model {

    function SelectMissionAndPoint() {

        $sql = "SELECT `MissionID`, `MissionName`, `MissionPoint`, `MissionCreateTime`, `MissionFinishTime`, `MissionEndTime`, `MissionStatus`, `MissionPeriod`, `MissionAttribute` FROM `missionsystem_missionlist` ";
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function SelectKPIMission() {
        $sql = "SELECT T1.`MissionID`,T1.MissionName,T1.MissionPoint,T1.MissionEndTime,
            T2.StartTime,T2.`RefreshTime`,T1.`MissionPeriod`,T1.`MissionPeriodList`,
            T2.`RowID`,T2.LastFinishTime,T2.FinishQuantity,T2.Status
            FROM `missionsystem_missionlist` T1 
                LEFT JOIN `missionsystem_finishstatus` T2 ON T1.MissionID=T2.MissionID 
            WHERE T2.owner='" . $_SESSION['PlayerID'] . "'";
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();

        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $EndTime = strtotime($row['MissionEndTime']);
            $refresh = false;
            if ($row['RefreshTime'] == NULL || $row['RefreshTime'] == '') {
                $RefreshTime = strtotime($row['StartTime']);
                $refresh = true;
            } else {
                $RefreshTime = strtotime($row['RefreshTime']);   //轉換成UNIX時間格式
            }

            switch ($row['MissionPeriodList']) {    //判斷更新的時間單位
                case '1':
                    while (strtotime("now") >= $RefreshTime + (60 * 60 * $row['MissionPeriod'])) {
                        $RefreshTime = $RefreshTime + (60 * 60 * $row['MissionPeriod']);
                        $refresh = true;
                    };
                    break;
                case '2':
                    while (strtotime("now") >= $RefreshTime + (60 * 60 * 24 * $row['MissionPeriod'])) {
                        $RefreshTime = $RefreshTime + (60 * 60 * $row['MissionPeriod']);
                        $refresh = true;
                    };
                    break;
                case '3':
                    while (strtotime("now") >= $RefreshTime + (60 * 60 * 24 * 7 * $row['MissionPeriod'])) {
                        $RefreshTime = $RefreshTime + (60 * 60 * $row['MissionPeriod']);
                        $refresh = true;
                    };
                    break;
                case '4':
                    while (strtotime("now") >= mktime(date("G", $RefreshTime), date("i", $RefreshTime), date("s", $RefreshTime), date("m", $RefreshTime), date("d", $RefreshTime), date("Y", $RefreshTime) + $row['MissionPeriod'])) {
                        $RefreshTime = mktime(date("G", $RefreshTime), date("i", $RefreshTime), date("s", $RefreshTime), date("m", $RefreshTime), date("d", $RefreshTime), date("Y", $RefreshTime) + $row['MissionPeriod']);
                        $refresh = true;
                    };
                    break;
                default:
                    break;
            }
            if ($refresh == true) {
                $RefreshTime = date("Y-m-d H:i:s", $RefreshTime);
                $sqlu = "UPDATE `missionsystem_finishstatus` SET `RefreshTime` = '" . $RefreshTime . "' , `Status` = 0 WHERE `missionsystem_finishstatus`.`RowID` = '" . $row['RowID'] . "'";
                $stmtu = $this->cont->prepare($sqlu);
                $statusu = $stmtu->execute();
            };
        };
        $sql = "SELECT T1.`MissionID`,T1.MissionName,T1.MissionPoint,T1.MissionEndTime,T2.`RefreshTime`,T1.`MissionPeriod`,T1.`MissionPeriodList`,
            T2.`RowID`,T2.LastFinishTime,T2.FinishQuantity,T2.Status
            FROM `missionsystem_missionlist` T1 
                LEFT JOIN `missionsystem_finishstatus` T2 ON T1.MissionID=T2.MissionID 
            WHERE T2.owner='" . $_SESSION['PlayerID'] . "'";
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
      function SelectFinishKPIMission() {
      $sql = "SELECT `MissionID`,`MissionName`,`MissionPoint`,`MissionFinishQuantity`,`MissionStatus`,`MissionPeriod` FROM `missionsystem_missionlist` WHERE MissionKPI=1 and MissionStatus=1";
      $stmt = $this->cont->prepare($sql);
      $status = $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
     */

    function SelectPlayerScore($ID) {
        $sql = "SELECT `PlayerScore` FROM `missionsystem_players` WHERE PlayerID=?";
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute(array($ID));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function CreateMission($Name, $Point, $Period, $EndTime, $MissionAttribute, $MissionPeriodList) {
        if ($EndTime != '') {
            $EndTime = "'" . $EndTime . "'";
        } else {
            $EndTime = 'NULL';
        }
        try {
            $this->cont->beginTransaction();
            $sql = "SELECT MAX(MissionID)+1 as MissionID FROM `missionsystem_missionlist`";
            $stmt = $this->cont->prepare($sql);
            $status = $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $MissionID = $result['MissionID'];

            $StartTime = date('Y-m-d H:i:s');
            $sqlx = "INSERT INTO `missionsystem_missionlist`( `MissionID`,`MissionName`, `MissionPoint`, `MissionCreateTime`,`MissionEndTime`,`MissionPeriod`,`MissionPeriodList`, `MissionAttribute`,`MissionCreater`) VALUES ('" . $MissionID . "','" . $Name . "'," . $Point . ",CURRENT_TIMESTAMP," . $EndTime . ",'" . $Period . "','" . $MissionPeriodList . "','" . $MissionAttribute . "'," . $_SESSION['PlayerID'] . ")";
            $stmtx = $this->cont->prepare($sqlx);
            $statusx = $stmtx->execute();
            $sqly = "INSERT INTO `missionsystem_finishstatus`( `MissionID`,`StartTime`, `Owner`) VALUES ('" . $MissionID . "','" . $StartTime . "','" . $_SESSION['PlayerID'] . "')";
            $stmty = $this->cont->prepare($sqly);
            $statusy = $stmty->execute();
            if ($statusx && $statusy) {
                $this->cont->commit();
                $sqls = "SELECT T1.`MissionID`,T1.`MissionName`,T1.`MissionPoint`,T1.`MissionEndTime`,T1.MissionPeriod,T2.`LastFinishTime`,T2.`FinishQuantity`,T2.`Status` FROM `missionsystem_missionlist` T1 LEFT JOIN `missionsystem_finishstatus` T2 on T1.MissionID=T2.MissionID WHERE T1.`MissionID`=:MissionID  AND T2.`Owner`=:Owner";
                $stmts = $this->cont->prepare($sqls);
                $statuss = $stmts->execute(array(':MissionID' => $MissionID, ':Owner' => $_SESSION['PlayerID']));

                return $stmts;
            } else {
                $this->cont->rollback();

                return '0';
            }
        } catch (Exception $e) {
            $this->cont->rollback();
            return 'ERR';
        }
    }

    /*
      function selectNewCreateMission($Name, $Point, $Period) {
      $sql = "SELECT `MissionID`,`MissionName`,`MissionPoint`,`MissionFinishQuantity`,`MissionStatus`,`MissionPeriod` FROM `missionsystem_missionlist` WHERE MissionKPI=1 and MissionName=" . $Name . " and MissionPoint=" . $Point . " and MissionPeriod=" . $Period;
      $stmt = $this->cont->prepare($sql);
      $status = $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
      } */

    function FinishMission($ID) {
        $sql = "UPDATE `missionsystem_finishstatus` SET `LastFinishTime` = CURRENT_TIMESTAMP, `FinishQuantity` = FinishQuantity+1, `Status` = '1' WHERE `missionsystem_finishstatus`.`RowID` = '" . $ID . "' and `Status`=0";
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();
        //return $status;
        return false;
    }

    function DelectMission($ID) {
        $sql = "DELETE FROM `missionsystem_finishstatus` WHERE `RowID`=" . $ID;
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();
        return $status;
    }

    function UnfinishMission($ID) {
        $sql = "UPDATE `missionsystem_finishstatus` SET `FinishQuantity` = FinishQuantity-1,`Status` = '0',`LastFinishTime` = NULL WHERE `RowID`=" . $ID . " and `Status`=1";
        $stmt = $this->cont->prepare($sql);
        $status = $stmt->execute();
        return $status;
    }

}

?>
