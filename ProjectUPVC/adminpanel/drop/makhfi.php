<!DOCTYPE html>
<html>
<head>
    <title>Show/Hide Controls</title>

    <style>
        #myControls {
            display: none;
        }
    </style>
</head>
<body>
    <button onclick="toggleControls()">نمایش کنترل‌ها</button>
    <div id="myControls">
        <!-- اینجا محتوای مورد نظر خود را قرار دهید -->
        <input type="text" placeholder="نام">
        <input type="email" placeholder="ایمیل">
        <!-- و غیره -->
    </div>

‌
    <script>
        function toggleControls() {
            var controls = document.getElementById("myControls");
            if (controls.style.display === "none") {
                controls.style.display = "block";
            } else {
                controls.style.display = "none";
            }
        }
    </script>
</body>
</html>
