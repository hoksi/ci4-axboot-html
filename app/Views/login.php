<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>AXBoot :: Advanced Web Application Development Framework</title>
    <link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="/assets/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/assets/css/axboot.css" />
    <!--[if lt IE 10]>
    <link rel="stylesheet" type="text/css" href="/assets/css/axboot-01.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/axboot-02.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/axboot-03.css"/>
    <![endif]-->
    <script type="text/javascript">
        var CONTEXT_PATH = "";
        //todo: SCRIPT_SESSION 을 받아와야함
        var SCRIPT_SESSION = (function(json) {
            return json;
        })({
            "userCd": null,
            "userNm": null,
            "locale": null,
            "timeZone": null,
            "dateFormat": null,
            "login": false,
            "details": {},
            "dateTimeFormat": "null null",
            "timeFormat": null
        });

    </script>
    <script type="text/javascript" src="/assets/js/plugins.min.js"></script>
    <script type="text/javascript" src="/assets/js/axboot/dist/axboot.js"></script>
    <script type="text/javascript" src="/axboot.config.js"></script>
    <style>
        .ax-body.login {
            background: url(/assets/images/login-bg.jpg) center center;
            background-size: cover;
            color: #ccc;
        }
    </style>
    <script>
        /*
         todo:
         로그인 여부 파악 후 분기
         requireSession 값 확인
         */

        axboot.requireSession('a_x_b_a_a_t_k');
    </script>
    <script type="text/javascript" src="/assets/js/axboot/dist/good-words.js"></script>
</head>

<body class="ax-body login">
<table style="width:100%;height:100%;">
    <tr>
        <td align="center" valign="middle">
            <div>
                <img src="/assets/images/login-logo.png" class="img-logo" />
            </div>
            <div class="panel">
                <div class="panel-heading">Input your ID and Password</div>
                <div class="panel-body">
                    <form name="login-form" class="" method="post" action="/api/login" onsubmit="return fnObj.login();" autocomplete="off">
                        <div class="form-group">
                            <label for="userCd"><i class="cqc-new-message"></i> ID</label>
                            <input type="text" id="userCd" class="form-control ime-false" value="system" />
                        </div>
                        <div class="form-group">
                            <label for="userPs"><i class="cqc-key"></i> Password</label>
                            <input type="password" id="userPs" class="form-control ime-false" value="1234" />
                        </div>
                        <input type="hidden" name="" value="" />
                        <div class="ax-padding-box" style="text-align: right;">
                            <button type="submit" class="btn">&nbsp;&nbsp;Login&nbsp;&nbsp;</button>
                        </div>
                    </form>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="#">Find ID</a> &nbsp; &nbsp;
                        <a href="#">Find Password</a>
                    </li>
                </ul>
            </div>
            <div class="txt-copyrights">
                AXBOOT 2.0.0 - Web Application Framework © 2010-2016
            </div>
            <div class="txt-good-words" id="good_words">
            </div>
        </td>
    </tr>
</table>
<script type="text/javascript">
    var fnObj = {
        pageStart: function() {
            $("#good_words").html(goodWords.get());
        },
        login: function() {
            axboot.ajax({
                method: "POST",
                url: "/api/login",
                data: JSON.stringify({
                    "userCd": $("#userCd").val(),
                    "userPs": $("#userPs").val()
                }),
                callback: function(res) {
                    if (res && res.error) {
                        if (res.error.message == "Unauthorized") {
                            alert("로그인에 실패 하였습니다. 계정정보를 확인하세요");
                        } else {
                            alert(res.error.message);
                        }
                        return;
                    } else {
                        location.reload();
                    }
                },
                options: {
                    nomask: false,
                    apiType: "login"
                }
            });
            return false;
        }
    };
</script>
</body>

</html>
