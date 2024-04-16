<?php
require_once('config.php');

$pmenu = $cmenu = null;

if (isset($_GET["pcat"]) && is_numeric($_GET["pcat"])) {
    $pmenu = $_GET["pcat"];
}

//when submit button is pressed then parent category id and sub-category id are displayed to the user
if (isset($_POST['submit'])) {
    if (isset($_POST['ccat'])) {
        $pmenu = $_POST['pcat'];
    }
    if (isset($_POST['ccat']) && is_numeric($_POST['ccat'])) {
        $cmenu = $_POST['ccat'];
    }
    if (isset($_POST['ccat']) && is_numeric($_POST['ccat'])) {
        echo 'Parent Cat Id: ' . $pmenu . ' -> ' . 'Subcategory Id: ' . $cmenu;
    } else if (isset($_POST['ccat'])) {
        echo 'Parent Cat Id: ' . $pmenu;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title>Dependent dropdown in PHP, MySQL</title>
        <script type="text/javascript">
            function autoSubmit() {
                with (window.document.form) {
                    /**
                     * We have if and else block where we check the selected index for parent category(pcat) and * accordingly we change the URL in the browser.
                     */
                    if (pcat.selectedIndex === 0) {
                        window.location.href = 'dependent-dropdown.php';
                    } else {
                        window.location.href = 'dependent-dropdown.php?pcat=' + pcat.options[pcat.selectedIndex].value;
                    }
                }
            }
        </script>
    </head>
    <body>
        <?php
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        ?>
		<div style="width: 500px; margin: auto;">
			<form class="form" id="form" name="form" method="post" action="<?php echo $actual_link; ?>">
				<fieldset>
					<p class="bg">
						<label for="pcat">محصول</label> <!-- PARENT CATEGORY SELECTION -->
						<!--onChange event fired and function autoSubmit() is invoked-->
						<select id="pcat" name="pcat" onchange="autoSubmit();">
							<option value="">-- Select Parent Category --</option>
							<?php
							//select parent categories. parent categories are with parent_id=0
							$sql = "SELECT * FROM `kind`";
							$result = dbQuery($sql);
							while ($row = dbFetchAssoc($result)) {
								echo ("<option value=\"{$row['Id']}\" " . ($pmenu == $row['Id'] ? " selected" : "") . ">{$row['Name']}</option>");
							}
							?>
						</select>
                        
					</p>
					<?php
					//check whether parent category was really selected and parent category id is numeric
					if ($pmenu != '' && is_numeric($pmenu)) {
						////select sub-categories categories for a given parent category id
						$sql = "SELECT * FROM types Where KindId=" . $pmenu;
						$result = dbQuery($sql);
						if (dbNumRows($result) > 0) {
							?>
							<p class="bg">
								<label for="ccat">نوع محصول</label>
								<select id="ccat" name="ccat">
									<option value="">-- Select Sub-Category --</option>
									<?php
									//POPULATE DROP DOWN WITH SUBCATEGORY FROM A GIVEN PARENT CATEGORY
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
		</div>
    </body>
</html>