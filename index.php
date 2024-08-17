<?php

include 'keyauth.php';
include 'credentials.php';

if (isset($_SESSION['user_data'])) {
        header("Location: dashboard/");
        exit();
}

$KeyAuthApp = new KeyAuth\api($name, $ownerid);

if (!isset($_SESSION['sessionid'])) {
        $KeyAuthApp->init();
}
?>

<html lang="en" class="bg-[#09090d] text-white overflow-x-hidden">

<head>
    <title>masmorra</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://cdn.keyauth.cc/assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
     <style>
        body {
            
    background-color: black;
    color: rgb(0, 211, 0); 
    font-family: monospace;
    padding: 20px;
}



input , .acessbutton {     
    background: url(https://neal.fun/perfect-circle/main.jpg);
    display: block;
    padding: 5;
    border: none;
    outline: none;
    box-shadow: none;
    width: 100%;
    margin: 10px;
    
}

.modal-entry{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 80vh;
        z-index: 1;
    }

pre{
    font-size: 15px;
    text-shadow: 10 10 10px 20px rgb(233, 12, 4);  
    -webkit-animation: rainbow 5s infinite;
   position: relative;
   height:5vh;
   z-index: -1;
   filter: blur(5px);
   -webkit-filter: blur(5px);
}

.console{
    margin:5vh;
}


  @-webkit-keyframes rainbow{
    0%{color: rgb(255, 0, 0);}
   10%{color: rgb(255, 38, 0);}
   20%{color: rgb(255, 94, 0);}
   30%{color: rgb(238, 255, 0);}
   40%{color: rgb(145, 255, 0);}
   50%{color: rgb(0, 255, 115);}
   60%{color: rgb(0, 195, 255);}
   70%{color: rgb(0, 140, 255);}
   80%{color: rgb(55, 20, 255);}
   90%{color: rgb(204, 0, 255);}
  100%{color: rgb(255, 0, 76);}
  }

  .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            animation: vhsEffect 10s infinite;
        }

        @keyframes vhsEffect {
            0%, 20%, 80%, 100% {
                opacity: 1;
                filter: contrast(1.2) saturate(1.2) brightness(1.1);
            }
            25%, 75% {
                opacity: 0;
                filter: contrast(1) saturate(1) brightness(1);
            }
        }

     </style>
</head>
<body>
<video autoplay muted loop class="video-background">
        <source src="./Eyes Wide Shut Ritual.mp4" type="video/mp4">
        Seu navegador não suporta vídeos HTML5.
    </video>

<div class="modal-entry">
<pre class="rainbow">
.                                                      .
        .n                   .                 .                  n.
  .   .dP                  dP                   9b                 9b.    .
 4    qXb         .       dX                     Xb       .        dXp     t
dX.    9Xb      .dXb    __                         __    dXb.     dXP     .Xb
9XXb._       _.dXXXXb dXXXXbo.                 .odXXXXb dXXXXb._       _.dXXP
 9XXXXXXXXXXXXXXXXXXXVXXXXXXXXOo.           .oOXXXXXXXXVXXXXXXXXXXXXXXXXXXXP
  `9XXXXXXXXXXXXXXXXXXXXX'~   ~`OOO8b   d8OOO'~   ~`XXXXXXXXXXXXXXXXXXXXXP'
    `9XXXXXXXXXXXP' `9XX'   .      `98v8P'    .     `XXP' `9XXXXXXXXXXXP'
        ~~~~~~~       9X.          .db|db.          .XP       ~~~~~~~
                        )b.  .dbo.dP'`v'`9b.odb.  .dX(
                      ,dXXXXXXXXXXXb     dXXXXXXXXXXXb.
                     dXXXXXXXXXXXP'   .   `9XXXXXXXXXXXb
                    dXXXXXXXXXXXXb   d|b   dXXXXXXXXXXXXb
                    9XXb'   `XXXXXb.dX|Xb.dXXXXX'   `dXXP
                     `'      9XXXXXX(   )XXXXXXP      `'
                              XXXX X.`v'.X XXXX
                              XP^X'`b   d'`X^XX
                              X. 9  `   '  P )X
                              `b  `       '  d'
                               `             '
</pre>

<div id="console" class="console">
<form class="formlogin" method="post" data-postform="1">
                        <div data-username="1">
                        <label for="username">Senha</label> 
                           <input type="text" id="username" name="username">
                            
                        </div>

                        <div data-password="1">
                             <label for="password">Senha</label>
                            <input type="password" id="password" name="password">
                            
                        </div>

                        <button name="login" data-loginbutton="1" class="acessbutton">
                            <span>
                                Acessar
                            </span>
                        </button>
                    </form>
</div>

    <?php
        if (isset($_POST['login'])) {
                // login with username and password
                if ($KeyAuthApp->login($_POST['username'], $_POST['password'])) {
                        echo "<meta http-equiv='Refresh' Content='2;  url=dashboard/index.php'>";
                        $KeyAuthApp->success("You have successfully logged in!");
                }
        }

        ?>



</body>

</html>
