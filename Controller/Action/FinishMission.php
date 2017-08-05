<?php

class FinishMission implements actionPerformed {

    public function actionPerformed($event) {
        $SingleplayerModel = new SingleplayerModel();
        $ID = $_POST["MissionID"];
        return $SingleplayerModel->FinishMission($ID);
        
    }

}

?>
