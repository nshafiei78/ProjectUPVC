<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Grid با Paging - زیبا و راست به چپ</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        body {
            direction: rtl;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>نام</th>
                    <th>سن</th>
                    <th>نام کاربری</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= 100; $i++) {
                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td>کاربر $i</td>";
                    echo "<td>کاربر $i</td>";
                    echo "<td>" . rand(20, 60) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
