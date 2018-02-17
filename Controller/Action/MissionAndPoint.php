<?php


class MissionAndPoint implements actionPerformed {
    public function actionPerformed($event) {
        $SingleplayerModel = new SingleplayerModel();
        foreach ($SingleplayerModel->SelectMissionAndPoint() as $row) {
            switch ($row['Status']) {
                case 0:
                    $ProcessingMission[] = array(
                        'MissionID' => $row['MissionID'],
                        'MissionName' => $row['MissionName'],
                        'MissionPoint' => $row['MissionPoint'],
                        'StartTime'=>$row['StartTime'],
                        'UStartTime'=>strtotime($row['StartTime']),
                        'MissionEndTime' => $row['MissionEndTime'],
                        'UMissionEndTime'=>strtotime($row['MissionEndTime']),
                        'UNow'=>strtotime('now'),
                        'percentage'=>round((strtotime('now')-strtotime($row['StartTime']))/(strtotime($row['MissionEndTime'])-strtotime($row['StartTime'])),2)*100,
                        'RowID' => $row['RowID']);
                    break;
                case 2:
                    $EndMission[] = array(
                        'MissionID' => $row['MissionID'],
                        'MissionName' => $row['MissionName'],
                        'MissionPoint' => $row['MissionPoint'],
                        'StartTime'=>$row['StartTime'],
                        'UStartTime'=>strtotime($row['StartTime']),
                        'LastFinishTime' => $row['LastFinishTime'],
                        'ULastFinishTime'=>strtotime($row['LastFinishTime']),
                        'MissionEndTime' => $row['MissionEndTime'],
                        'UMissionEndTime'=>strtotime($row['MissionEndTime']),
                        'UNow'=>strtotime('now'),
                        'percentage'=>round((strtotime($row['LastFinishTime'])-strtotime($row['StartTime']))/(strtotime($row['MissionEndTime'])-strtotime($row['StartTime'])),2)*100,
                        'RowID' => $row['RowID']);
                    break;
                default :
                    break;
            }
        }


        $smarty = new KSmarty();
        @$smarty->assign("ProcessingMission", $ProcessingMission);
        @$smarty->assign("FinishMission", $FinishMission);
        @$smarty->assign("EndMission", $EndMission);
        return $smarty->fetch("MissionAndPoint.tpl");
    }

}
?>
