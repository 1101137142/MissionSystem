<?php

class KPIMission implements actionPerformed {
    public function actionPerformed($event) {
        $SingleplayerModel=new SingleplayerModel();
        foreach ($SingleplayerModel->SelectKPIMission() as $rowM) {
            $Mission[] = array(
                'MissionID' => $rowM["MissionID"],
                'MissionName' => $rowM["MissionName"],
                'MissionPoint' => $rowM["MissionPoint"],
                'MissionFinishQuantity' => $rowM["MissionFinishQuantity"],
                'MissionStatus' => $rowM["MissionStatus"],                
                'MissionPeriod' => $rowM["MissionPeriod"]);
        }
        foreach ($SingleplayerModel->SelectFinishKPIMission() as $rowFM) {
            $FinishMission[] = array(
                'MissionID' => $rowFM["MissionID"],
                'MissionName' => $rowFM["MissionName"],
                'MissionPoint' => $rowFM["MissionPoint"],
                'MissionFinishQuantity' => $rowFM["MissionFinishQuantity"],
                'MissionStatus' => $rowFM["MissionStatus"],                
                'MissionPeriod' => $rowFM["MissionPeriod"]);
        }
        
        
        $smarty = new KSmarty();
        @$smarty->assign("Mission", $Mission);
        @$smarty->assign("FinishMission", $FinishMission);
        return $smarty->fetch("KPIMission.tpl");
    }

}
?>