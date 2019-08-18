<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,700|Lato:400,700&display=swap" rel="stylesheet">
    <!-- For development, pass document through inliner -->
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            font-size: 100%;
            line-height: 1.65;
        }

        img { max-width: 100%; margin: 0 auto; display: block; }

        body, .body-wrap { width: 100% !important; height: 100%; background: #f8f8f8; color: #34495e; font-family: "Lato", "Helvetica Neue", "Segoe UI", Segoe, Helvetica, Arial, "Lucida Grande", sans-serif }

        a { color: #005fe6; text-decoration: none; }

        a:hover { text-decoration: underline; }

        .text-center { text-align: center; }

        .text-right { text-align: right; }

        .text-left { text-align: left; }

        .button {
            display: inline-block;
            color: white;
            background: #3fb660;
            border: solid #3fb660;
            border-width: 10px 20px 8px;
            font-weight: bold;
            border-radius: 20px;
        }
        .font-secondary {
            font-family: 'Cormorant Garamond', serif !important;
        }
        .main-content {
            border-collapse: collapse;
            border-radius: 7px;
            border: 1px solid #ecf0f1;
        }
        .border-top {
            padding-top: 15px;
            border-top: 1px solid #ecf0f1;
        }
        .border-bottom {
            padding-bottom: 15px;
            border-bottom: 1px solid #ecf0f1;
        }
        .button:hover { text-decoration: none; }

        h1, h2, h3, h4, h5, h6 { margin-bottom: 20px; line-height: 1.25; }

        h1 { font-size: 32px; }

        h2 { font-size: 28px; }

        h3 { font-size: 24px; }

        h4 { font-size: 20px; }

        h5 { font-size: 16px; }

        p, ul, ol { font-size: 16px; font-weight: normal; margin-bottom: 20px; }

        .container { display: block !important; clear: both !important; margin: 0 auto !important; max-width: 580px !important; }

        .container table { width: 100% !important; border-collapse: collapse; }

        .container .masthead { padding: 40px 0; background: #3fb660; color: white; }

        .container .masthead h4 { margin: 0 auto !important; max-width: 90%; text-transform: uppercase; }

        .container .content { background: white; padding: 30px 35px; }

        .container .content.footer { background: none; }

        .container .content.footer p { margin-bottom: 0; color: #888; text-align: center; font-size: 14px; }

        .container .content.footer a { color: #888; text-decoration: none; font-weight: bold; }

        .container .content.footer a:hover { text-decoration: underline; }
    </style>
    @yield('after_style')
</head>
<body>
<table class="body-wrap">
    <tr>
        <td class="container">

            <!-- Message start -->
            <table class="main-content">
                <tr>
                    <td class="content">
                        @yield('content')
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td class="container">
            <!-- Message start -->
            <table>
                <tr>
                    <td class="content footer" align="center">
                        &copy; Formend by Haqqman
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
