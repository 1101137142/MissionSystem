<script>
    function test() {
        alert('OK!');
    }
    function TorF(ID, Status) {
        if (Status = 1) {
            document.getElementById('Bt'.ID).class += " ".}


        //    document.location.href = "";
    }
    function CreateMission() {
        document.location.href = "index.php?action=CreateMission";
    }
</script>



<div style="clear:both;">
    <table class="table table-hover">
        <tr ><td align=right colspan="7"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#createMission">新增任務</button></td></tr>
        <tr><td align=center>ID</td><td>Name</td><td>Point</td><td>MissionFinishQuantity</td><td>MissionStatus</td><td>MissionPeriod</td><td></td></tr>
        <tr ><td align=center colspan="7">您現在沒有任務哦 請先建立任務</td></tr>
    </table>
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
                            <tr><td>任務名稱：</td><td><input type="text" ID="MissionName"></td></tr>
                            <tr><td>任務分數：</td><td><input type="number" ID="MissionPoint"></td></tr>
                            <tr><td>任務週期：</td><td><input type="number" ID="MissionPeriod">天</td></tr>
                            
                            
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