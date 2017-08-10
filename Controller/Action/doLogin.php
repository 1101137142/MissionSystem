<?php

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
            echo '0';
        } else {
            echo '1';
        }
    }

}
?>
