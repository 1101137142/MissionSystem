<?php /* Smarty version Smarty-3.1.19, created on 2017-03-29 10:39:16
         compiled from "View\templates\NavBar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2015058db8ed4813fc5-68811875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a84188845762d6bfbcf5697dc3cc80782634c2e4' => 
    array (
      0 => 'View\\templates\\NavBar.tpl',
      1 => 1490694721,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2015058db8ed4813fc5-68811875',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MissionContent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58db8ed4828519_11809378',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58db8ed4828519_11809378')) {function content_58db8ed4828519_11809378($_smarty_tpl) {?><html lang="zh-Hant-TW">
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <!-- DOJO -->
        <script src="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: true"></script>

        <!-- 最新編譯和最佳化的 CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- 選擇性佈景主題 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

        <!-- 最新編譯和最佳化的 JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>




    </head>
    <body>
    <body role="document">

        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">MMS - My Mission System</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mission System<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">Singleplayer Mission</li><!--小類別 單人-->
                                <li><a href="index.php?action=KPIMission">KPIMission</a></li><!--設立短期目標的KPI系統-->
                                <li><a href="index.php?action=MissionAndPoint">Mission & Point</a></li><!--任務與計分系統-->
                                <li><a href="index.php?action=Store">Shop Store</a></li><!--分數購物商店-->
                                <li role="separator" class="divider"></li><!--分隔橫線-->
                                <li class="dropdown-header">Multiplayer Mission</li><!--小類別 多人-->
                                <li><a href="#">Mission & Point</a></li><!--任務與計分系統-->
                                <li><a href="#">Friend</a></li><!--朋友設定-->
                                <li><a href="#">Set Up</a></li><!--環境設定-->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About Anything<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#about">About Developers</a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container" style="margin-top: 80px;">
            <?php echo $_smarty_tpl->tpl_vars['MissionContent']->value;?>

        </div>

    </body>
</html><?php }} ?>
