<!doctype html>
<html>
    <?php
   
    //echo($_GET['id']);
    if(isset($_GET['id']))
    {
        $ID = $_GET['id'];
        if(isset($_GET['tmpid']))
    {
        $tmpid = $_GET['tmpid'];
        if($tmpid == 2)
        {
            $Page = "../../signin/pageusers.php?id=$ID";
            header("location: $Page");
        }
        }
    }
     $tmpid = "1";
     
    ?>
								<div class="rd-navbar-search_collapsable">
								<ul class="rd-navbar-nav">
									<li><a href="../pageorginal/index.php">خانه</a></li>
                                    <li><a>محصولات</a>
										<ul class="rd-navbar-dropdown">
											<li><a href="../products/door.php">درب</a></li>
											<li><a href="../products/window.php">پنجره</a></li>
											<li><a href="../products/glass.php">شیشه</a></li>
										</ul>
									</li>
									<li><a href="../orders/orders.php?id=<?php echo $ID;?>">سفارشات</a>
									<li><a href="../templates/tepmlate/about.html">درباره ما</a>
									</li>
									<li><a href="../templates/tepmlate/services.html">خدمات</a>
										<ul class="rd-navbar-dropdown">
											<li><a href="../templates/tepmlate/single-service.html">تعویض پنجره‌های کهنه با نو</a>
											</li>
										</ul>
									</li>
									<li><a href="../projects/project.php">پروژه‌ها</a>

									
									<li><a href="../contacts/contacts.php">تماس</a>
									</li>
								</ul>
							</div>
</html>