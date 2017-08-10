<html lang="zh-Hant-TW">
    <title>My Mission System</title>
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

        <link rel="stylesheet" href="View/templates/Login.css">
    </head>
    
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
                                <li><a href="index.php?action=Homepage&Content=KPIMission">KPIMission</a></li><!--設立短期目標的KPI系統-->
                                <li><a href="index.php?action=Homepage&Content=MissionAndPoint">Mission & Point</a></li><!--任務與計分系統-->
                                <li><a href="index.php?action=Homepage&Content=Store">Shop Store</a></li><!--分數購物商店-->
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
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Login via
                                            <form class="form" role="form" method="post"  accept-charset="UTF-8" id="login-nav">
                                                <div class="form-group">
                                                    <label class="sr-only" for="PlayerName">PlayerName</label>
                                                    <input type="text" class="form-control" name="PlayerName" id="PlayerName" placeholder="PlayerName" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="Password">Password</label>
                                                    <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" required>
                                                    
                                                    <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="bottom text-center">
                                            New here ? <a href="#"><b>Join Us</b></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container" style="margin-top: 80px;">
            <{$MissionContent}>
        </div>

    </body>
</html>


<script>

            $("#login-nav").submit(function (e) {
                var url = "index.php?action=doLogin"; // the script where you handle the form input.
                //var url = "Controller/Action/createMission.php";
                //console.log($("#createMissionForm").serialize());
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#login-nav").serialize(), // serializes the form's elements.
                    success: function (data)
                    {
                        alert(data);
                        
                    },
                    error: function (data) {
                        console.log('An error occurred.');
                        console.log(data);
                    }
                });
                e.preventDefault(); // avoid to execute the actual submit of the form.
            })
</script>