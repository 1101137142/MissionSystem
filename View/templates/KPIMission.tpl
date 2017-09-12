<script>
    function test() {
        alert('OK!');
    }
    function TorF(ID, Status) {
        if (Status == 1) {
            document.getElementById('Bt' + ID).className += " disabled";
        } else
        {
            document.getElementById('Bt' + ID).removeAttribute('class');
            document.getElementById('Bt' + ID).className = 'btn btn-success';
        }
        //    document.location.href = "";
    }
    function FinishMission(ID, Status) {
        if (Status == 1) {
            alert("此任務已經完成了");
        } else {
            var url = "index.php?action=MissionAction";
            $.ajax({
                type: "POST",
                url: url,
                data: {MissionID: ID,doAction:'Finish'}, // serializes the form's elements.
                success: function (data)
                {
                    alert("已變更任務狀態")
                    window.location.reload();
                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                }
            });
        }
    }
    function DelectMission(ID) {
        var url = "index.php?action=MissionAction";
        $.ajax({
            type: "POST",
            url: url,
            data: {MissionID: ID,doAction:'Delect'}, // serializes the form's elements.
            success: function (data)
            {
                console.log(data);
                alert("已刪除任務");
                window.location.reload();
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            }
        });
    }
    function UnfinishMission(ID, Status) {
        if (Status == 0) {
            alert("此任務處於未完成的狀態");
        } else {
            var url = "index.php?action=MissionAction";
            $.ajax({
                type: "POST",
                url: url,
                data: {MissionID: ID,doAction:'Unfinish'}, // serializes the form's elements.
                success: function (data)
                {
                    alert("已變更任務狀態");
                    window.location.reload();
                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                }
            });
        }
    }



</script>



<div style="clear:both;">

    <table class="table table-hover" ID="NotFinishTable">
        <tr ><td colspan="2">未完成任務</td><td align=right colspan="5"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#createMission">新增任務</button></td></tr>
        <tr><td align=center>ID</td><td>Name</td><td>Point</td><td>MissionFinishQuantity</td><td>MissionStatus</td><td>MissionPeriod</td><td></td></tr>
        <{foreach key=key item=item from=$Mission name=Mission}>
        <tr ><td align=center ><{$item.MissionID}></td><td><{$item.MissionName}></td><td><{$item.MissionPoint}></td><td ><{$item.MissionFinishQuantity}></td><td id="MS<{$smarty.foreach.Mission.iteration}>"><{$item.MissionStatus}></td><td><{$item.MissionPeriod}></td><td align=center><button id="FinishBt<{$item.MissionID}>" type="button" class="btn btn-success" onclick=FinishMission(<{$item.MissionID}>,<{$item.MissionStatus}>)>完成</button><button id="DelectBt<{$item.MissionID}>" type="button" class="btn btn-danger" onclick=DelectMission(<{$item.MissionID}>)>刪除</button></td></tr>
        <{foreachelse}>
        <tr><td align=center colspan="7">當前沒有任務哦 請先建立任務</td></tr>
        <{/foreach}>
    </table>
    <table class="table table-hover" ID="FinishTable">
        <tr ><td colspan="2">已完成任務</td><td align=right colspan="5"><button type="button" class="btn btn-success disabled">已完成任務</button></td></tr>
        <tr><td align=center>ID</td><td>Name</td><td>Point</td><td>MissionFinishQuantity</td><td>MissionStatus</td><td>MissionPeriod</td><td></td></tr>
        <{foreach key=key item=item2 from=$FinishMission name=FinishMission}>
        <tr ><td align=center ><{$item2.MissionID}></td><td><{$item2.MissionName}></td><td><{$item2.MissionPoint}></td><td ><{$item2.MissionFinishQuantity}></td><td id="MS<{$smarty.foreach.Mission.iteration}>"><{$item2.MissionStatus}></td><td><{$item2.MissionPeriod}></td><td align=center><button id="UnfinishBt<{$item2.MissionID}>" type="button" class="btn btn-warning" onclick=UnfinishMission(<{$item2.MissionID}>,<{$item2.MissionStatus}>)>取消</button><button id="DelectBt<{$item2.MissionID}>" type="button" class="btn btn-danger" onclick=DelectMission(<{$item2.MissionID}>)>刪除</button></td></tr>
        <{foreachelse}>
        <tr><td align=center colspan="7">當前沒有已完成任務哦</td></tr>
        <{/foreach}>
    </table>

    <!-- Modal -->
    <div id="createMission" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Mission</h4>
                </div>
                <div class="modal-body">
                    <form ID="createMissionForm">
                        <table class="table">
                            <tr><td>任務名稱：</td><td><input type="text" name="MissionName" ID="MissionName"></td></tr>
                            <tr><td>任務分數：</td><td><input type="number" name="MissionPoint" ID="MissionPoint"></td></tr>
                            <tr><td>任務週期：</td><td><input type="number" name="MissionPeriod" ID="MissionPeriod">
                                    <select name="YourLocation" class="form-control" style="display: inline;width: 30%;">
                                        <option value="1">小時</option>
                                        <option value="2">天</option>
                                        <option value="3">月</option>
                                        <option value="4">年</option>
                                    </select></td></tr>
                        </table>
                        <button type="submit" class="btn btn-success"  id="submitForm">送出</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#createMissionForm").submit(function (e) {
        var url = "index.php?action=createMission"; // the script where you handle the form input.
        //var url = "Controller/Action/createMission.php";
        //console.log($("#createMissionForm").serialize());
        $.ajax({
            type: "POST",
            url: url,
            data: $("#createMissionForm").serialize(), // serializes the form's elements.
            success: function (data) {
                console.log(data);
                //$("#NotFinishTable").append("<tr ><td align=center ></td><td></td><td></td><td ></td><td id=MS<{$smarty.foreach.Mission.iteration}>></td><td></td><td align=center><button id=Bt type=button class=btn btn-success onclick=FinishMission(<{$item.MissionID}>,<{$item.MissionStatus}>)>完成</button></td></tr>")
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            }
        });
        e.preventDefault(); // avoid to execute the actual submit of the form.
    })
</script>