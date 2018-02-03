<?php

class MissionAction implements actionPerformed {

    public function actionPerformed($event) {
        $SingleplayerModel = new SingleplayerModel();
        $ID = $_POST["RowID"];
        $doAction=$_POST["doAction"];
        switch($doAction){
            case 'Finish':
                return $SingleplayerModel->FinishMission($ID);
                break;
            case 'Unfinish':
                return $SingleplayerModel->UnfinishMission($ID);
                break;
            case 'Delect':
                return $SingleplayerModel->DelectMission($ID);
                break;
        }
        
        
    }

}

?>
