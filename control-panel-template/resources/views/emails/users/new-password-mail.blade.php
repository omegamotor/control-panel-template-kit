<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company XYZ</title>

    <script src="https://kit.fontawesome.com/5c079223e4.js" crossorigin="anonymous"></script>

    <style>
        .password{
            background-color: #f3f5f8;
            width: 100%;
            margin: 30px 0;
            height: 100px;
            text-align: center;
            font-size: 32px;
            line-height: 100px;
        }

        .password strong{
            line-height: 1.5;
            display: inline-block;
            vertical-align: middle;
        }
        .email{
            font-family: Arial, sans-serif;
            text-align: left;
            font-size: 12px;
            margin: 0 auto;
            width: 100%;
            max-width: 620px;
        }

        header{
            font-family: Arial, sans-serif;
            text-align: center;
            font-size: 9px;
            margin: 10px auto;
            width: 100%
        }

        .main-img{
            display: block;
            margin: 0 auto 34px auto;
            max-width: 100%;
            width: 140px;
            height: auto
        }

        .img2{
            vertical-align: middle;
            margin:9px auto;
            display: inline-block
        }

        .img3, .img4{
            margin-right: 15px;
            vertical-align: middle
        }
        .img3{
            margin-top: -5px;
        }


        .link{
            display: inline-block;
            background: none;
            color: #fff;
            text-decoration: none;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
            width: 36px;
            min-height: 36px;
            line-height: 30px;
            text-align: center;
            vertical-align: middle;
            margin-right: 5px;
            font-size: 14px
        }

        .head{
            font-family: Arial, sans-serif;
            text-align: center;
            font-size: 9px;
            margin: 10px auto;
            width: 100%
        }

        .top{
            padding: 30px 0;
            text-align: center
        }

        p{
            margin: 0 auto;
            font-size: 12px
        }

        h1{
            font-family: 'Jost-Med', 'Jost Medium', Jost, 'Lucida Sans Unicode', Helvetica, Arial, sans-serif;
            font-size: 24px;
            text-transform: uppercase;
            margin: 0 auto 20px auto;
            line-height: 1.1;
        }

        h3{
            color: #4e73df ;
            font-size: 14px;
            font-family: 'Jost-Med', 'Jost Medium', Jost, 'Lucida Sans Unicode', Helvetica, Arial, sans-serif;
            margin: 0;
            text-transform: uppercase;
        }

        table{
            width:100%;
            border: none;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .td-1{
            text-align: right;
            vertical-align: top;
            width:45%
        }
        .td-2{
            text-align: left;
            vertical-align: top;
            width:45%
        }

        ul{
            list-style: disc;
            font-size: 12px;
            padding: 0 0 0 1.5em;
            margin: 0
        }

        h2{
            color: #4e73df;
            text-transform: uppercase;
            font-family: 'Jost-Med', 'Jost Medium', Jost, 'Lucida Sans Unicode', Helvetica, Arial, sans-serif;
            margin: 0;
            font-size: 14px;
            line-height: 1.1;
            margin-bottom: 20px
        }

        .social-media{
            margin-bottom: 20px;
            padding: 20px 30px;
            font-size:14px;
            text-align: center;
        }

        .mid{
            text-align: center;
            width: 100%
        }

        hr{
            border: none;
            height: 1px;
            width: 100%;
            display: block;
            background: #ddd;
            margin: 30px 0;
            clear: both
        }

        .bottom{
            border-top: 2px solid #000;
            padding-top: 20px;
            margin: 0;
            line-height: 16px;
            font-size: 9px;
            text-align: center;
            color: #969696
        }

        footer{
            padding: 45px 0;
            border-top: 2px solid #000;
            margin-top:45px;
        }

        .td-p, .td2-p{
            line-height: 18px;
            margin: 1em 0;
        }

        .td-p{
            font-size: 12px;
        }

        .td2-p{
            font-size: 14px
        }

        .td-link{
            color: #4e73df ;
            display: block;
            margin-top: 30px;
            font-size: 12px;
            text-decoration: none;
        }

        .contact-icon{
            width:12px;
        }
    </style>
</head>
<body>
    <div class="email">
        <div class="top">
            {{-- <img class="main-img" alt="logo" src="#" width="400" height="300" alt=""> --}}
            <h1>Aktualizacja Hasła</h1>
            <p>Z Twojego konta została wsyłana prośba o nowe hasło.</p>
        </div>

        <div class="mid">
            <section style="text-align: left;display: block;width: 100%;padding:0;font-size: 12px;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;margin-bottom: 20px">
                <section>
                    <h2>Twoje hasło zostało zresetowane</h2>
                    <p>Twoje nowe hasło w naszej aplikacji to:</p>

                    <div class="password"><strong>{{$newPassword}}</strong></div>
                </section>
                <hr>
                <h2>Uwaga</h2>
                <p>Ten adres email otrzymaliśmy od jednego z naszych klientów podczas jego rejestracji. Jeżeli to nie ty zakładałaś to konto, wyślij wiadomość na adres <a href="">companyXYZ@gmail.com</a></p>
            </section>
        </div>

        <footer>
            <table cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td class="td-1" valign="top">
                            <h3>Masz pytania?</h3>
                            <p class="td-p">Coś jest niejasne, masz pytania <br>dotyczące naszej aplikacji?</p>
                            <a class="td-link" title="Regulamin" href="#">Regulamin</a>
                        </td>
                        <td style="width:10%;">&nbsp;</td>
                        <td class="td-2" valign="top">
                            [Kontakt]
                            <h3 >Skontaktuj się z nami:</h3>
                            <p class="td2-p">
                                <i class="fa-solid fa-phone"></i>
                                48 000 111 222
                            </p>
                            <p class="td2-p">
                                <img  alt="GSM:"src="#">
                                <i class="fa-solid fa-phone img3 contact-icon"></i>
                                999 888 777
                            </p>
                            <p class="td2-p">
                                <div class="img4 contact-icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                firma@gmail.com
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>


            <section  class="social-media">
                [Social Media]
                <a class="link" title="Znajdź nas na Facebooku" href="#">
                    <i class="fa-brands fa-facebook img2" height="34" alt="Fb"></i>
                </a>
                <a class="link" title="Zobacz nas na YouTube" href="#">
                    <i class="fa-brands fa-youtube img2" height="34" alt="YT"></i>
                </a>
                <a class="link" title="Zobacz nas na Instagramie" href="#">
                    <img class="img2" alt="I" width="34" height="34" src="#">
                    <i class="fa-brands fa-instagram img2" height="34" alt="YT"></i>
                </a>
            </section>
            <p class="bottom">
                [Polityka Prywatności]
            </p>
        </footer>
    </div>


</body>
</html>
