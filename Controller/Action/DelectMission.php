<?php

class DelectMission implements actionPerformed {

    public function actionPerformed($event) {
        $SingleplayerModel = new SingleplayerModel();
        $ID = $_POST["MissionID"];
        return $SingleplayerModel->DelectMission($ID);
        
    }

}

?>
