<!DOCTYPE html>
<html class="wide wow-animation" lang="fa" dir="rtl">

<head>
	<!-- Site Title-->
	<title>ورود کاربران</title>
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<meta name="theme-color" content="#f6d014">
	<!-- Stylesheets-->
	<link rel="stylesheet" href="../templates/tepmlate/css/bootstrap.css">
	<link rel="stylesheet" href="../templates/tepmlate/css/style.css">
	<link rel="stylesheet" href="../templates/tepmlate/css/fonts.css">
	<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="نسخه مرورگر شما قدیمی است! برای مرور بهتر و امن تر اینترنت مرورگر خود را به روز رسانی نمایید."></a></div>
    <script src="js/html5shiv.min.js"></script>
	<![endif]-->
</head>

<body>
	<div id="page-loader">
		<div class="cssload-container">
			<div class="cssload-speeding-wheel"></div>
		</div>
	</div>
	<!-- Page-->
	<div class="page">
		<!-- PANEL-->
		<!-- END PANEL-->
		<!-- Page header-->
		<header class="page-header">
			<!-- RD Navbar-->
			<div class="rd-navbar-wrap">
				<nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" data-lg-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-stick-up-clone="false" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-md-stick-up-offset="115px" data-lg-stick-up-offset="35px">
                     <?php
                    include("../templates/inc_template/headerup.php");
                    ?>
					<div class="rd-navbar-inner rd-navbar-search-wrap">
						<!-- RD Navbar Panel-->
						<div class="rd-navbar-panel rd-navbar-search-lg_collapsable">
							<button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
							<!-- RD Navbar Brand-->
							<div class="rd-navbar-brand">
								<a class="brand-name" href="../pageorginal/index.php"><img src="../templates/tepmlate/images/images/icon.jpg" alt="" width="151" height="44" srcset="../templates/tepmlate/images/images/icon.jpg"></a>
							</div>
						</div>
						<!-- RD Navbar Nav-->
						<div class="rd-navbar-nav-wrap rd-navbar-search_not-collapsable">
							<!-- RD Navbar Nav-->
							<div class="rd-navbar__element rd-navbar-search_collapsable">
								<button class="rd-navbar-search__toggle rd-navbar-fixed--hidden" data-rd-navbar-toggle=".rd-navbar-search-wrap"></button>
							</div>
							<!-- RD Search-->
							<div class="rd-navbar-search rd-navbar-search_toggled rd-navbar-search_not-collapsable">
								<form class="rd-search" action="search-results.html" method="GET">
									<div class="form-wrap">
										<input class="form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off">
										<label class="form-label" for="rd-navbar-search-form-input">عبارت مورد جستجو</label>
									</div>
									<button class="rd-search__submit" type="submit"></button>
								</form>
								<div class="rd-navbar-fixed--hidden">
									<button class="rd-navbar-search__toggle" data-custom-toggle=".rd-navbar-search-wrap" data-custom-toggle-disable-on-blur="true"></button>
								</div>
							</div>
                            <?php
                            include("../templates/inc_template/menu.php");
                            ?>
						</div>
					</div>
				</nav>
			</div>
		</header>
		<!-- Parallax header-->
		<section class="bg-gray-dark">
			<section class="section parallax-container" data-parallax-img="./images/headerimagesignin1.PNG" style="width: 1519.2px; height: 600px;">
				<div class="parallax-content parallax-header">
					<div class="parallax-header__inner">
						<div class="parallax-header__content">
							<div class="container">
								<div class="row justify-content-sm-center">
									<div class="col-md-10 col-xl-8">
										<h2 class="heading-decorated">صفحه ورود کاربران</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

		</section>


		<section class="section-md bg-default" >
			<div class="container">
				<div class="row row-50">
					
					<div class="col-md-7 col-lg-8">
						<h4 class="heading-decorated">ورود کاربران</h4>
						<!-- RD Mailform-->
						
                              <form class="form-horizontal" role="form" method = "post" action="signinusers.php?page=../templates/inc_template/menuusers.php"  enctype="multipart/form-data">
							
                            <div class="form-wrap form-wrap_icon linear-icon-man">
								<input class="form-input" id="contact-name" type="text" name="username" pattern="[A-Za-z].{3,}">
								<label class="form-label" for="contact-name">نام کاربری</label>
							</div>
                             <div class="form-wrap form-wrap_icon linear-icon-man">
								<input class="form-input" id="contact-name" type="password" name="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" >
								<label class="form-label" for="contact-name">رمز عبور</label>
							</div>
							<button class="button button-primary" type="submit" name="submit">ارسال</button>
                            <button class="button button-primary" type="submit" name="submit"><a href="../pageorginal/index.php" style=" color: #FFFFFF;">لغو</button>
						</form>
					</div>
				</div>
			</div>
		</section>

		<!-- Page Footer-->
        <?php
        include("../templates/inc_template/headerdown.php");
        ?>

	</div>
	
	<!-- Javascript-->
	<script src="../templates/tepmlate/js/core.min.js">


	</script>
	<script src="../templates/tepmlate/js/script.js"></script>
</body>

</html>