<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Footer</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .heder-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }
        .heder-icon ul li {
            list-style: none;
            display: inline;
            cursor: pointer;
            font-size: 22px;    
            color: #E6E6FA;
        }
        .heder-icon ul li i {
            margin: 20px;
        }
        ul li i {
            transition: transform 0.5s ease;
        }
        i:hover {
            transform: translateY(-5px);
        }
        .heder-content {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .heder-content ul li {
            list-style: none;
            display: inline;
            padding: 10px;
        }
        .heder-content ul li a {
            color: #E6E6FA;
            display: inline-block; /* Menggunakan inline-block agar transformasi bekerja */
            margin: 15px;
            text-decoration: none;
            font-size: 13px;
            transition: transform 0.5s ease; /* Transisi untuk transformasi dan background-color */
        }
        .heder-content ul li a:hover {
            transform: translateY(-5px); /* Mengubah transformasi untuk efek hover */
        }
        .copyright{
            text-align: center;
            color: #E6E6FA;
            opacity: 0.6; /* Opacity default */
        }
        .header-logo{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .header-logo ul li{
            list-style: none;
            display: inline;
            padding: 10px;
        }
        .header-logo ul li i{
            margin: 20px;
            font-size: 20px;
            color: white;
        }
        .fa-html5:hover{
            color: #FFD700;
        }
        .fa-css3-alt:hover{
            color: #3498db;
        }
        .fa-js:hover{
            color:yellow;
        }
        .fa-php:hover{
            color: #00A9E0;
        }
    </style>
</head>

<body>
    <div class="footer">
        <div class="header-footer">
            <div class="heder-icon">
                <ul>
                    <li><i class="fab fa-telegram-plane"></i></li>
                    <li><i class="fa-brands fa-youtube"></i></li>
                    <li><i class="fa-brands fa-instagram"></i></li>
                </ul>
            </div>
            <div class="main-header">
                <div class="heder-content">
                    <ul>
                        <li><a href="#">ABOUT US</a></li>
                        <li><a href="#">FAQS</a></li>
                        <li><a href="#">CONTACT</a></li>
                        <li><a href="#">PRIVACY POLICY</a></li>
                        <li><a href="#">RSS</a></li>
                    </ul>
                </div>
                <div class="copyright"> Copyright © nexXx. </div>
                <div class="header-logo">
                    <ul>
                        <li><i class="fa-brands fa-html5"></i></li>
                        <li><i class="fa-brands fa-css3-alt"></i></li>
                        <li><i class="fa-brands fa-js"></i></li>
                        <li><i class="fa-brands fa-php"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
