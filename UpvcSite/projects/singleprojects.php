<?php
include( "../functions/connection.php" );
 $ProjectsId = $_GET['IdProjects'];
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="fa" dir="rtl">

<head>
	<!-- Site Title-->
	<title>پروژه‌ها</title>
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
					<!-- RD Navbar Top Panel-->
                    <?php
                    include("../templates/inc_template/headerup.php");
                    ?>
					<div class="rd-navbar-inner rd-navbar-search-wrap">
						<!-- RD Navbar Panel-->
						<div class="rd-navbar-panel rd-navbar-search-lg_collapsable">
							<button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
							<!-- RD Navbar Brand-->
							<div class="rd-navbar-brand">
								<a class="brand-name" href="../pageorginal/index.php"><img src="../templates/tepmlate/images/images/icon.jpg" alt="" width="151" height="44" srcset="../templates/tepmlate/images/images/icon.jpg 2x"></a>
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
			<section class="section parallax-container" data-parallax-img="./images/headerimageprojects1.PNG" style="width: 1519.2px; height: 600px;">
				<div class="parallax-content parallax-header">
					<div class="parallax-header__inner">
						<div class="parallax-header__content">
							<div class="container">
								<div class="row justify-content-sm-center">
									<div class="col-md-10 col-xl-8">
										<h2 class="heading-decorated" style="color:white" >پروژه‌ها</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

		</section>

		<!-- Project category description-->
		<section class="section-md bg-default">
			<div class="container">
				<div class="divider-small"></div>
                <!--<h5>درب یو پی وی سی چیست؟</h5>
				<p align="justify">
                   درب یو پی وی سی، نوعی درب دوجداره است که با استفاده از ماده upvc تولید می‌شوند. این درب‌ها به اندازه سایر درب‌های آهنی و آلومینیومی و حتی بیشتر از آن‌ها مقاومت دارد. درب‌های دوجداره یو پی وی سی در ابعاد، طرح‌ها و رنگ‌های بسیار متنوع تولید می‌شوند. این درب‌ها به دلیل مقاومت بالا موجب افزایش امنیت محیط موردنظر می‌شوند.

این درب‌ها علاوه بر زیبایی و ظرافت موجب صرفه جویی در مصرف انرژی نیز می‌شوند. پروفیل‌های upvc دارای شبکه‌های تو خالی هستند بنابراین بهترین عایق حرارتی و برودتی محسوب می‌شوند. درب upvc سبک و کم وزن است و در برابر تغییرات آب و هوا، تغییرات دمایی و حتی آتش سوزی مقاوم بوده و تغییر شکل نمی‌دهد. تنوع رنگی از دیگر مزایای آن است.
                </p>
                <h5>درب upvc ضد آب</h5>
				<p align="justify">
                درب‌های upvc یکی از انواع درب‌های ضد آب هستند. البته انواع دیگر درب‌ها را نیز می‌توان به روش‌های مختلف ضد آب کرد، اما شناخته شده‌ترین نوع درب‌های ضدآب، همین درب‌های upvc هستند. البته لازم به ذکر است که درب‌های ضد آب upvc با درب‌های معمولی upvc متفاوت است. این کلاف و بافت درب‌های ضد آب معمولا نفوذ ناپذیر می‌شوند. هر دربی، حتی درب‌هایی که به نام ضد آب در بازار به فروش می‌رسند، باید طوری طراحی شده باشند که رطوبت و آب به داخل بافت درب نفوذ نکند، زیرا کوچکترین نفوذ آبی به داخل کلاف درب، باعث پوسیدگی و باد کردن درب می‌شود.
                </p>
                <h5>موارد استفاده از درب یو پی وی سی</h5>
				<p align="justify">
                    استفاده از درب‌های یو پی وی سی هم برای داخل خانه و هم برای خارج از خانه امکان پذیر است. این نوع درب‌ها به علت داشتن مقاومت بالا در عین سبکی و هچنین مقرون به صرفه بودن برای نصب در منازل انتخاب خوبی به حساب می‌آیند. بهترین مکان‌ها برای نصب درب upvc :
                </p>
                <ui>
                    <li>درب یو پی وی سی برای حیاط</li>
                    <li>درب upvc برای تراس یا بالکن</li>
                    <li>درب upvc برای راهروها و راه پله‌ها</li>
                    <li>درب‌های ضد آب upvc برای سرویس‌های بهداشتی</li>
                </ui>-->
                <?php

                        $sql=mysqli_query($conn,"select Discriptions from projects WHERE Id=$ProjectsId");
                        while($row=mysqli_fetch_array($sql))
                        {  
                            
                            $FileProject= $row["Discriptions"];
                            
                            $stringFileProject = $FileProject;
                           
                        }
                    $newStringPicture = str_replace("./", "", $stringFileProject);
                    $string="../../ProjectUPVC/adminpanel/projects/";
                    $NewFileProject= $string.$newStringPicture;
                    // مسیر فایل docx
                    $file = $NewFileProject;

                    // تبدیل متن فایل docx به متن قابل چاپ
                    $text = readDocx($file);
                    echo $text;

                    /**
                    * تابع برای خواندن و بازگرداندن محتوای متنی فایل docx
                    * 
                    * @param string $filename نام فایل docx
                    * @return string محتوای متنی فایل
                    */
                    function readDocx($filename){
                        $striped_content = '';
                        $content = '';

                        if(!$filename || !file_exists($filename)) return false;

                        $zip = zip_open($filename);

                        if (!$zip || is_numeric($zip)) return false;

                        while ($zip_entry = zip_read($zip)){
                            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

                            if (zip_entry_name($zip_entry) != "word/document.xml") continue;

                            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

                            zip_entry_close($zip_entry);
                        }
                        zip_close($zip);

                        // زدایش تگهای XML
                        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
                        $content = str_replace('</w:r></w:p>', "\r\n", $content);

                        // حذف تگهای XML
                        $striped_content = strip_tags($content);

                        return $striped_content;
                    }
                              
                    
                 ?>   
			</div>
		</section>

		<!-- Projects-->
		<section class="bg-default">
			<div class="container-fluid container-flex">
				<div class="row no-gutters" data-photo-swipe-gallery="gallery">
                     <?php
                                  
                        
                        $Picture = [];
                        $sql=mysqli_query($conn,"SELECT pictursprojects.Pictures as Picture FROM `projects` 
                                                JOIN pictursprojects ON pictursprojects.ProjectId=projects.Id WHERE projects.Id=$ProjectsId");
                        $i=0;
                        while($row=mysqli_fetch_array($sql))
                        {  
                            
                            $Picture[]= $row["Picture"];
                            
                            $stringPicture = $Picture[$i];
                            $newStringPicture = str_replace(" ./", "", $stringPicture);
                            $string="../../ProjectUPVC/adminpanel/projects/";
                            $NewPicture= $string.$newStringPicture;
                        ?>

					<div class="col-md-5 col-lg-4 col-xl-3">
						<!-- Thumb creative-->
						<div class="thumb-creative thumb-creative_no-cover">
							<div class="thumb-creative__inner">
								<div class="thumb-creative__front">
									<figure class="thumb-creative__image-wrap"><img class="thumb-creative__image" src="<?=$NewPicture;?>" alt="" width="400" height="200"style='min-width: 80%; height: 0;'>
									</figure>
								</div>
								<div class="thumb-creative__back">
									<figure class="thumb-creative__image-wrap"><img class="thumb-creative__image" src="<?=$NewPicture;?>" alt="" width="400" height="200"style='min-width: 80%; height: 0;'>
									</figure>
									<div class="thumb-creative__content">
										<a class="link-icon icon-md linear-icon-plus" href="<?=$NewPicture;?>" data-photo-swipe-item data-size="1200x800"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <?php    
                    ++$i;
                        }
                    ?>
				</div>
			</div>
		</section>

		<!-- Page Footer-->
		<?php
        include("../templates/inc_template/headerdown.php");
        ?>
		
	</div>
	<!-- Global Mailform Output -->
	<div class="snackbars" id="form-output-global"></div>
	<!-- PhotoSwipe Gallery-->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="pswp__bg"></div>
		<div class="pswp__scroll-wrap">
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>
			<div class="pswp__ui pswp__ui--hidden">
				<div class="pswp__top-bar">
					<div class="pswp__counter"></div>
					<button class="pswp__button pswp__button--close" title="بستن"></button>
					<button class="pswp__button pswp__button--share" title="اشتراک گذاری"></button>
					<button class="pswp__button pswp__button--fs" title="تمام صفحه"></button>
					<button class="pswp__button pswp__button--zoom" title="بزرگ/کوچک نمایی"></button>
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					<div class="pswp__share-tooltip"></div>
				</div>
				<button class="pswp__button pswp__button--arrow--left" title="قبلی"></button>
				<button class="pswp__button pswp__button--arrow--right" title="بعدی"></button>
				<div class="pswp__caption">
					<div class="pswp__caption__cent"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Javascript-->
	<script src="../templates/tepmlate/js/core.min.js">


	</script>
	<script src="../templates/tepmlate/js/script.js"></script>
</body>

</html>