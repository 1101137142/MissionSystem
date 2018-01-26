<?php

class createKPIMission implements actionPerformed {

    public function actionPerformed($event) {
        
        if ($_SESSION['PlayerName'] == '!NotToLogin') {
            $NewMission['Returnmsg'] = 'Not Login';
        } else {
            $SingleplayerModel = new SingleplayerModel();
            $Name = $_POST["MissionName"];
            $Point = $_POST["MissionPoint"];
            $Period = $_POST["MissionPeriod"];
            $MissionEndTime = $_POST['MissionEndTime'];
            //$MissionAttribute=$_POST['MissionAttribute'];
            $MissionPeriodList=$_POST['MissionPeriodList'];
            foreach($SingleplayerModel->CreateMission($Name, $Point, $Period,$MissionEndTime,'1',$MissionPeriodList) as $row){
                $NewMission[] = array(
                    'MissionID'=>$row["MissionID"],
                    'MissionName'=>$row["MissionName"],
                    'MissionPoint'=>$row["MissionPoint"],
                    'MissionEndTime'=>$row["MissionEndTime"],
                    'MissionPeriod'=>$row["MissionPeriod"],
                    'LastFinishTime'=>$row["LastFinishTime"],
                    'FinishQuantity'=>$row["FinishQuantity"],
                    'Status'=>$row["Status"]
                );
            }
            $NewMission['Returnmsg'] = 'Mission is created';

            
        }
        //echo $_POST;
        echo json_encode($NewMission);
        //echo $Name;
    }

}

?>
