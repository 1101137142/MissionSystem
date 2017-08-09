<?php


$MODEL="../../Model";
require_once $MODEL.'/Model.php';
require_once $MODEL.'/PlayerModel.php';
require_once '../actionPerformed.php';

class doLogin implements actionPerformed {

    public function actionPerformed($event) {
        $PlayerModel = new PlayerModel();
        $PlayerName = $_POST["PlayerName"];
        $Password = $_POST["Password"];
        foreach ($PlayerModel->SelectForDoLogin($PlayerName, $Password) as $row) {
            $Player[] = array(
                'PlayerID' => $row["PlayerID"],
                'PlayerName' => $row["PlayerName"],
                'PlayerPassword' => $row["PlayerPassword"],
                'PlayerScore' => $row["PlayerScore"]);
        }
        if (empty($Player)) {
            echo 8888888;
        } else {
            echo '1';
        }
    }

}

?>
