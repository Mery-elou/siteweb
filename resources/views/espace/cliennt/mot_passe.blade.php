<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('Bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/bars/navebar.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/modifier_mot_passe.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/bars/2eme_bar.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/email.css')}}">

    <title>Mot de passe</title>



    <style>
        /*style pour la structure du care dans le quelle en vas poster les info*/
        .info{
            padding-left: 130px;
            padding-right: 50px;
            padding-top: 20px;
            padding-bottom: 20px;
            border: 2px solid rgb(35, 87, 35);
            display: inline-block;
            font-size: medium;
            margin-top: 15px;
            width: 70%;
        }
        .info_ecriture{
                font-family:'Times New Roman', Times, serif;
                padding: 10px 10px ;

        }
        .info_ecriture:hover{
            color: rgb(82, 164, 77);
        }
        .info_title{
            padding-left: 80px;
            padding-right: 80px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-family: 'Times New Roman', Times, serif;
            border: 2px solid green;
            font-size: x-large;
            margin-top: 15px;
            display: inline-block;
        }

        footer{
            color: rgba(255, 255, 255, 255);
            background-color: rgb(87, 105, 83);
            margin-top: 180px;
            margin-bottom: 0;
            padding: 20px;
            text-align: center;

        }
        .faite{
            display: inline-block;
            border: 1px solid rgb(239, 233, 233);
            margin: 20px;
            padding-left: 40px ;
            padding-right: 40px ;
            text-align: center;

        }
         #par{
            margin-left: 100px;
            float: left;
        }
        #conta{
            margin-right: 100px;
            float: right;
        }
        .ecriture{
           font-size: large;
        }
    </style>
</head>
<body>


    @include('bars.navbar')

    <div class="center">
        <ul>
            <li><a class="active" href="">Information Personnel</a></li>
            <li><a href="#news">Vos commands</a></li>
            <li><a href="./bar_contact.html">Contact</a>
            <li><a href="">modifier Mot de passe</a>
            <li><a href="#about">Disconnect</a></li>
        </ul>

        <div style="margin-left:20%;padding:1px 16px;">

            <div class="info">
                <h4 class="info_title">Modifier Mot de passe</h4>


                <section class="contact" id="contact">

                    <div class="row2">

                        <form action="">

                            <div class="inputBox">
                                <label>ansienne mot de passe</label>
                                <input type="password" required="">

                            </div>

                            <div class="inputBox">
                                <label>nouveau mot de passe</label>
                                <input type="password" required="">

                            </div>

                            <div class="inputBox">
                                <label>confirmer mot de passe</label>
                                <input type="password" required="">

                            </div>


                            <input type="submit" class="btn" value="savgarder">

                        </form>
                    </div>

                </section>
            </div>
        </div>
</body>
</html>
