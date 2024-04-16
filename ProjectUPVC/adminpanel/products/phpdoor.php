<?php
include( "../../functions/function.php" );
include( "../../functions/connect.php" );
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
<title>Dynamic Table</title>

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
</head>

<body>
<section id="container" class="">
<?php
//header start
@includepage( "../inc_template/header" );
//header end

//sidbar start
@includepage( "../inc_template/menu_comp" );
//sidbar end

?>
<?php

    $sql = "SELECT * FROM `types` WHERE KindId = 1";
	$all_categories = mysqli_query($conn,$sql);
if(isset($_POST['submit']))
{   
     $KindId = 1;
     $TypeId = mysqli_real_escape_string($conn,$_POST['Type']);
     $Discription = $_POST['Discription'];
     $PictureName = $_FILES["Picture"]["name"];
     $PictureType = $_FILES["Picture"]["type"];
     $Picturetmp = $_FILES["Picture"]["tmp_name"];
     $PictureSize = $_FILES["Picture"]["size"];
     $PictureError = $_FILES["Picture"]["error"];
    
     $allowtype = array("gif","png","jpg","jpeg");
     $explode = explode(".",$PictureName);
     $trueformat = end($explode);
     if($PictureType=="image/gif" || $PictureType="image/png" || "image/jpg" || "image/jpeg")
         {
            $filname = md5($PictureName.microtime().substr($PictureName,-5,5));
            $fileurl= "../../images/productimages/".$filname;
         }
        else
        {
            $_SESSION["novalidformat"]="پسوند فایل مجاز به آپلود نمی باشد";
             header("location:door.php"); 
             exit();
        }
     $sql = "INSERT INTO product (Id,KindId,TypId,Picture,Discription) VALUES ('','$KindId','$TypeId','$PictureName','$Discription')";

     if (mysqli_query($conn, $sql)) {
        $MessageTrue = "";
     } else {
        $MessageFalse = "";
     }
    
}

?>
<!--main content start-->
<section id="main-content">
<section class="wrapper">
<!-- page start-->
<div class="row">
<div class="col-lg-12">
<section class="panel" width=100%>
<aside class="profile-info col-lg-9">
  <section class="panel">
  <div class="bio-graph-heading"> اطلاعات درب </div>
  <div class="panel-body bio-graph-info">
  <?php
if(isset($MessageTrue)){?>
  <div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button"> <i class="icon-remove"></i> </button>
    <strong>عملیات با موفقیت انجام شد!</strong>
    <?=$MessageTrue;?>
  </div>
  <?php
}
?>
  <?php
if(isset($MessageFalse)){?>
  <div class="alert alert-block alert-danger fade in">
    <button data-dismiss="alert" class="close close-sm" type="button"> <i class="icon-remove"></i> </button>
    <strong>با موفقیت ثبت نشد</strong>
    <?=$MessageFalse;?>
  </div>
  <?php	
}
?>
  <h1>درب‌ها</h1>
  <html>
  <body>
  <form class="form-horizontal" role="form" method="post" action="phpdoor.php" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-lg-2" for="inputSuccess"> نوع درب</label>
      <div class="col-lg-10">
        <select class="form-control m-bot15" name="Type">
          <?php

          while ( $category = mysqli_fetch_array(
              $all_categories, MYSQLI_ASSOC ) ): ;
          ?>
          <option 
                  value="<?php echo $category["Id"];?>"> 
                         <?php echo $category["Title"];?> 
          </option>
          <?php
          endwhile;
          ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">تصاویر</label>
      <div class="col-lg-6">
        <input type="file" class="file-pos" id="Picture" name="Picture">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">توضیحات</label>
      <div class="col-lg-10">
        <textarea type="text" name="Discription" id="Discription" class="form-control" cols="30" rows="10"></textarea>
      </div>
      <div class="form-group"></div>
      <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-primary" name="submit" value="Submit">ثبت</button>
        <button type="button" class="btn btn-default">بازگشت</button>
      </div>
      <table class="table table-striped border-top" id="sample_1">
        <thead>
          <tr>
            <th style="width: 8px;"> <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
            <th>ردیف</th>
            <th class="hidden-phone">نوع</th>
            <th class="hidden-phone">توضیحات</th>
            <th class="hidden-phone">تصویر</th>
            <th class="hidden-phone">عملیات</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT types.Title as Type,product.Discription as Discription, product.Picture FROM product 
                JOIN types ON types.Id = product.TypId
                WHERE product.KindId =1";
          $result = mysqli_query( $conn, $sql );
          $i = 0;
          while ( $rows = $result->fetch_assoc() ) {

          ?>
          <tr class="odd gradeX">
            <td><input type="checkbox" class="checkboxes" value="1" /></td>
            <td><?=$i;?></td>
            <td class="hidden-phone"><?=$rows['Type'];?></td>
            <td class="hidden-phone"><?=$rows['Discription'];?></td>
            <td class="center hidden-phone">02.03.2013</td>
            <td class="hidden-phone"><span class="label label-success">Approved</span></td>
          </tr>
        </tbody>
        <?php
               ++$i;}
             mysqli_close($conn);
        ?>
      </table>
      </section>
    </div>
    </div>
    <!-- page end-->
  </form>
  </div>
  </section>
</aside>
</section>
</section>
<!--main content end-->
</section>

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
