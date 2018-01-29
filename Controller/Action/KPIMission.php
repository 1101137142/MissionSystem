<?php

class KPIMission implements actionPerformed {

    public function actionPerformed($event) {
        $SingleplayerModel = new SingleplayerModel();
        foreach ($SingleplayerModel->SelectKPIMission() as $row) {
            switch ($row['Status']) {
                case 0:
                    $ProcessingMission[] = array(
                        'MissionID' => $row['MissionID'],
                        'MissionName' => $row['MissionName'],
                        'MissionPoint' => $row['MissionPoint'],
                        'MissionEndTime' => $row['MissionEndTime'],
                        'MissionPeriod' => $row['MissionPeriod'],
                        'MissionPeriodList' => $row["MissionPeriodList"],
                        'RowID' => $row['RowID'],
                        'LastFinishTime' => $row['LastFinishTime'],
                        'FinishQuantity' => $row['FinishQuantity']);
                    break;
                case 1:
                    $FinishMission[] = array(
                        'MissionID' => $row['MissionID'],
                        'MissionName' => $row['MissionName'],
                        'MissionPoint' => $row['MissionPoint'],
                        'MissionEndTime' => $row['MissionEndTime'],
                        'MissionPeriod' => $row['MissionPeriod'],
                        'MissionPeriodList' => $row["MissionPeriodList"],
                        'RowID' => $row['RowID'],
                        'LastFinishTime' => $row['LastFinishTime'],
                        'FinishQuantity' => $row['FinishQuantity']);
                    break;
                case 2:
                    $EndMission[] = array(
                        'MissionID' => $row['MissionID'],
                        'MissionName' => $row['MissionName'],
                        'MissionPoint' => $row['MissionPoint'],
                        'MissionEndTime' => $row['MissionEndTime'],
                        'MissionPeriod' => $row['MissionPeriod'],
                        'MissionPeriodList' => $row["MissionPeriodList"],
                        'RowID' => $row['RowID'],
                        'LastFinishTime' => $row['LastFinishTime'],
                        'FinishQuantity' => $row['FinishQuantity']);
                    break;
                default :
                    break;
            }
        }


        $smarty = new KSmarty();
        @$smarty->assign("ProcessingMission", $ProcessingMission);
        @$smarty->assign("FinishMission", $FinishMission);
        @$smarty->assign("EndMission", $EndMission);
        return $smarty->fetch("KPIMission.tpl");
    }

}

?>