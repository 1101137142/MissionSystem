<?php

class createMission implements actionPerformed {

    public function actionPerformed($event) {
        $SingleplayerModel = new SingleplayerModel();
        $Name=$_POST["MissionName"];
        $Point=$_POST["MissionPoint"];
        $Period=$_POST["MissionPeriod"];
        return $SingleplayerModel->CreateMission($Name,$Point,$Period);
       
        
        
        
    }

}

?>
