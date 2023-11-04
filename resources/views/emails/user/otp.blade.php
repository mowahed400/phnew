<!DOCTYPE html>
<html>

<head>
    <title>Forget Password Code</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 20px 0;
        }

        .header h1 {
            font-size: 28px;
            color: #bd2c3d;
            margin: 0;
        }

        .content {
            padding: 20px 0;
        }

        .content p {
            margin: 0 0 15px;
            line-height: 1.5;
        }

        .content p:first-child {
            margin-top: 0;
        }

        .content p:last-child {
            margin-bottom: 0;
        }

        .footer {
            text-align: center;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Welcome!</h1>
            <img src="https://via.placeholder.com/150" alt="Logo" style="max-width: 100%;">
        </div>

        <div class="content">
            <p>We're excited to inform you that</p>
            <p>Your Forget Password Code is: <strong>{{$otp}}</strong></p>
        </div>

        <div class="footer">
            <p>Thank You, <br>{{\App\Models\Setting::first()->app_name}} Team</p>
        </div>
    </div>
</body>

</html>
