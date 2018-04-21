<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <style type="text/css">
    .align-center{
        margin:0 auto; /* 居中 这个是必须的，，其它的属性非必须 */
        width:500px; /* 给个宽度 顶到浏览器的两边就看不出居中效果了 */
        background:white; /* 背景色 */
        text-align:center; /* 文字等内容居中 */
    }
    h3 {
        font-size: 18px;
        margin: 3px 5px;
        color: #333;
    }
    #container {
        width: 100%;
        margin: auto;
    }
    #container > div {
        -webkit-box-shadow: 0 4px 15px -5px #555;
        box-shadow: 0 4px 15px -5px #555;
        background-color: #fff;
        width:220px;
        padding:2px;
        margin:5px;
    }
    #container > div img {
        padding: 0px;
        display: block;
        width: 100%;
    }
    </style>
    <head>
        <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <title>锦城官网图片分析系统</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    </head>
    <body>
        <br><br>
        <div class="align-center">
            <div class="align-center">
                <form class="form-horizontal" role="form" method="get" action="{{ url('/search') }}">
                    {{ csrf_field() }}
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="图片关键字" name="keywords">
                      <span class="input-group-btn">
                         <button class="btn btn-default" type="submit">搜索</button>
                      </span>
                    </div><!-- /input-group -->
                </form>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div id="container">
            @foreach ($pictures as $picture)
                <div><img src="{{ $picture->url }}" width="220"><h4>{{ $picture->title }}</h4></div>
            @endforeach
            <!-- These are our grid blocks -->
        </div>

        <div class="paginate">
            {{ $pictures->appends(['keywords' => $keywords ])->links() }}
        </div>
    </body>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="http://cdn.bootcss.com/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
    <script src="js/pinto.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function(){
            $('#container').pinto();
        });
    </script>
    <script type="text/javascript">
        $(function(){
            alert(getCookie("keywords"));
            if(getCookie("keywords") != ""){
                setTimeout(function(){
                    window.location.reload();
                    clearAllCookie();
                },3000);
            }
        });
    </script>
</html>
