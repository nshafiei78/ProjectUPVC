<?php
include( "../../../functions/function.php" );
include( "../../../functions/connect.php" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mosaddek">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<link rel="shortcut icon" href="../../template/img/favicon.html">
<title>انواع ویژگی‌ها</title>

<!-- Bootstrap core CSS -->
<link href="../../template/css/bootstrap.min.css" rel="stylesheet">
<link href="../../template/css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="../../template/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="../../template/css/style.css" rel="stylesheet">
<link href="../../template/css/style-responsive.css" rel="stylesheet" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries --> 
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php
@includepage( "../../inc_template/header" );
@includepage( "../../inc_template/menutypedetails" );
?>
<section id="main-content">
  <section class="wrapper"> 
    <!-- page start-->
    <div class="row">
    <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading"> انواع ویژگی‌ها </header>
      <div class="panel-body">
      <form class="form-horizontal" role="form" method = "post" action="insert.php?page=TypeOfDetails.php"  enctype="multipart/form-data">
        <div class="form-group" style="margin-top:50px;">
          <label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -50px;"><span style=" color: red; font-size: 15px;">*</span>عنوان</label>
          <div class="col-lg-10">
            <div class="row">
              <div class="col-lg-2">
                <input type="text" name="Title" id="Title" class="form-control" required title="پر کردن این فیلد الزامی است. ">
                  
              </div>
              <label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -18px;"><span style=" color: red; font-size: 15px;">*</span>دسته</label>
               <select name="GruopId" id="GruopId_Search" class="form-control bound-s" style="margin-right: 30px; width: 15%; height: 35px;" required title="انتخاب مقداری از این فیلد الزامی است.">
                <option value="">بدون انتخاب</option>
                <?php
                $sql = "SELECT * FROM `details`";
                $all_Item = mysqli_query( $conn, $sql );
                while ( $Gruop = mysqli_fetch_array(
                    $all_Item, MYSQLI_ASSOC ) ): ;
                ?>
                <option 
                      value="<?php echo $Gruop["Id"];?>"> <?php echo $Gruop["Title"];?> </option>
                <?php
                endwhile;

                ?>
              </select>
            </div>
              
          </div>
        </div>
        
        <div class="panel-body">
          <div class="form-group" style="text-align: left; padding-left: 60px;">
            <button name = "submit" type="submit" class="btn btn-success">ثبت</button>
          </div>
        </div>
        </div>
        </div>
      </form>
      </div>
    </section>
    <section class="panel"style="padding-bottom: 30px">
      <header class="panel-heading"> لیست انواع ویژگی‌ها </header>
      <form class="form-horizontal" role="form" method="post" action="TypeOfDetails.php" enctype="multipart/form-data">
        <div class="form-group" style="margin-top:50px;">
          <label class="col-lg-2 control-label" style="width: 8%; margin-right: 84px; margin-top: -5px; margin-left: -49px;">عنوان</label>
          <div class="col-lg-2">
            <input type="text" name="Title_Search" id="Title_Search" class="form-control">
          </div>
          <label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -18px;">دسته</label>
          <select name="GruopId_Search" id="GruopId_Search" class="form-control bound-s" style="margin-right: 30px; width: 15%; height: 35px;">
              <option value="">بدون انتخاب</option>
            <?php
            $sql = "SELECT * FROM `details`";
            $all_Item = mysqli_query( $conn, $sql );
            while ( $Gruop = mysqli_fetch_array(
                $all_Item, MYSQLI_ASSOC ) ): ;
            ?>
            <option 
                value="<?php echo $Gruop["Id"];?>"> <?php echo $Gruop["Title"];?> </option>
            <?php
            endwhile;

            ?>
          </select>
            
           <div class="form-group">
              <div style="margin-top: -55px; margin-right:80%;display: flex;">
                <button type="submit" name="search_btn" class="btn btn-success" style="margin-left: 10px;">جست‌وجو</button>
                <button type="submit" name="clear_btn" class="btn btn-success" style="margin-left: -40px;">حذف فیلتر</button>
              </div>
            </div>
        </div>
      </form>
      <table class="table table-striped border-top" id="sample_1 " style="text-align: center; margin-top: 10px;">
        <thead>
          <tr style="text-align: center;">
            <th style="width: 8px;"> </th>
            <th style="text-align: center;">ردیف</th>
            <th class="hidden-phone" style="text-align: center;">عنوان</th>
            <th class="hidden-phone" style="text-align: center;">دسته</th>
            <th class="hidden-phone" style="text-align: center;">عملیات</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ( isset( $_POST[ 'search_btn' ] ) ) {
            $Title_Search = $_POST[ 'Title_Search' ];
            $GruopId_Search = $_POST[ 'GruopId_Search' ];
          } elseif ( isset( $_POST[ 'clear_btn' ] ) ) {
            $Title_Search = null;
            $GruopId_Search = null;
          }
          else {
            $Title_Search = null;
            $GruopId_Search = null;
          }

          if ( $Title_Search != null ) {
            $sql = "SELECT typedetails.Id as Id, typedetails.Title as Title, details.Title as TitleGruop FROM typedetails 
										    JOIN details ON details.Id = typedetails.IdDetails
											WHERE typedetails.Title LIKE '%$Title_Search%'";

          } elseif ( $GruopId_Search != null ) {
            $sql = "SELECT typedetails.Id as Id, typedetails.Title as Title, details.Title as TitleGruop FROM typedetails 
										    JOIN details ON details.Id = typedetails.IdDetails
											WHERE typedetails.IdDetails = $GruopId_Search";

          }
          elseif ( $Title_Search != null && $GruopId_Search != null ) {
            $sql = "SELECT typedetails.Id as Id, typedetails.Title as Title, details.Title as TitleGruop FROM typedetails 
										    JOIN details ON details.Id = typedetails.IdDetails
											WHERE typedetails.Title LIKE '%$Title_Search%' 
											and typedetails.IdDetails = $GruopId_Search";

          }
          else {
            $sql = "SELECT typedetails.Id as Id, typedetails.Title as Title, details.Title as TitleGruop FROM typedetails 
											JOIN details ON details.Id = typedetails.IdDetails";
          }
          $result = mysqli_query( $conn, $sql );
          $i = 1;
          while ( $rows = $result->fetch_assoc() ) {
            ?>
          <tr class="odd gradeX">
            <td></td>
            <td><?=$i;?></td>
            <td class="hidden-phone"><?=$rows['Title'];?></td>
            <td class="hidden-phone"><?=$rows['TitleGruop'];?></td>
            <td ><a href='edit.php?id=<?= $rows['Id'];?>&page=TypeOfDetails.php'>
              <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
              </a> <a href='delete.php?id=<?= $rows['Id'];?>&page=TypeOfDetails.php'>
              <button class="btn btn-danger btn-xs"><i class="icon-trash"></i></button>
              </a></td>
          </tr>
        </tbody>
        <?php
        ++$i;
        }
        mysqli_close( $conn );
        ?>
      </table>
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
<script src="../../template/js/jquery.js"></script> 
<script src="../../template/js/bootstrap.min.js"></script> 
<script src="../../template/js/jquery.scrollTo.min.js"></script> 
<script src="../../template/js/jquery.nicescroll.js" type="text/javascript"></script> 
<script type="text/javascript" src="../../template/assets/data-tables/jquery.dataTables.js"></script> 
<script type="text/javascript" src="../../template/assets/data-tables/DT_bootstrap.js"></script> 

<!--common script for all pages--> 
<script src="../../template/js/common-scripts.js"></script> 

<!--script for this page only--> 
<script src="../../template/js/dynamic-table.js"></script>
</body>
</html>
