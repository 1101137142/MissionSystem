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
        $ID=1;
        foreach ($SingleplayerModel->SelectPlayerScore($ID) as $row) {
            $Score[] = array(
                'Score' => $row["PlayerScore"]);
        }
        
        
        
        $smarty = new KSmarty();
        if (empty($SingleplayerModel->SelectKPIMission())){
            
        //$smarty->assign("Score",$Score);
        return $smarty->fetch("KPIMissionNull.tpl");
        }else{
        $smarty->assign("Mission", $Mission);
        $smarty->assign("Score",$Score);
        return $smarty->fetch("KPIMission.tpl");}
    }

}
?>