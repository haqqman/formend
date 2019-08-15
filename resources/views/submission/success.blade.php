<!--
Organization: Haqqman
Author: @sulaimanxyz
Webmaster: https://haqqman.com/webmaster
About Haqqman: https://haqqman.com
-->
<!DOCTYPE html>
<html>
<head>
    <title>Message successfully Sent!</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8c27c5ee44.js"></script>
    <style type="text/css">
        body {
            /*background: linear-gradient(90deg, white, gray);*/
            background-color: #eee;
        }

        body, h1, p {
            font-family: "Helvetica Neue", "Segoe UI", Segoe, Helvetica, Arial, "Lucida Grande", sans-serif;
            font-weight: normal;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            margin-left:  auto;
            margin-right:  auto;
            margin-top: 100px;
            max-width: 1170px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .row:before, .row:after {
            display: table;
            content: " ";
        }

        h1 {
            font-size: 48px;
            font-weight: 300;
            margin: 0 0 20px 0;
        }

        .lead {
            font-size: 21px;
            font-weight: 200;
            margin-bottom: 20px;
        }

        p {
            margin: 0 0 10px;
        }

        a {
            color: #A9CF45;
            text-decoration: none;
        }
    </style>
</head>

<body>
<div class="container text-center" id="error">
    <div class="row">
        <div class="col-md-12">
            <div>
                <img src="{{ asset('img/haqqman-confirmation.svg') }}" width="250px" class="img-responsive" alt="" />
            </div>
            <h1>Hurray!</h1>
            <p class="lead">Your message has been successfully submitted.</p>
            <p class="lead"><a href="{{ $callbackUrl }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go back to website</a></p>
        </div>
    </div>

</div>

</body>
</html>
