<?php

class HomePage implements actionPerformed {

    public function actionPerformed($Event) {

        $get = $Event->getGet();

        if (empty($get["Content"])) {
            $MissionContent = "Content";
        } else {
            $Content = $get["Content"];
            $ACTION = "Controller/Action/";
            require_once $ACTION . $Content . '.php';
            $ContentListener = NULL;
            $ContentListener = new $Content();
            $MissionContent = $ContentListener->actionPerformed($Event);
        }
        $smarty = new KSmarty();
        $smarty->assign("MissionContent", $MissionContent);
        $smarty->display("NavBar.tpl");
    }

}

?>