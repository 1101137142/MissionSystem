<script>
    function test() {
        alert('OK!');
    }
    function TorF(ID,Status) {
    if (Status=1){ 
        document.getElementById('Bt'.ID).class+=" ".}
    
    
    //    document.location.href = "";
    }

</script>



<div style="clear:both;">
    
    <table class="table table-hover">
        <tr ><td align=right colspan="7"><button type="button" class="btn btn-success disabled">新增任務</button></td></tr>
        <tr><td align=center>ID</td><td>Name</td><td>Point</td><td>MissionFinishQuantity</td><td>MissionStatus</td><td>MissionPeriod</td><td></td></tr>
        <{foreach key=key item=item from=$Mission}>
        <tr ><td align=center><{$item.MissionID}></td><td><{$item.MissionName}></td><td><{$item.MissionPoint}></td><td><{$item.MissionFinishQuantity}></td><td><{$item.MissionStatus}></td><td><{$item.MissionPeriod}></td><td align=center><button id="Bt<{$item.MissionID}>" type="button" class="btn btn-success disabled" onload=TorF(<{$item.MissionID}>,<{$item.MissionStatus}>)>完成</button></td></tr>
        <{/foreach}>
    </table>
    
</div>