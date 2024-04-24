<?php
include( "../functions/connection.php" );
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="fa" dir="rtl">

<head>
	<!-- Site Title-->
	<title>درب و پنجره سازی ثامن</title>
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<link rel="icon" href="../templates/tepmlate/images/favicon.ico" type="image/x-icon">
	<meta name="theme-color" content="#f6d014">
	<!-- Stylesheets-->
	<link rel="stylesheet" href="../templates/tepmlate/css/bootstrap.css">
	<link rel="stylesheet" href="../templates/tepmlate/css/style.css">
	<link rel="stylesheet" href="../templates/tepmlate/css/fonts.css">
	<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="نسخه مرورگر شما قدیمی است! برای مرور بهتر و امن تر اینترنت مرورگر خود را به روز رسانی نمایید."></a></div>
    <script src="js/html5shiv.min.js"></script>
	<![endif]-->
    <style>
    #moretwo{display:none;}
    #moreupvc{display:none;}
    #moretree{display:none;}
    </style>
</head>
        <script>
                function showmore(dottextId, bnttextId, mortextId)
                    {
                        var dottext = document.getElementById(dottextId);
                        var bnttext = document.getElementById(bnttextId);
                        var mortext = document.getElementById(mortextId);
                        if(dottext.style.display === "none"){
                            dottext.style.display = "inline";
                            mortext.style.display = "none";
                            bnttext.innerHTML = "ادامه  ...";
                        }
                        else{
                            dottext.style.display = "none";
                            mortext.style.display = "inline";
                            bnttext.style.display = "none";
                        }
                    }
        </script>
<body>
	<div id="page-loader">
		<div class="cssload-container">
			<div class="cssload-speeding-wheel"></div>
		</div>
	</div>
	<!-- Page-->
	
		<!-- END PANEL-->
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
								<a class="brand-name" href="../templates/tepmlate/index.html"><img src="./images/samen.jpg" alt="" width="151" height="44" srcset="./images/samen.jpg 2x"></a>
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
								<form class="rd-search" action="../templates/tepmlate/search-results.html" method="GET">
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
							<div class="rd-navbar-search_collapsable">
								<ul class="rd-navbar-nav">
									<li class="active"><a href="../templates/tepmlate/index.php">خانه</a>
										
									</li>
									<li><a href="#">ویژگی ها</a>
										<ul class="rd-navbar-dropdown">
											<li><a href="#">سرصفحه ها</a>
												<ul class="rd-navbar-dropdown">
													<li><a href="../templates/tepmlate/header-default.html">سرصفحه پیش فرض</a></li>
													<li><a href="../templates/tepmlate/header-default-dark.html">سرصفحه پیش فرض تیره</a></li>
													<li><a href="../templates/tepmlate/header-modern.html">سرصفحه مدرن</a></li>
													<li><a href="../templates/tepmlate/header-creative.html">سرصفحه خلاقانه</a></li>
													<li><a href="../templates/tepmlate/header-corporate.html">سرصفحه شرکتی</a></li>
													<li><a href="../templates/tepmlate/header-transparent.html">سرصفحه شفاف</a></li>
													<li><a href="../templates/tepmlate/header-minimal.html">سرصفحه ساده</a></li>
													<li><a href="../templates/tepmlate/header-sidebar.html">سرصفحه نوار کناری</a></li>
													<li><a href="../templates/tepmlate/header-sidebar-variant-2.html">سرصفحه نوار کناری 2</a></li>
												</ul>
											</li>
											<li><a href="#">پاصفحه ها</a>
												<ul class="rd-navbar-dropdown">
													<li><a href="../templates/tepmlate/footer-default.html">پاصفحه پیش فرض</a></li>
													<li><a href="../templates/tepmlate/footer-minimal.html">پاصفحه ساده</a></li>
													<li><a href="../templates/tepmlate/footer-modern.html">پاصفحه مدرن</a></li>
												</ul>
											</li>
										</ul>
									</li>
									<li><a href="../templates/tepmlate/about.html">درباره ما</a>
									</li>
									<li><a href="../templates/tepmlate/services.html">خدمات</a>
										<ul class="rd-navbar-dropdown">
											<li><a href="../templates/tepmlate/single-service.html">جزئیات خدمات</a>
											</li>
										</ul>
									</li>
									<li><a href="../templates/tepmlate/projects.html">پروژه ها</a>
										<ul class="rd-navbar-dropdown">
											<li><a href="../templates/tepmlate/project-category.html">دسته‌بندی پروژه ها</a>
											</li>
											<li><a href="../templates/tepmlate/single-project.html">جزئیات پروژه</a>
											</li>
										</ul>
									</li>
									<li><a href="#">صفحات</a>
										<ul class="rd-navbar-megamenu">
											<li>
												<p class="rd-megamenu-header">عمومی</p>
												<ul class="rd-megamenu-list">
													<li><a href="../templates/tepmlate/about.html">درباره ما</a></li>
													<li><a href="../templates/tepmlate/our-team.html">تیم ما</a></li>
													<li><a href="../templates/tepmlate/team-member-profile.html">پروفایل عضو تیم</a></li>
													<li><a href="../templates/tepmlate/services.html">خدمات</a></li>
													<li><a href="../templates/tepmlate/single-service.html">جزئیات خدمات</a></li>
												</ul>
											</li>
											<li>
												<p class="rd-megamenu-header">صفحات خاص</p>
												<ul class="rd-megamenu-list">
													<li><a href="../templates/tepmlate/404-page.html">صفحه 404</a></li>
													<li><a href="../templates/tepmlate/search-results.html">نتایج جستجو</a></li>
													<li><a href="../templates/tepmlate/coming-soon.html">به زودی</a></li>
													<li><a href="../templates/tepmlate/privacy-policy.html">حریم خصوصی</a></li>
												</ul>
											</li>
											<li>
												<p class="rd-megamenu-header">عناصر #1</p>
												<ul class="rd-megamenu-list">
													<li><a href="../templates/tepmlate/accordion.html">باز و بسته شونده</a></li>
													<li><a href="../templates/tepmlate/tabs.html">تب ها</a></li>
													<li><a href="../templates/tepmlate/buttons.html">دکمه ها</a></li>
													<li><a href="../templates/tepmlate/typography.html">تایپوگرافی</a></li>
												</ul>
											</li>
											<li>
												<p class="rd-megamenu-header">عناصر #2</p>
												<ul class="rd-megamenu-list">
													<li><a href="../templates/tepmlate/countdown.html">شمارش معکوس</a></li>
													<li><a href="../templates/tepmlate/animated-counter.html">شمارنده متحرک</a></li>
													<li><a href="../templates/tepmlate/number-counter.html">شمارنده عددی</a></li>
													<li><a href="../templates/tepmlate/circles-counter.html">شمارنده دایره‌ای</a></li>
												</ul>
											</li>
										</ul>
									</li>
									<li><a href="#">بلاگ</a>
										<ul class="rd-navbar-dropdown">
											<li><a href="#">فرمت‌های پست‌ها</a>
												<ul class="rd-navbar-dropdown">
													<li><a href="../templates/tepmlate/standard-post.html">مطلب استاندارد</a></li>
													<li><a href="../templates/tepmlate/gallery-post.html">مطلب گالری</a></li>
													<li><a href="../templates/tepmlate/image-post.html">مطلب تصویری</a></li>
													<li><a href="../templates/tepmlate/link-post.html">مطلب لینک</a></li>
													<li><a href="../templates/tepmlate/quote-post.html">مطلب نقل قول</a></li>
													<li><a href="../templates/tepmlate/video-post.html">مطلب ویدیویی</a></li>
													<li><a href="../templates/tepmlate/audio-post.html">مطلب صوتی</a></li>
												</ul>
											</li>
											<li><a href="#">طرح های بلاگ</a>
												<ul class="rd-navbar-dropdown">
													<li><a href="../templates/tepmlate/classic-blog.html">بلاگ کلاسیک</a></li>
													<li><a href="../templates/tepmlate/grid-blog.html">بلاگ توری</a></li>
													<li><a href="../templates/tepmlate/masonry-blog.html">بلاگ کاشی</a></li>
													<li><a href="../templates/tepmlate/justify-blog.html">بلاگ کشیده</a></li>
												</ul>
											</li>
											<li><a href="#">نوار کناری</a>
												<ul class="rd-navbar-dropdown">
													<li><a href="../templates/tepmlate/left-sidebar.html">نوار کناری چپ</a></li>
													<li><a href="../templates/tepmlate/right-sidebar.html">نوار کناری راست</a></li>
													<li><a href="../templates/tepmlate/no-sidebar.html">بدون نوار کناری</a></li>
												</ul>
											</li>
										</ul>
									</li>
									<li><a href="../templates/tepmlate/contacts.html">تماس</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</header>
		<!-- Swiper-->
		<section>
			<div class="swiper-container swiper-slider swiper-slider_fullheight bg-gray-dark" data-simulate-touch="false" data-loop="true" data-autoplay="5000">
				<div class="swiper-wrapper">
					<div class="swiper-slide" data-slide-bg="./images/image1.jpg">
						<div class="swiper-slide-caption text-left">
							<div class="container">
								<div class="row justify-content-center justify-content-xxl-start">
									<div class="col-lg-10 col-xxl-6">
										<h1 data-caption-animate="fadeInUpSmall">از آغاز تا پایان</h1>
										<h5 class="font-weight-normal primary-font" data-caption-animate="fadeInUpSmall" data-caption-delay="200">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و</h5><a class="button button-primary" data-caption-animate="fadeInUpSmall" data-caption-delay="350" href="../templates/tepmlate/projects.html">مشاهده پروژه های اخیر</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="swiper-slide text-right" data-slide-bg="./images/image2.jpg">
						<div class="swiper-slide-caption">
							<div class="container">
								<div class="row justify-content-center justify-content-xxl-end">
									<div class="col-lg-10 col-xxl-7">
										<h1 data-caption-animate="fadeInUpSmall">رویا از شما، ساختن با ما</h1>
										<h5 class="font-weight-normal primary-font" data-caption-animate="fadeInUpSmall" data-caption-delay="200">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</h5><a class="button button-primary" data-caption-animate="fadeInUpSmall" data-caption-delay="350" href="../templates/tepmlate/projects.html">مشاهده پروژه های اخیر</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Swiper Pagination-->
				<div class="swiper-pagination"></div>
				<!-- Swiper Navigation-->
				<div class="swiper-button-prev linear-icon-chevron-right"></div>
				<div class="swiper-button-next linear-icon-chevron-left"></div>
			</div>
		</section>

		<section class="section-xs section-cta bg-image bg-image-7 text-center text-md-left">
			<div class="container">
				<div class="row row-30 justify-content-between align-items-center">
					<div class="col-12 col-md-8">
						<h4>خدمات سریع و مطمئن برای پروژه شما!</h4>
					</div>
					<div class="col-12 col-md-4 text-md-right"><a class="button button-primary" href="../templates/tepmlate/about.html">بیشتر بخوانید</a></div>
				</div>
			</div>
		</section>
		<!-- Our Services-->
		<section class="section-md bg-default text-center">
			<div class="container">
				<h4 class="heading-decorated">خدمات UPVC</h4>
				<div class="row row-50 justify-content-md-center justify-content-lg-start">
					<div class="col-md-6 col-xl-4">
						<!-- Blurb circle-->
						<article class="blurb blurb-minimal">
							<div class="unit flex-row unit-spacing-md">
								<div class="unit-left">
									<div class="blurb-minimal__icon"><span class="icon linear-icon-pencil-ruler"></span></div>
								</div>
								<div class="unit-body">
									<p class="blurb__title heading-6"><a href="../templates/tepmlate/single-service.html">پنجره دوجداره</a></p>
									<p align="justify">
                                   پنجره دوجداره از شیشه های دو جداره با فریم UPVC تولید می شود. یو پی وی سی نوعی جایگزین برای آلیاژهای فلزی و غیر فلزی در ساخت درب و پنجره می باشد.ره دو جداره بر پایه شیشه دو جداره است.
                                        <span id="dotstwo">...</span>
                                         <span id ="moretwo">
از ویژگی های بارز این پنجره ها می توان به وزن سبک، مقاومت بسیار بالا در برابر تغییرات جوی و عدم اشتعال پذیری اشاره نمود. اساس پنجره دو جداره بر پایه شیشه دو جداره است.

در این نوع پنجره دو یا چند لایه شیشه به کمک نوار اسپیسر که دور تا دور آن ها قرارگرفته از همدیگر جدا شدند و فضای بین شیشه ها با هوا یا گاز آرگون و یا SF6 پر می شود.

اسپیسرها اصولا از جنس آلومینیوم هستند که درون آن ها با ماده سیلیکا ژل که نوعی رطوبت گیر است و رطوبت هوای بین دو شیشه را جذب می کند پرشده است.
                                         </span>
                                    </p>
                                    <a onclick="showmore('dotstwo','mybtntwo','moretwo')" id="mybtntwo">ادامه مطالب</a>
                                        
								</div>
							</div>
						</article>
					</div>
					<div class="col-md-6 col-xl-4">
						<!-- Blurb circle-->
						<article class="blurb blurb-minimal">
							<div class="unit flex-row unit-spacing-md">
								<div class="unit-left">
									<div class="blurb-minimal__icon"><span class="icon linear-icon-users"></span></div>
								</div>
								<div class="unit-body">
									<p class="blurb__title heading-6"><a href="../templates/tepmlate/single-service.html">UPVC</a></p>
									<p align="justify">
                                    upvc مخفف عبارت” Unplasticised Poly Vinyl Chloride” می باشد و به معنای PVC سخت شده است و PVC اصلی ترین ماده تشکیل دهنده upvc می باشد.
                                    <span id="dotsupvc">...</span>
                                      <span id ="moreupvc"> 
                                    این ماده مشتقات اصلی نفت خام و نمک طعام تشکیل شده و در فرآیند تولید UPVC، مواد مختلفی مانند ضربه گیرها، تثبیت کننده ها، مواد ضد احتراق، پرکننده ها، کمک کنندها، رنگ های صنعتی و روان سازها به آن اضافه می گردد. این محصولات سازگار با محیط زیست هستند و به نوعی طراحی گردیده اند که با شرایط آب و هوایی ایران مطابقت دارند. برای تشخیص اصل بودن پروفیل UPVC راه های زیادی موجود است .

پروفیل UPVC از 62- تا 81+ درجه سانتی گراد هیچگونه تغییری از نظر رنگ پریدگی یا انحنا و خمش در آن به وجود نخواهد آمد.
                                   </span>
                                    </p>
                                   <a onclick="showmore('dotsupvc','mybtnupvc','moreupvc')" id="mybtnupvc">ادامه مطالب</a>
                                        
								</div>
							</div>
						</article>
					</div>
					<div class="col-md-6 col-xl-4">
						<!-- Blurb circle-->
						<article class="blurb blurb-minimal">
							<div class="unit flex-row unit-spacing-md">
								<div class="unit-left">
									<div class="blurb-minimal__icon"><span class="icon linear-icon-wall"></span></div>
								</div>
								<div class="unit-body">
									<p class="blurb__title heading-6"><a href="../templates/tepmlate/single-service.html">پنجره سه جداره</a></p>
									<p align="justify">
                                    نورپردازی، یک موضوع مهم در انتخاب پنجره‌هاست. پنجره‌ها، جذب گرمای خورشیدی را با روکش‌هایی به نام Low-E که بر روی یکی از سطوح قسمت‌های داخلی شیشه قرار می‌گیرند، کاهش می‌دهند. روکش‌های Low-E با مسدود کردن اشعه‌های تولید کننده گرما یا مادون قرمز خورشید، عمل می‌کنند.
                                    <span id="dotstree">...</span>
                                      <span id ="moretree"> 
                                   سازندگان این نوع پنجره‌ها ادعا می‌کنند که Low-E برای افزایش مقدار نور قابل رویتی که یک پنجره به داخل هدایت می‌کند و در عین حال گرمای حاصل از نور مستقیم خورشید را مسدود می‌کند، نیز طراحی شده‌اند. اگرچه، برخی بر این باورند که روکش‌های Low-E بر روی شیشه دوجداره، هم اتاق‌ها و هم شیشه سه‌جداره را به نحو قابل توجهی تاریک‌ تر می‌سازند.
                                   </span>
                                    </p>
                                   <a onclick="showmore('dotstree','mybtntree','moretree')" id="mybtntree">ادامه مطالب</a>
                                        
								</div>
							</div>
						</article>
					</div>
				</div>
			</div>
		</section>

		<!-- About us-->
		<section class="bg-gray-lighter object-wrap">
			<div class="section-lg">
				<div class="container">
					<div class="row">
						<div class="col-lg-5">
							<h4 class="heading-decorated">تاریخچه ما</h4>
							<p align="justify">گروه صنعتی ثامن  در سال 1400 با رسالت حفظ انرژی و کمک به زمین سبز فعالیت خود را با تولید پنجره دوجداره Upvc  و شیشه دوجداره صنعتی آغاز نمود.</p>
							
						</div>
					</div>
				</div>
			</div>
			<div class="object-wrap__body object-wrap__body-sizing-1 object-wrap__body-md-right bg-image" style="background-image: url(./images/history.jpg);"></div>
		</section>
		<!-- running projects-->
		<section class="section-md bg-default text-center">
			<div class="container">
				<h4 class="heading-decorated">پروژه های در حال اجرا</h4>
				<div class="row row-50">
					<div class="col-md-6 col-xl-4">
						<!-- Post project-->
						<article class="post-project">
							<a class="img-thumbnail-variant-1" href="../templates/tepmlate/images/project-1-652x491.jpg" data-photo-swipe-item="" data-size="652x491">
								<figure><img class="post-project__image" src="../templates/tepmlate/images/project-1-652x491.jpg" alt="" width="652" height="491">
								</figure>
								<div class="caption"><span class="icon icon-lg linear-icon-magnifier"></span></div>
							</a>
							<div class="post-project__body">
								<h6 class="post-project__title"><a href="../templates/tepmlate/project-category.html">سلامتی</a></h6>
								<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و</p><a class="button button-link" href="../templates/tepmlate/project-category.html">مشاهده پروژه‌ها</a>
							</div>
						</article>
					</div>
					<div class="col-md-6 col-xl-4">
						<!-- Post project-->
						<article class="post-project">
							<a class="img-thumbnail-variant-1" href="../templates/tepmlate/images/project-2-652x491.jpg" data-photo-swipe-item="" data-size="652x491">
								<figure><img class="post-project__image" src="../templates/tepmlate/images/project-2-652x491.jpg" alt="" width="652" height="491">
								</figure>
								<div class="caption"><span class="icon icon-lg linear-icon-magnifier"></span></div>
							</a>
							<div class="post-project__body">
								<h6 class="post-project__title"><a href="../templates/tepmlate/project-category.html">آموزشی</a></h6>
								<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم</p><a class="button button-link" href="../templates/tepmlate/project-category.html">مشاهده پروژه‌ها</a>
							</div>
						</article>
					</div>
					<div class="col-md-6 col-xl-4">
						<!-- Post project-->
						<article class="post-project">
							<a class="img-thumbnail-variant-1" href="../templates/tepmlate/images/project-3-652x491.jpg" data-photo-swipe-item="" data-size="652x491">
								<figure><img class="post-project__image" src="../templates/tepmlate/images/project-3-652x491.jpg" alt="" width="652" height="491">
								</figure>
								<div class="caption"><span class="icon icon-lg linear-icon-magnifier"></span></div>
							</a>
							<div class="post-project__body">
								<h6 class="post-project__title"><a href="../templates/tepmlate/project-category.html">تجاری</a></h6>
								<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p><a class="button button-link" href="../templates/tepmlate/project-category.html">مشاهده پروژه‌ها</a>
							</div>
						</article>
					</div>
					<div class="col-md-6 col-xl-4">
						<!-- Post project-->
						<article class="post-project">
							<a class="img-thumbnail-variant-1" href="../templates/tepmlate/images/project-4-652x491.jpg" data-photo-swipe-item="" data-size="652x491">
								<figure><img class="post-project__image" src="../templates/tepmlate/images/project-4-652x491.jpg" alt="" width="652" height="491">
								</figure>
								<div class="caption"><span class="icon icon-lg linear-icon-magnifier"></span></div>
							</a>
							<div class="post-project__body">
								<h6 class="post-project__title"><a href="../templates/tepmlate/project-category.html">تولیدی / صنعتی</a></h6>
								<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان</p><a class="button button-link" href="../templates/tepmlate/project-category.html">مشاهده پروژه‌ها</a>
							</div>
						</article>
					</div>
					<div class="col-md-6 col-xl-4">
						<!-- Post project-->
						<article class="post-project">
							<a class="img-thumbnail-variant-1" href="../templates/tepmlate/images/project-5-652x491.jpg" data-photo-swipe-item="" data-size="652x491">
								<figure><img class="post-project__image" src="../templates/tepmlate/images/project-5-652x491.jpg" alt="" width="652" height="491">
								</figure>
								<div class="caption"><span class="icon icon-lg linear-icon-magnifier"></span></div>
							</a>
							<div class="post-project__body">
								<h6 class="post-project__title"><a href="../templates/tepmlate/project-category.html">اطلاعات / تکنولوژی</a></h6>
								<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط</p><a class="button button-link" href="../templates/tepmlate/project-category.html">مشاهده پروژه‌ها</a>
							</div>
						</article>
					</div>
					<div class="col-md-6 col-xl-4">
						<!-- Post project-->
						<article class="post-project">
							<a class="img-thumbnail-variant-1" href="../templates/tepmlate/images/project-6-652x491.jpg" data-photo-swipe-item="" data-size="652x491">
								<figure><img class="post-project__image" src="../templates/tepmlate/images/project-6-652x491.jpg" alt="" width="652" height="491">
								</figure>
								<div class="caption"><span class="icon icon-lg linear-icon-magnifier"></span></div>
							</a>
							<div class="post-project__body">
								<h6 class="post-project__title"><a href="../templates/tepmlate/project-category.html">دولتی / نظامی</a></h6>
								<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی</p><a class="button button-link" href="../templates/tepmlate/project-category.html">مشاهده پروژه‌ها</a>
							</div>
						</article>
					</div>
				</div>
			</div>
		</section>
		<!-- counters-->
		<section class="section-md bg-accent text-center">
			<div class="container">
				<div class="row justify-content-md-center row-50">
					<div class="col-md-6 col-lg-3">
						<!-- Box counter-->
						<article class="box-counter">
							<div class="box-counter__icon linear-icon-coffee-cup"></div>
							<div class="box-counter__wrap">
								<div class="counter">2</div>
							</div>
							<p class="box-counter__title">سال تجربه</p>
						</article>
					</div>
					<div class="col-md-6 col-lg-3">
						<!-- Box counter-->
						<article class="box-counter">
							<div class="box-counter__icon linear-icon-cube"></div>
							<div class="box-counter__wrap"> 
                               <?php
                               $sql = "SELECT COUNT(DISTINCT Id) AS count FROM projects";
                                $CountProject = mysqli_query($conn, $sql);
                                $result = mysqli_fetch_array($CountProject);
                                
                                ?>
								<div class="counter"><?php echo $result['count'];?></div>
							</div>
							<p class="box-counter__title">پروژه اجرا شده</p>
						</article>
					</div>
					<div class="col-md-6 col-lg-3">
						<!-- Box counter-->
						<article class="box-counter">
							<div class="box-counter__icon linear-icon-chevrons-expand-horizontal"></div>
							<div class="box-counter__wrap">
								<div class="counter">15</div>
							</div>
							<p class="box-counter__title">شرکای تجاری</p>
						</article>
					</div>
					<div class="col-md-6 col-lg-3">
						<!-- Box counter-->
						<article class="box-counter">
							<div class="box-counter__icon linear-icon-mustache-glasses"></div>
							<div class="box-counter__wrap">
								<?php
                               $sql = "SELECT COUNT(DISTINCT Id) AS count FROM projects";
                                $CountProject = mysqli_query($conn, $sql);
                                $result = mysqli_fetch_array($CountProject);
                                
                                ?>
								<div class="counter"><?php echo $result['count'];?></div>
							</div>
							<p class="box-counter__title">مشتری راضی</p>
						</article>
					</div>
				</div>
			</div>
		</section>
		
		<!-- Executive managers-->
		<section class="section-md bg-default text-center">
			<div class="container">
				<h4 class="heading-decorated">مدیران اجرایی</h4>
				<div class="row row-50">
					<div class="col-md-6 col-lg-4">
						<!-- Thumb flat-->
						<article class="thumb-flat"><img class="thumb-flat__image" src="../templates/tepmlate/images/calvin-fitzerald-418x315.jpg" alt="" width="418" height="315">
							<div class="thumb-flat__body">
								<p class="heading-6"><a href="../templates/tepmlate/team-member-profile.html">تونی استارک</a></p>
								<p class="thumb-flat__subtitle">رئیس</p>
								<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها</p>
							</div>
						</article>
					</div>
					<div class="col-md-6 col-lg-4">
						<!-- Thumb flat-->
						<article class="thumb-flat"><img class="thumb-flat__image" src="../templates/tepmlate/images/taylor-wilson-418x315.jpg" alt="" width="418" height="315">
							<div class="thumb-flat__body">
								<p class="heading-6"><a href="../templates/tepmlate/team-member-profile.html">اولیور کوئین</a></p>
								<p class="thumb-flat__subtitle">مدیر اجرایی</p>
								<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان</p>
							</div>
						</article>
					</div>
					<div class="col-md-6 col-lg-4">
						<!-- Thumb flat-->
						<article class="thumb-flat"> <img class="thumb-flat__image" src="../templates/tepmlate/images/josh-wagner-418x315.jpg" alt="" width="418" height="315">
							<div class="thumb-flat__body">
								<p class="heading-6"><a href="../templates/tepmlate/team-member-profile.html">جان اسنو</a></p>
								<p class="thumb-flat__subtitle">مدیر طراحی</p>
								<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا</p>
							</div>
						</article>
					</div>
				</div>
			</div>
		</section>
		<!-- get a quote-->
		
		<section class="section-lg bg-image context-dark text-center" style="background-image: url(../comments/images/backgroundcomment.jpg);">
			<div class="container">
				<h4 class="heading-decorated">آنچه مردم می گویند</h4>
				<!-- Owl Carousel-->
				<div class="owl-carousel" data-items="1" data-stage-padding="15" data-loop="true" data-margin="30" data-dots="true" data-nav="true">
					<div class="item">
						<!-- Quote default-->
						<div class="quote-default">
                            <?php
                           $sql = "SELECT comments.Id as Id ,comments.Description as Description,comments.Pictures as Pictures,
                                   CONCAT(users.FirstName,' ',users.LastName) as Name FROM comments 
                                   JOIN users ON users.Id=comments.User_Id
                                   WHERE comments.Id = 2";
                            $CountProject = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_array($CountProject);

                            ?>
                            <div class="quote-default__image"><img src="<?=$result['Pictures'];?>" alt="" width="120" height="120">
                            </div>
                            <div class="quote-default__text">
                            <p class="q">


                            <?php echo $result['Description'];?>

                            </p>
							</div>
							<p class="quote-default__cite"><?php echo $result['Name'];?></p>
						</div>
					</div>
					<div class="item">
						<!-- Quote default-->
						<div class="quote-default">
                            <?php
                           $sql = "SELECT comments.Id as Id ,comments.Description as Description,comments.Pictures as Pictures,
                                   CONCAT(users.FirstName,' ',users.LastName) as Name FROM comments 
                                   JOIN users ON users.Id=comments.User_Id
                                   WHERE comments.Id = 2";
                            $CountProject = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_array($CountProject);

                            ?>
                            <div class="quote-default__image"><img src="<?=$result['Pictures'];?>" alt="" width="120" height="120">
                            </div>
                            <div class="quote-default__text">
                            <p class="q">


                            <?php echo $result['Description'];?>

                            </p>
							</div>
							<p class="quote-default__cite"><?php echo $result['Name'];?></p>
						</div>
					</div>
					<div class="item">
						<!-- Quote default-->
						<div class="quote-default">
                            <?php
                           $sql = "SELECT comments.Id as Id ,comments.Description as Description,comments.Pictures as Pictures,
                                   CONCAT(users.FirstName,' ',users.LastName) as Name FROM comments 
                                   JOIN users ON users.Id=comments.User_Id
                                   WHERE comments.Id = 2";
                            $CountProject = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_array($CountProject);

                            ?>
                            <div class="quote-default__image"><img src="<?=$result['Pictures'];?>" alt="" width="120" height="120">
                            </div>
                            <div class="quote-default__text">
                            <p class="q">


                            <?php echo $result['Description'];?>

                            </p>
							</div>
							<p class="quote-default__cite"><?php echo $result['Name'];?></p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="section-md text-center bg-default">
			<div class="container">
				<h4 class="heading-decorated">مشتریان ما</h4>
				<div class="row row-30">
					<div class="col-sm-6 col-md-3">
						<figure class="box-icon-image">
							<a href="#"><img src="../templates/tepmlate/images/company-1-126x102.png" alt="" width="126" height="102"></a>
						</figure>
					</div>
					<div class="col-sm-6 col-md-3">
						<figure class="box-icon-image">
							<a href="#"><img src="../templates/tepmlate/images/company-2-134x102.png" alt="" width="134" height="102"></a>
						</figure>
					</div>
					<div class="col-sm-6 col-md-3">
						<figure class="box-icon-image">
							<a href="#"><img src="../templates/tepmlate/images/company-3-132x102.png" alt="" width="132" height="102"></a>
						</figure>
					</div>
					<div class="col-sm-6 col-md-3">
						<figure class="box-icon-image">
							<a href="#"><img src="../templates/tepmlate/images/company-4-126x102.png" alt="" width="126" height="102"></a>
						</figure>
					</div>
					<div class="col-sm-6 col-md-3">
						<figure class="box-icon-image">
							<a href="#"><img src="../templates/tepmlate/images/company-5-138x102.png" alt="" width="138" height="102"></a>
						</figure>
					</div>
					<div class="col-sm-6 col-md-3">
						<figure class="box-icon-image">
							<a href="#"><img src="../templates/tepmlate/images/company-6-143x102.png" alt="" width="143" height="102"></a>
						</figure>
					</div>
					<div class="col-sm-6 col-md-3">
						<figure class="box-icon-image">
							<a href="#"><img src="../templates/tepmlate/images/company-7-109x102.png" alt="" width="109" height="102"></a>
						</figure>
					</div>
					<div class="col-sm-6 col-md-3">
						<figure class="box-icon-image">
							<a href="#"><img src="../templates/tepmlate/images/company-8-109x102.png" alt="" width="109" height="102"></a>
						</figure>
					</div>
				</div>
			</div>
		</section>
		<!-- Page Footer -->
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