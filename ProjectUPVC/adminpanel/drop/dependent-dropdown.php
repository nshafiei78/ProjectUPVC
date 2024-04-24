<?php
require_once('config.php');

$pmenu = $cmenu = null;

if (isset($_GET["ProductsId"]) && is_numeric($_GET["ProductsId"])) {
    $pmenu = $_GET["ProductsId"];
}

// when submit button is pressed then parent category id and sub-category id are displayed to the user
if (isset($_POST['submit'])) {
    if (isset($_POST['TypeProductsId'])) {
        $pmenu = $_POST['ProductsId'];
    }
    if (isset($_POST['TypeProductsId']) && is_numeric($_POST['TypeProductsId'])) {
        $cmenu = $_POST['TypeProductsId'];
    }
    if (isset($_POST['TypeProductsId']) && is_numeric($_POST['TypeProductsId'])) {
        echo 'Parent Cat Id: ' . $pmenu . ' -> ' . 'Subcategory Id: ' . $cmenu;
    } else if (isset($_POST['TypeProductsId'])) {
        echo 'Parent Cat Id: ' . $pmenu;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Dependent dropdown in PHP, MySQL</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mosaddek">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<link rel="shortcut icon" href="../template/img/favicon.html">
<title>سفارشات</title>

<!-- Bootstrap core CSS -->
<link href="../template/css/bootstrap.min.css" rel="stylesheet">
<link href="../template/css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="../template/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="../template/css/style.css" rel="stylesheet">
<link href="../template/css/style-responsive.css" rel="stylesheet" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries --> 
<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<script type="text/javascript">
    function autoSubmit() {
        with (window.document.form) {
            /**
                 * We have if and else block where we check the selected index for parent category(ProductsId) and
                 * accordingly we change the URL in the browser.
             */
            if (ProductsId.selectedIndex === 0) {
                window.location.href = 'orders.php';
            } else {
                window.location.href = 'orders.php?ProductsId=' + ProductsId.options[ProductsId.selectedIndex].value;
            }
        }
    }
</script>
</head>

<body>

<div style="width: 500px; margin: auto;">
<form class="form" id="form" name="form" method="post" >
  <fieldset>
          <p class="bg">
                <label for="ProductsId">محصول</label> <!-- PARENT CATEGORY SELECTION -->
                <!--onChange event fired and function autoSubmit() is invoked-->
                <select id="ProductsId" name="ProductsId" onchange="autoSubmit();">
          <option value="">بدون انتخاب</option>
          <?php
          // Select parent categories. Parent categories are with parent_id=0
          $sql = "SELECT * FROM `kind`";
          $result = dbQuery($sql);
          while ($row = dbFetchAssoc($result)) {
              echo ("<option value=\"{$row['Id']}\" " . ($pmenu == $row['Id'] ? " selected" : "") . ">{$row['Name']}</option>");
          }
          ?>
       </select>
            </p>
            <?php
      // Check whether parent category was really selected and parent category id is numeric
     if ($pmenu != '' && is_numeric($pmenu)) {
                //// select sub-categories categories for a given parent category id
          $sql = "SELECT * FROM types Where KindId=" . $pmenu;
             $result = dbQuery($sql);
                
                if (dbNumRows($result) > 0) {
                    ?>
                    <p class="bg">
                        <label for="TypeProductsId">نوع محصول</label>
                        <select id="TypeProductsId" name="TypeProductsId">
                            <option value="">بدوون انتخاب</option>
                            <?php
                            // POPULATE DROP DOWN WITH SUBCATEGORY FROM A GIVEN PARENT CATEGORY
                            while ($row = dbFetchAssoc($result)) {
                                echo ("<option value=\"{$row['Id']}\" " . ($cmenu == $row['Id'] ? " selected" : "") . ">{$row['Title']}</option>");
                            }
                            ?>
                        </select>
                    </p>
                    <?php
                }
            }
            ?>
            <p><input name="submit" value="Submit" type="submit" /></p>
        </fieldset>
</form>

<!--main content end-->



<!-- js placed at the end of the document so the pages load faster --> 
<script src="../template/js/jquery.js"></script> 
<script src="../template/js/bootstrap.min.js"></script> 
<script src="../template/js/jquery.scrollTo.min.js"></script> 
<script src="../template/js/jquery.nicescroll.js" type="text/javascript"></script> 
<script type="text/javascript" src="../template/assets/data-tables/jquery.dataTables.js"></script> 
<script type="text/javascript" src="../template/assets/data-tables/DT_bootstrap.js"></script> 

<!--common script for all pages--> 
<script src="../template/js/common-scripts.js"></script> 

<!--script for this page only--> 
<script src="../template/js/dynamic-table.js"></script>
</body>
</html>
