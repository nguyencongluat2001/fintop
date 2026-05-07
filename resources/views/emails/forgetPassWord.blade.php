<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet" />
    <style>
        h5 {
            font-size: 20px;
        }

        .row {
            width: 100%;
            display: inline-block;
        }

        .text-center {
            text-align: center;
        }

        .title {
            line-height: 45%;
        }

        .title-left {
            width: 40%;
            float: left;
            text-align: center;
        }

        .title-right {
            width: 60%;
            float: right;
            text-align: center;
        }

        .decoration {
            text-decoration: underline;
        }
    </style>
</head>

<body style="font-family: 'Roboto', sans-serif">
    <div>
        <center><p>Kính thưa: <b>{{ $data['name'] }}</b></p></center>
        <div class="row">
            <div class="info-conter">
                <p>Địa chỉ email: <b>{{ $data['email'] }}</b></p>
                <p>Số điện thoại: <b>{{ $data['phone'] }}</b></p>
                <p>Mã OTP là: <b>2201RG</b></p>
            </div>
        </div>
        <p>Email được gửi tự động bởi phần mềm FinTop - Tài chính và đầu tư. Vui lòng không cung cấp m này cho bất kỳ ai .
        </p>
    </div>

</body>

</html>
