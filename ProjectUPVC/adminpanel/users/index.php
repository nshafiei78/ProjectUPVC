<?php
include( "../functions/function.php" );
include( "../functions/connect.php" );
session_start();
if(isset($_SESSION['userlogin'])){
	if(!$_SESSION['userlogin']==true){
		
        header("location:login.php");
            exit();
	}
}
else{
	header("location:login.php");
            exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mosaddek">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<link rel="shortcut icon" href="../template/img/favicon.html">
<title>صفحه اصلی</title>

<!-- Bootstrap core CSS -->
<link href="template/css/bootstrap.min.css" rel="stylesheet">
<link href="template/css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="template/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="template/css/style.css" rel="stylesheet">
<link href="template/css/style-responsive.css" rel="stylesheet" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries --> 
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <?php
//header start
@includepage( "./inc_template/header" );
//header end

//sidbar start
@includepage( "./inc_template/menu" );
//sidbar end

?>
<section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                            <section class="panel">
                            <header class="panel-heading">
                                لیست محصولات
                            </header>
                                </section>
                                    </div>
                                        
                                        </div>
                                        
                                      </section>

                    
                    </div> 
                
                </div>
                <!-- page end-->
            
            </section>
        </section>
        <!--main content end-->
</section>

    <!-- js placed at the end of the document so the pages load faster --> 
<script src="template/js/jquery.js"></script> 
<script src="template/js/bootstrap.min.js"></script> 
<script src="template/js/jquery.scrollTo.min.js"></script> 
<script src="template/js/jquery.nicescroll.js" type="text/javascript"></script> 
<script type="text/javascript" src="template/assets/data-tables/jquery.dataTables.js"></script> 
<script type="text/javascript" src="template/assets/data-tables/DT_bootstrap.js"></script> 

<!--common script for all pages--> 
<script src="template/js/common-scripts.js"></script> 

<!--script for this page only--> 
<script src="template/js/dynamic-table.js"></script>
</body>
</html>

                                              
                                          </option>
                                          
                                        </select>
                                    
                                        selectValue();