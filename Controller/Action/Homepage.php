<?php

class HomePage implements actionPerformed {

    public function actionPerformed($Event) {

        $PlayerModel = new PlayerModel();
        $get = $Event->getGet();
        //判斷session中是否有ID與NAME的值 藉此判斷是否登入過
        if (isset($_SESSION['PlayerID']) && isset($_SESSION['PlayerName'])) {
            $PlayerID = $_SESSION['PlayerID'];
            $PlayerName = $_SESSION['PlayerName'];

            //確認使用者是否存在
            foreach ($PlayerModel->SelectPlayerToCheckLogin($PlayerID, $PlayerName) as $row) {
                $Player[] = array(
                    'PlayerID' => $row["PlayerID"],
                    'PlayerName' => $row["PlayerName"],
                    'PlayerScore' => $row["PlayerScore"]);
            }
        } else {
            $_SESSION['PlayerID'] = '0';
            $_SESSION['PlayerName'] = '!NotToLogin';
            $PlayerID = '0';
            $PlayerName = '!NotToLogin';
        }
        //判斷並連接內容頁
        if (empty($get["Content"])) {
            $MissionContent = "Content";
        } else if ($PlayerID == '0') {
            $MissionContent = "Content <script>alert('請先登入！');</script>";
        } else {
            $Content = $get["Content"];
            $ACTION = "Controller/Action/";
            require_once $ACTION . $Content . '.php';
            $ContentListener = NULL;
            $ContentListener = new $Content();
            $MissionContent = $ContentListener->actionPerformed($Event);
        }
        $PlayerModel = new PlayerModel();

        $smarty = new KSmarty();
        $smarty->assign("MissionContent", $MissionContent);
        $smarty->assign("PlayerName", $PlayerName);
        $smarty->display("NavBar.tpl");
    }

}

?>