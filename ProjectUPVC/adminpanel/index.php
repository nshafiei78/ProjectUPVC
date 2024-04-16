<?php
include( "../functions/function.php" );
include( "../functions/connect.php" );
/*session_start();
if (!isset($_SESSION['userlogin']) || $_SESSION['userlogin'] !== true) {
    header("Location: login.php");
    exit;
}*/
session_start();
if ( isset( $_SESSION[ 'userlogin' ] ) ) {
  if ( !$_SESSION[ 'userlogin' ] == true ) {

    header( "location:login.php" );
    exit();
  }
} else {

  header( "location:login.php" );
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
<link rel="shortcut icon" href="template/img/favicon.html">
<title>داشبرد</title>

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
      <section class="panel" style="padding-bottom: 30px" >
        <header class="panel-heading"> داشبرد  ادمین </header>
        <form class="form-horizontal" role="form" method="post" action="index.php" enctype="multipart/form-data">
          <table class="table sliders">
            <tbody style="display: flex; flex-direction: row;">
              <tr>
                <td><div style="margin-right: 50px;">وضعیت</div></td>
                <td><select name="Condition" id="ConditionId" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;">
                    <?php
                    $sql = "SELECT * FROM `condition` ";
                    $all_Item = mysqli_query( $conn, $sql );
                    while ( $orders = mysqli_fetch_array( $all_Item, MYSQLI_ASSOC ) ):
                      ?>
                    <option value="<?php echo $orders["Id"]; ?>"><?php echo $orders["Condition"]; ?></option>
                    <?php endwhile; ?>
                  </select></td>
              </tr>
            </tbody>
          </table>
          <div class="form-group">
            <div style="margin-top: -100px; margin-right:85%;display: flex;">
              <button type="submit" name="search_btn" class="btn btn-success" style="margin-left: 10px;">جست‌وجو</button>
              <button type="submit" name="clear_btn" class="btn btn-success" style="margin-left: 600px;">حذف فیلتر</button>
            </div>
          </div>
        </form>
      <?php
// تعداد رکوردها که باید از دیتابیس دریافت شود
$query = "SELECT COUNT(*) as total_rows FROM orders";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$totalRecords = $row['total_rows'];

// تعداد رکوردهای نمایش داده شده در هر صفحه
$recordsPerPage = isset($_GET['per_page']) ? $_GET['per_page'] : 5;

// تعداد صفحات مورد نیاز برای نمایش تمام رکوردها
$totalPages = ceil($totalRecords / $recordsPerPage);

// صفحه فعلی
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($currentPage - 1) * $recordsPerPage;

// شماره ردیف ابتدایی برای هر صفحه
$startRow = ($currentPage - 1) * $recordsPerPage + 1;

if (isset($_POST['search_btn'])) {
    $Condition = $_POST['Condition'];
} elseif (isset($_POST['clear_btn'])) {
    $Condition = null;
} else {
    $Condition = null;
}

if ($Condition != null) {
    $sql = "
        SELECT orders.Id as Id, CONCAT(users.FirstName,' ',users.LastName) as FullName, kind.Name AS Name, types.Title AS Title,
        orders.Dimensions as Dimensions, orders.Discription as Discription, orders.`Date` as Date, cond.`Condition` as cond, orders.UserId as UserId
        FROM `orders` 
        JOIN `users` ON orders.UserId = users.Id
        JOIN `kind` ON orders.KindId = kind.Id
        JOIN `types` ON orders.TypeId = types.Id
        JOIN `condition` cond ON orders.ConditionId = cond.Id 
        WHERE orders.ConditionId = '$Condition'
        LIMIT $start, $recordsPerPage";
} else {
    $sql = "
        SELECT orders.Id as Id, CONCAT(users.FirstName,' ',users.LastName) as FullName, kind.Name AS Name, types.Title AS Title,
        orders.Dimensions as Dimensions, orders.Discription as Discription, orders.`Date` as Date, cond.`Condition` as cond, orders.UserId as UserId
        FROM `orders` 
        JOIN `users` ON orders.UserId = users.Id
        JOIN `kind` ON orders.KindId = kind.Id
        JOIN `types` ON orders.TypeId = types.Id
        JOIN `condition` cond ON orders.ConditionId = cond.Id 
        WHERE orders.ConditionId = 1
        LIMIT $start, $recordsPerPage";
}

$result = mysqli_query($conn, $sql);
?>
<table class="table table-striped border-top" id="sample_1" style="margin-top: 30px;">
    <tr>
        <th style="width: 8px;"></th>
        <th style="text-align: center;">ردیف</th>
        <th class="hidden-phone" style="text-align: center;">نام کاربر</th>
        <th class="hidden-phone" style="text-align: center;">محصول</th>
        <th class="hidden-phone" style="text-align: center;">نوع محصول</th>
        <th class="hidden-phone" style="text-align: center;">ابعاد</th>
        <th class="hidden-phone" style="text-align: center;">تاریخ</th>
        <th class="hidden-phone" style="text-align: center;">توضیحات</th>
        <th class="hidden-phone" style="text-align: center;">وضعیت</th>
    </tr>
    <tbody>
        <?php
        $i = $startRow; // تنظیم مقدار اولیه برای $i بر اساس شماره ردیف ابتدایی
        while ($rows = $result->fetch_assoc()) {
            ?>
            <tr class="odd gradeX">
                <td></td>
                <td><?= $i; ?></td>
                <td class="hidden-phone"><?= $rows['FullName']; ?></td>
                <td class="hidden-phone"><?= $rows['Name']; ?></td>
                <td class="hidden-phone"><?= $rows['Title']; ?></td>
                <td class="hidden-phone"><?= $rows['Dimensions']; ?></td>
                <td class="hidden-phone"><?= $rows['Date']; ?></td>
                <td class="hidden-phone"><?= $rows['Discription']; ?></td>
                <td><span class="label label-info label-mini"> <a href='requestorders/requestorders.php?id=<?= md5($rows['Id']); ?>&userid=<?= $rows['UserId']; ?>' style="color:#FFFFFF;">
                 <?= $rows['cond']; ?>
                        </a> </span></td>
            </tr>
            <?php
            ++$i; // افزایش مقدار $i برای ردیف بعدی
        }
        mysqli_close($conn);
        ?>
    </tbody>
</table>


<!-- انتخاب‌گر تعداد رکوردهای نمایش داده شده در هر صفحه -->

<form action="" method="get" style="margin-top: 20px;">
    <label for="per_page">تعداد رکوردها در هر صفحه:</label>
    <select name="per_page" id="per_page" onchange="this.form.submit()">
        <option value="5" <?php if ($recordsPerPage == 5) echo 'selected'; ?>>5</option>
        <option value="10" <?php if ($recordsPerPage == 10) echo 'selected'; ?>>10</option>
        <option value="15" <?php if ($recordsPerPage == 15) echo 'selected'; ?>>15</option>
    </select>
</form>




<!-- نمایش لینک‌های صفحه‌بندی -->
<div class="pagination">
    <?php
    if ($currentPage > 1) {
        $prevPage = $currentPage - 1;
        echo "<a href='?page=$prevPage&per_page=$recordsPerPage' class='prev-page'>صفحه قبلی</a>";
    } else {
        echo "<span class='prev-page-disabled'>صفحه قبلی</span>";
    }

    for ($page = 1; $page <= $totalPages; $page++) {
        echo "<a href='?page=$page&per_page=$recordsPerPage' class='page-number'>$page</a>";
    }

    if ($currentPage < $totalPages) {
        $nextPage = $currentPage + 1;
        echo "<a href='?page=$nextPage&per_page=$recordsPerPage' class='next-page'>صفحه بعدی</a>";
    } else {
        echo "<span class='next-page-disabled'>صفحه بعدی</span>";
    }
    ?>
</div>

      </section>
      </div>
      </div>
      <!-- page end--> 
      
    </section>
  </section>
  <!--main content end-->
  
  <div class="panel-body"> </div>
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
