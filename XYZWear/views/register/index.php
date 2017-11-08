	


<header>
        <!-- begin topBar -->
        <div class="topBar">
            <div class="container">
                <div class="row">
                    <div class="headerContact">
                        <div class="email">
                            <i class="fa fa-envelope-o"></i>
                            <span></span>
                        </div>
                        <div class="phone">
                            <i class="fa fa-mobile-phone"></i>
                            <span></span>
                        </div>
                    </div>
                    <div class="shortcut hidden-xs">
                        <ul>
                            <li>
                                <a href="">Login</a>
                            </li>
                            <li>
                                <a href="?controller=register&action=index">Register</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end topBar -->
        <!-- begin nav -->
        <div class="container">
            <div class="row">
                <nav>
                    <div class="headerLogo">
                        <a href="?controller=pages&action=home">
                            <img src="static/img/xyz_logo.png" alt="XYZ Wear Corporation" />
                        </a>
                    </div>
                    <div class="mainNav" id="mainNav">
                        <div class="navBg"></div>
                        <ul id="mainNavUl">
                            <div id="navCloseBtn">
                                <i class="fa fa-times"></i>
                            </div>
                            <li>
                                <a href="?controller=pages&action=home">Home</a>
                            </li>
                            <li>
                                <a href="?controller=buyproduct&action=index">Product</a>
                            </li>
                            <li>
                                <a href="">Store</a>
                            </li>
                            <li>
                                <a href="">About us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- end nav -->
        <img class="bg" src="static/img/bg.png">
    </header>
    <div class="contentBody detailPage">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mainContent">
                    <section>
                        <div class="row">
                            <div class="sectionTitle m-margin-20">
                                <div class="breadcrumbs">
                                    <span>Registration</span>
                                </div>
                            </div>
                            <div class="myForm m-margin-bottom-20" style="padding-top: 25px">
                                <form method="POST" action="index.php?controller=register&action=register">
                                	<div class="row m-margin-bottom-10">
                                        <div class="col-md-3">
                                            <span class="pull-right" style="padding: 10px 0px 0px 5px">Email</span>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" id="email" name="email" style="width:60%">
                                        </div>
                                    </div>
                                    <div class="row m-margin-bottom-10">
                                        <div class="col-md-3">
                                            <span class="pull-right" style="padding: 10px 0px 0px 5px">Password</span>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" id="passwd" name="password"style="width:60%">
                                        </div>
                                    </div>
                                    <div class="row m-margin-bottom-10">
                                        <div class="col-md-3">
                                            <span class="pull-right" style="padding: 10px 0px 0px 5px">Confirm your password</span>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" id="cf_passwd" name="repassword" style="width:60%">
                                        </div>
                                    </div>
                                    <div class="row m-margin-bottom-10">
                                        <div class="col-md-3">
                                            <span class="pull-right" style="padding: 10px 0px 0px 5px">Name</span>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="name" name="name" style="width:60%">
                                        </div>
                                    </div>
                                    <div class="row m-margin-bottom-10">
                                        <div class="col-md-3">
                                            <span class="pull-right" style="padding: 10px 0px 0px 5px">Telephone</span>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="phone" name="telephone" style="width:60%">
                                        </div>
                                    </div>
                                    <div class="row m-margin-bottom-10">
                                        <div class="col-md-3">
                                            <span class="pull-right" style="padding: 10px 0px 0px 5px">Gender</span>
                                        </div>
                                        <div class="col-md-6" style="padding-top:8px">
                                            <input type="radio" value="Male" name="gender" id="male_gender">
                                            <span>Male</span>
                                            <input type="radio" value="Female" name="gender" id="female_gender">
                                            <span>Female</span>
                                        </div>
                                    </div>
                                    
                                    
                                    <?php if (!empty($_SESSION['errMsg'])){ 
                                    	echo '<div class="row m-margin-bottom-10" style="text-align: center">
                                        <div class="col-md-9">'.$_SESSION['errMsg'] . '</div>
                                    </div>';
                                    }?>
                                    <div class="row m-margin-bottom-10" style="text-align: center">
                                        <div class="col-md-9">
                                            <input type="submit" value="Register"><br>
                                        </div>
                                    </div>
                                </form>
                                <?php unset($_SESSION['errMsg']); ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footerTop">
            <div class="container">
                <div class="row">
                    <ul class="footerNav clearfix">
                        <li>
                            <a href="?controller=pages&action=home">Home</a>
                        </li>
                        <li>
                            <a href="?controller=buyproduct&action=index">Product</a>
                        </li>
                        <li>
                            <a href="">Store</a>
                        </li>
                        <li>
                            <a href="">About us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footerMid">
            <div class="container">
                <div class="row">
                    <div class="about">

                    </div>
                </div>
            </div>
        </div>
        <div class="footerBottom">
            <div class="container">
                <div class="row">
                    <div class="copyright">&copy; Copyright by XYZ Wear Corporation
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="static/js/main.js"></script>