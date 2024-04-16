<!DOCTYPE html>
<html>
<head>
    <title>Searchable Dropdown in PHP</title>
    <!-- استایل‌های CSS -->
    <style>
        .searchable-dropdown {
            position: relative;
            display: inline-block;
        }

        .searchable-dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 150px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            padding: 5px;
        }

        .searchable-dropdown-content a {
            padding: 5px;
            display: block;
            text-decoration: none;
            color: #000;
        }

        .search-box {
            width: 100%;
            box-sizing: border-box;
            padding: 5px;
            margin-bottom: 5px;
        }

    </style>
</head>
<body>

<div class="searchable-dropdown">
    <input type="text" class="search-box" placeholder="Search...">
    <div id="searchableDropdownContent" class="searchable-dropdown-content"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // جستجو در دراپ‌دان با استفاده از jQuery و AJAX
    $(document).ready(function() {
        $('.search-box').keyup(function() {
            var searchText = $(this).val();
            if (searchText != '') {
                $.ajax({
                    url: 'search_data.php',
                    method: 'post',
                    data: {query: searchText},
                    success: function(response) {
                        $('#searchableDropdownContent').html(response);
                        $('.searchable-dropdown-content').show();
                    }
                });
            } else {
                // اگر متن جستجو خالی شد، دراپ‌دان را مخفی کن
                $('.searchable-dropdown-content').hide();
            }
        });
    });
</script>

</body>
</html>
<?php
// این فایل باید در همان دایرکتوری قرار داشته باشد

// اطلاعات مثالی که از آنها می‌خواهید در دراپ‌دان نمایش داده شود
$data = ["Option 1", "Option 2", "Option 3", "Option 4"];

if (isset($_POST['query'])) {
    $searchText = $_POST['query'];
    foreach ($data as $option) {
        // اگر متن جستجو در متن گزینه موجود بود، آن را نمایش بده
        if (stripos($option, $searchText) !== false) {
            echo '<a href="#">' . $option . '</a>';
        }
    }
}
?>