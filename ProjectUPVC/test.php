<!doctype html>
<html>
<head>
<style>
#more{display:none;}
<meta charset="utf-8">
<title>Untitled Document</title>
</style>
</head>
<body>
    <h2>upvc</h2>
    <p>
        پنجره دوجداره از شیشه های دو جداره با فریم UPVC تولید می شود. یو پی وی سی نوعی جایگزین برای آلیاژهای فلزی و غیر فلزی در ساخت درب و پنجره می باشد.

از ویژگی های بارز این پنجره ها می توان به وزن سبک، مقاومت بسیار بالا در برابر تغییرات جوی و عدم اشتعال پذیری اشاره نمود. اساس پنجره دو جداره بر پایه شیشه دو جداره است.
        <span id="dots">...</span>
        <span id ="more">
        
        در این نوع پنجره دو یا چند لایه شیشه به کمک نوار اسپیسر که دور تا دور آن ها قرارگرفته از همدیگر جدا شدند و فضای بین شیشه ها با هوا یا گاز آرگون و یا SF6 پر می شود.

اسپیسرها اصولا از جنس آلومینیوم هستند که درون آن ها با ماده سیلیکا ژل که نوعی رطوبت گیر است و رطوبت هوای بین دو شیشه را جذب می کند پرشده است.
        
        </span>
    </p>
    <a onclick="showmore()" id="mybtn">ادامه مطالب ...</a>
   
    <script>
    function showmore(){
        var dottext=document.getElementById("dots");
        var bnttext=document.getElementById("mybtn");
        var mortext=document.getElementById("more");
        if(dottext.style.display==="none")
        {   
            dottext.style.display="inline";
            mortext.style.display="none";
            bnttext.innerHTML="ادامه  ...";
            
        }
        else
            {
            dottext.style.display="none";
            mortext.style.display="inline";
            bnttext.style.display="none";
            }
    }
    
    </script>
</body>
</html>