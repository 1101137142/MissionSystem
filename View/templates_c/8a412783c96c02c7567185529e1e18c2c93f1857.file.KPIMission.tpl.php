<?php /* Smarty version Smarty-3.1.19, created on 2017-03-29 12:31:07
         compiled from "View\templates\KPIMission.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1800158db8ed4794ea3-54262659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a412783c96c02c7567185529e1e18c2c93f1857' => 
    array (
      0 => 'View\\templates\\KPIMission.tpl',
      1 => 1490790663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1800158db8ed4794ea3-54262659',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58db8ed47f67a4_05950657',
  'variables' => 
  array (
    'Mission' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58db8ed47f67a4_05950657')) {function content_58db8ed47f67a4_05950657($_smarty_tpl) {?><script>
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
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['Mission']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <tr ><td align=center><?php echo $_smarty_tpl->tpl_vars['item']->value['MissionID'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['MissionName'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['MissionPoint'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['MissionFinishQuantity'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['MissionStatus'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['MissionPeriod'];?>
</td><td align=center><button id="Bt<?php echo $_smarty_tpl->tpl_vars['item']->value['MissionID'];?>
" type="button" class="btn btn-success disabled" onload=TorF(<?php echo $_smarty_tpl->tpl_vars['item']->value['MissionID'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['MissionStatus'];?>
)>完成</button></td></tr>
        <?php } ?>
    </table>
    
</div><?php }} ?>
