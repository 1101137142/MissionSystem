<?php

class createMission implements actionPerformed {

    public function actionPerformed($event) {
        $SingleplayerModel = new SingleplayerModel();
        $Name=$_POST["MissionName"];
        $Point=$_POST["MissionPoint"];
        $Period=$_POST["MissionPeriod"];
        $SingleplayerModel->CreateMission($Name,$Point,$Period);
        
        foreach ($SingleplayerModel->selectNewCreateMission($Name, $Point, $Period) as $row) {
            $NewMission[] = array(
                'MissionID' => $row["MissionID"],
                'MissionName' => $row["MissionName"],
                'MissionPoint' => $row["MissionPoint"],
                'MissionFinishQuantity' => $row["MissionFinishQuantity"],
                'MissionStatus' => $row["MissionStatus"],                
                'MissionPeriod' => $row["MissionPeriod"]);
        }
        return $NewMission;
        
        
        
    }

}

?>
