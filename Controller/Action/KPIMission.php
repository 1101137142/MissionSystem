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
        $smarty = new KSmarty();
        if (empty($SingleplayerModel->SelectKPIMission())){
        return $smarty->fetch("KPIMissionNull.tpl");
        }else{
        $smarty->assign("Mission", $Mission);
        return $smarty->fetch("KPIMission.tpl");}
    }

}
?>