<!DOCTYPE html>

<html>
<head>
    <title><?php if(isset($title)) echo $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Controller Specific JS/CSS -->
    <link rel="stylesheet" type="text/css" href="/css/main.css"><!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css"><?php if(isset($client_files_head)) echo $client_files_head; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript">
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript">
</script>
</head>

<body>
    <!-- Wrap all page content here -->

    <div id="wrap">
        <!-- Fixed navbar -->

        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span></button> 
                    <a class="navbar-brand" href="https://www.facebook.com/SaantiYoga">
                    <img id="saantilogo" src="/images/SaantiLogo.jpg" alt="">Saanti Yoga</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/index/index">Home</a></li>

                        <li><a href="/classes/display">Schedule</a></li><!-- ADmin User -->
                    <?php if($user and $user->role == "ADMIN"): ?>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Classes</a>

                            <ul class="dropdown-menu">
                                <li><a href="/classes/add">Add</a></li>

                                <li><a href="/index/underconstruction">Update</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Teachers</a>

                            <ul class="dropdown-menu">
                                <li><a href="/teachers/add">Add</a></li>

                                <li><a href="/index/underconstruction">Update</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users</a>

                            <ul class="dropdown-menu" >
                                <li><a href="/teachers/add">Add</a></li>
                                <li><a href="/index/underconstruction">Edit</a></li>
                            </ul>
						</li>
                        <li class="dropdown">
                        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Miscellaneous</a>

                            <ul class="dropdown-menu">
                                <li><a href="/index/underconstruction">Edit Days</a></li>
                            </ul>
						</li>
					<?php endif; ?><!-- unauthenticated user -->
			
                    <?php if(!$user): ?>

                        <li><a class="MenuItems" href='/users/login'>Login In</a></li>

                        <li><a class="MenuItems" href='/users/signup'>Sign Up</a></li>
                    <?php else: ?>

                        <li><a class="MenuItems" href='/users/logout'>Logout</a></li>
                    <?php endif; ?>

                        <li><a href="/index/underconstruction">Contact</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div><!-- Begin page content -->

        <div class="container">
            <?php if(isset($content)) echo $content; ?>
        </div>
    </div>

    <footer>
        <div id="footer">
            <div class="container">
                <p class="text-muted">Saanti Yoga · 526 Shirley Street · Winthrop, MA 02152 • 617.329.9526</p>
            </div>
        </div>
    </footer><!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js" type="text/javascript">
</script><?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>
