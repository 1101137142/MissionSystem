<?php


class MissionAndPoint implements actionPerformed {
    public function actionPerformed($event) {
        $SingleplayerModel=new SingleplayerModel();
        foreach ($SingleplayerModel->SelectMissionAndPoint() as $row) {
            $Mission[] = array(
                'MissionID' => $row["MissionID"],
                'MissionName' => $row["MissionName"],
                'MissionPoint' => $row["MissionPoint"]);
            
        }
        
        $smarty = new KSmarty();
        $smarty->assign("Mission", $Mission);
        return $smarty->fetch("MissionAndPoint.tpl");
    }

}
?>
