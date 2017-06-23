<?php /* Smarty version Smarty-3.1.19, created on 2017-06-23 07:19:46
         compiled from "View\templates\MissionAndPoint.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31655594cc0d6200c41-79129175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5f909780fc21b42211be4b03b50d739b03cec24' => 
    array (
      0 => 'View\\templates\\MissionAndPoint.tpl',
      1 => 1498202383,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31655594cc0d6200c41-79129175',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_594cc0d626e240_95806234',
  'variables' => 
  array (
    'Mission' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_594cc0d626e240_95806234')) {function content_594cc0d626e240_95806234($_smarty_tpl) {?><div style="clear:both;">

    <table class="table table-hover">
        
        <tr><td align=center>ID</td><td>Name</td><td>Point</td><td></td></tr>
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
</td><td align=center><button type="button" class="btn btn-success">完成</button></td></tr>
        <?php } ?>
    </table>

</div><?php }} ?>
