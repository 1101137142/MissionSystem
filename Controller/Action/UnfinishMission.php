<?php

class UnfinishMission implements actionPerformed {

    public function actionPerformed($event) {
        $SingleplayerModel = new SingleplayerModel();
        $ID = $_POST["MissionID"];
        return $SingleplayerModel->UnfinishMission($ID);
    }

}

?>
