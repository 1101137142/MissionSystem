<div style="clear:both;">
    <{foreach key=key item=item from=$Mission}>
    <table class="table table-hover">
        <tr><td align=center>ID</td><td>Name</td><td>Point</td><td></td></tr>
        <tr ><td align=center><{$item.MissionID}></td><td><{$item.MissionName}></td><td><{$item.MissionPoint}></td><td align=center><button type="button" class="btn btn-success">完成</button></td></tr>
    </table>
    <{/foreach}>
</div>