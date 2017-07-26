<?php

class KPIMission implements actionPerformed {

    public function actionPerformed($event) {
        $SingleplayerModel = new SingleplayerModel();
        $Name=$_POST["Name"];
        $Point=$_POST["Point"];
        $Period=$_POST["Period"];
        $SingleplayerModel->CreateMission($Name,$Point,$Period);
        return 'success';
        
        
        
    }

}

?>
