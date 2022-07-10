<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/bootstrap.css">
    <style>
        .text-white{
            color: rgb(107, 107, 107) !important;
            font-family: shabnam;
        }
        .typi{
            border-radius: 8px;
            border: 1px solid #b8adad;
        }
        .padd{
            padding: 10px;
            background-color: #e9e9e9;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container ">
        <div class="row">
            <div class="col-6 col-md-3 text-center">
                <img class="w-25 mt-5" src="shaparak.png" alt="">
            </div>
            <div class="col-6 col-md-3 text-center">
                <img class="w-25 mt-5" src="pay.png" alt="">
            </div>
            <div class="col-6 col-md-3 text-center">
                <img class="w-25 mt-5" src="mellat.png" alt="">
            </div>
            <div class="col-6 col-md-3 text-center">
                <img class="w-25 mt-5" src="zarin.png" alt="">
            </div>
        </div>
</div>
<div class="container padd mt-5">
        <div class="row mt-3 ">
            <div class="col-6 order-last order-md-last col-md-4 text-right">
                <p class="text-white">شماره کارت</p>
            </div>
            <div class="col-3 col-md-2 text-center">
               <input class="typi w-75" type="number" name="" id="">
            </div>
            <div class="col-3 col-md-2 text-center">
               <input class="typi w-75"  type="number" name="" id="">
            </div>
            <div class="col-3 col-md-2 text-center">
               <input class="typi w-75" type="number" name="" id="">
            </div>
            <div class="col-3 col-md-2 text-center">
                <input class="typi w-75" type="number" name="" id="">
            </div>
        </div>

        <div class="row mt-4 ">
            <div class="col-6 order-last order-md-last col-md-4 text-right">
                <p class="text-white">رمز اینترنتی</p>
            </div>
            <div class="col-6 col-md-8 text-center">
               <input class="typi" style="width: 100%;" type="password" name="" id="">
            </div>
            
        </div>

        <div class="row mt-4 ">
            <div class="col-6 order-last order-md-last col-md-4 text-right">
                <p class="text-white">CVV2</p>
            </div>
            <div class="col-6 col-md-8 text-center">
               <input class="typi" style="width: 100%;" type="number" name="" id="">
            </div>
            
        </div>
        <div class="row mt-4 ">
            <div class="col-6 order-last order-md-last col-md-4 text-right">
                <p class="text-white">تاریخ انقضا</p>
            </div>
            <div class="col-6 col-md-8 text-center">
               <input class="typi" style="width: 100%;" type="month" name="" id="">
            </div>
            
        </div>
        <div class="row mt-4 ">
            <div class="col-6 order-last order-md-last col-md-4 text-right">
                <p class="text-white">کد امنیتی</p>
            </div>
            <div class="col-6 col-md-8 text-center">
               <input class="typi" style="width: 100%;" type="password" maxlength="4" name="" id="">
            </div>
            
        </div>
        <div class="row mt-4 ">
            <div class="col-6 order-last order-md-last col-md-4 text-right">
                <p class="text-white">ایمیل اختیاری</p>
            </div>
            <div class="col-6 col-md-8 text-center">
               <input class="typi" style="width: 100%;" type="email" name="" id="">
            </div>
            
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-6  col-md-3 text-center">
                <button name="go-out" onclick="window.history.back();" class="btn btn-danger">انصراف</button>

            </div>
            <div class="col-6 col-md-3 text-center">
                <button class="btn btn-success">پرداخت</button>
            </div>
            
        </div>

    </div>
    
</body>
</html>