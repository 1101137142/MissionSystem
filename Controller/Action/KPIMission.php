<?php

class KPIMission implements actionPerformed {
    public function actionPerformed($event) {
        $SingleplayerModel=new SingleplayerModel();
        foreach ($SingleplayerModel->SelectKPIMission() as $row) {
            $Mission[] = array(
                'MissionID' => $row["MissionID"],
                'MissionName' => $row["MissionName"],
                'MissionPoint' => $row["MissionPoint"],
                'MissionFinishQuantity' => $row["MissionFinishQuantity"],
                'MissionStatus' => $row["MissionStatus"],                
                'MissionPeriod' => $row["MissionPeriod"]);
        }
        foreach ($SingleplayerModel->SelectFinishKPIMission() as $row) {
            $FinishMission[] = array(
                'MissionID' => $row["MissionID"],
                'MissionName' => $row["MissionName"],
                'MissionPoint' => $row["MissionPoint"],
                'MissionFinishQuantity' => $row["MissionFinishQuantity"],
                'MissionStatus' => $row["MissionStatus"],                
                'MissionPeriod' => $row["MissionPeriod"]);
        }
        
        
        $smarty = new KSmarty();
        $smarty->assign("Mission", $Mission);
        $smarty->assign("FinishMission", $FinishMission);
        return $smarty->fetch("KPIMission.tpl");
    }

}
?>