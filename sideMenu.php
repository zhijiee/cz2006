<?php
    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);
    $page = end($link_array);
?>
    <div class="app-container">
        <div class="row content-container">
            <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-expand-toggle">
                            <i class="fa fa-bars icon"></i>
                        </button>
                        <ol class="breadcrumb navbar-breadcrumb">
                            <li class="active">Home</li>
                        </ol>
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-th icon"></i>
                        </button>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-times icon"></i>
                        </button>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-envelope"></i></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li class="title">
                                    Notification <span class="badge pull-right">0</span>
                                </li>
                                <li class="message">
                                    No new notification
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php
                                    if($userProfile->getNric()!='nil'){
                                         echo $userProfile->getFullName(); 
                                    }else{
                                        echo "User   ";
                                    }
                               ?><span class="caret"></span></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li class="profile-img">
                                    <img src="<?php
                                    if($userProfile->getNric()!='nil'){
                                        echo $userProfile->getProfileURL(); 
                                    }else
                                    {
                                        echo "IMG/default.png";
                                    }
                                     ?>" class="profile-img">
                                </li>
                                <li>
                                    <div class="profile-info">
                                        <h4 class="username"><?php
                                    if($userProfile->getNric()!='nil'){
                                         echo $userProfile->getFullName(); 
                                    }else{
                                        echo "User";
                                    }
                                         ?></h4>
                                        <p><?php echo $_SESSION['userEmail']; ?> </p>
                                        <div class="btn-group margin-bottom-2x" role="group">
                                            <button type="button" class="btn btn-default"><i class="fa fa-user"></i> Profile</button>
                                           <a href="index.php">
                                            <button type="button" class="btn btn-default"><i class="fa fa-sign-out"></i> Logout</button>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="side-menu sidebar-inverse">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="side-menu-container">
                        <div class="navbar-header" style="">
                            <a class="navbar-brand" href="#" style="background-color:#5EB9FF;">
                                <div class="icon"><img class="banner" style="width:30px;height:30px;" src="IMG/logo(S).png"></div>
                                <div class="title">Harmonious Living @ NTU</div>
                            </a>
                            <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                                <i class="fa fa-times icon"></i>
                            </button>
                        </div>
                        <ul class="nav navbar-nav">
                            <li
                            <?php 
                            if($page=="home.php"){
                             echo "class=\"active\"";
                            }
                            ?>
                             >
                                <a href="home.php">
                                    <span class="icon glyphicon glyphicon-home"></span><span class="title">Home</span>
                                </a>
                            </li>
                            <!--HarmoniousDB tabs-->
                                                        <!-- View Profile  -->
                            <li 
                            <?php 
                            if($page=="userProfile.php"){
                             echo "class=\"active\"";
                            }
                            ?>
                            >
                                <a href="userProfile.php">
                                    <span class="icon glyphicon glyphicon-user"></span><span class="title">Manage My Profile</span>
                                </a>
                            </li>
                                <!--End of dropdown-->  
                            <!-- ViewCurrent  -->
                            <li
                            <?php 
                            if($page=="uploadFlats.php" || $page ="compareHDB.php"){
                             echo "class=\"active\"";
                            }?>
                            >
                                <a href="http://www.google.com">
                                    <span class="icon glyphicon glyphicon-search"></span><span class="title">Browse Resale HDB</span>
                                </a>
                            </li>
                                <!--End of dropdown-->
                                <!-- View Past Listings  -->
                            <li>
                                <a href="http://facebook.com">
                                    <span class="icon glyphicon glyphicon-stats"></span><span class="title">Browse Past Trends</span>
                                </a>
                                <!-- Dropdown level 1 -->
                            </li>
                                <!--End of dropdown-->      
                            <!-- View Past Listings  -->
                            <li class="panel panel-default dropdown">
                                <a data-toggle="collapse" href="#dropdown-element">
                                    <span class="icon glyphicon glyphicon-list-alt"></span><span class="title">View My Listings</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <div id="dropdown-element" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="manageFlats.php"><span class= "icon glyphicon glyphicon-circle-arrow-up"></span>Upload My HDB123</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                                <!--End of dropdown-->        
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>