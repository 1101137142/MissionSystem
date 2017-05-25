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
    
    function FinishMission(ID,Status){
    
    }
</script>



<div style="clear:both;">

    <table class="table table-hover">
        <tr ><td><{foreach key=key item=item from=$Score name=Score}><{$Score.PlayerScore}><{/foreach}></td><td align=right colspan="6"><button type="button" class="btn btn-success">新增任務</button></td></tr>
        <tr><td align=center>ID</td><td>Name</td><td>Point</td><td>MissionFinishQuantity</td><td>MissionStatus</td><td>MissionPeriod</td><td></td></tr>
        <{foreach key=key item=item from=$Mission name=Mission}>
        <tr ><td align=center ><{$item.MissionID}></td><td><{$item.MissionName}></td><td><{$item.MissionPoint}></td><td ><{$item.MissionFinishQuantity}></td><td id="MS<{$smarty.foreach.Mission.iteration}>"><{$item.MissionStatus}></td><td><{$item.MissionPeriod}></td><td align=center><button id="Bt<{$item.MissionID}>" type="button" class="btn btn-success" onclick=FinishMission(<{$item.MissionID}>,<{$item.MissionStatus}>)>完成</button></td></tr>
        
        <{/foreach}>
    </table>

</div>