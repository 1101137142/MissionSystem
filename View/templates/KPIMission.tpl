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

    }
    function CreateMission() {
        document.location.href = "index.php?action=CreateMission";

    }
</script>



<div style="clear:both;">

    <table class="table table-hover">
        <tr ></td><td align=right colspan="7"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#createMission">新增任務</button></td></tr>
        <tr><td align=center>ID</td><td>Name</td><td>Point</td><td>MissionFinishQuantity</td><td>MissionStatus</td><td>MissionPeriod</td><td></td></tr>
        <{foreach key=key item=item from=$Mission name=Mission}>
        <tr ><td align=center ><{$item.MissionID}></td><td><{$item.MissionName}></td><td><{$item.MissionPoint}></td><td ><{$item.MissionFinishQuantity}></td><td id="MS<{$smarty.foreach.Mission.iteration}>"><{$item.MissionStatus}></td><td><{$item.MissionPeriod}></td><td align=center><button id="Bt<{$item.MissionID}>" type="button" class="btn btn-success" onclick=FinishMission(<{$item.MissionID}>,<{$item.MissionStatus}>)>完成</button></td></tr>
        <{/foreach}>
    </table>
    <table class="table table-hover">
        <tr ></td><td align=right colspan="7"><button type="button" class="btn btn-success disabled">已完成任務</button></td></tr>
        <tr><td align=center>ID</td><td>Name</td><td>Point</td><td>MissionFinishQuantity</td><td>MissionStatus</td><td>MissionPeriod</td><td></td></tr>
        <{foreach key=key item=item2 from=$FinishMission name=FinishMission}>
        <tr ><td align=center ><{$item2.MissionID}></td><td><{$item2.MissionName}></td><td><{$item2.MissionPoint}></td><td ><{$item2.MissionFinishQuantity}></td><td id="MS<{$smarty.foreach.Mission.iteration}>"><{$item2.MissionStatus}></td><td><{$item2.MissionPeriod}></td><td align=center><button id="Bt<{$item2.MissionID}>" type="button" class="btn btn-success disabled">完成</button></td></tr>
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
                    <form>
                        <table class="table table-hover">
                            <tr><td>任務名稱：</td><td></td></tr>
                            <tr><td>任務分數：</td><td></td></tr>
                            <tr><td>任務週期：</td><td></td></tr>
                            
                            
                        </table>
                        
                    </form>
                    
                    
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>