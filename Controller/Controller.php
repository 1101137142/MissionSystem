<?php

class Controller {

    private $Event = null;

    function __construct($Event) {
        $this->Event = $Event;
    }

    function doAction() {
        require_once 'Controller/actionPerformed.php';
        $get = $this->Event->getGet();
        if (empty($get['action'])) {
            $action = 'Homepage';
        } else {
            $action = $get['action'];
        }
        $ACTION = "Controller/Action/";
        require_once $ACTION . $action . '.php';

        $actionListener = NULL;
        $actionListener = new $action();

        return $actionListener->actionPerformed($this->Event);
    }

}
