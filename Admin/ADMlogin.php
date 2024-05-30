
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="shortcut icon" href="rev.png" />
    <link rel="stylesheet" href="css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Reviewers</title>
    <style>
       
/* index.html */
body {
    background-color: #5375E2;
    overflow: hidden;
    position: relative; /* Add this to make the canvas absolute positioned relative to the body */
}

canvas {
    position: absolute; /* Position the canvas absolutely within the body */
    top: 0;
    left: 0;
    z-index: -1; /* Ensure the canvas is behind other content */
}

.flex-container {
    display: flex;
    flex-direction: column;
    align-content: center;
    width: 100%;
  }
  
  .flex-container > .header {
    width: 100%;
    margin: 20px auto;
    text-align: center;
    color: #fefefe;
    line-height: 25px;
    font-size: 37px;
    font-family: "Roboto", sans-serif;
  }
  
  .flex-container > .login {
    width: 30%;
    margin: 0px auto;
    color: #fefefe;
    line-height: 50px;
    text-align: center;
    font-size: 28px;
    flex-direction: column;
    font-family: "Roboto", sans-serif;
  }
  
  .flex-container > .login label[for=email],label[for=pass]{
    color: #fefefe;
    font-size: 18px;
    font-size: 20px;
    letter-spacing: 15px;
  }
  
  .login input[type=password],input[type=text]{
    width: 80%;
    height: 30px;
    border-radius: 20px;
    background-color: #ffffff;
    font-size: 16px;
    color: #000;
    padding: 10px;
    border: none;
    margin-bottom: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Adding box shadow */
  }
  
  .login button{
    width: 85%;
    height: 50px;
    margin-top: 40px;
    border-radius: 12px;
    background-color: #253A7D;
    color: #fff;
    border: none;
    font-size: 25px;
  }
.flex-container-1 {
    display: flex;
    justify-content: space-between;
    width: 90%;
    margin: auto;
    gap: 100px;
  }
.flex-container-1 > div {
    margin: 0 auto;
    padding: 4px;
    font-size: 18px;
  }
  .login label[for=reme]{
    color: #fefefe;
    font-size: 18px;
  }
  
  .login input[type=checkbox]{
    width: 20px;
    height: auto;
    margin: auto;
  }
  .login a{
    font-size: 16px;
    color: #030816;
    text-decoration: none;
  }
  .login a:hover{
    text-decoration: underline;
  }
  .header h3 {
    font-family: "Roboto", sans-serif;
    font-weight: 300;
    letter-spacing: 1px;
    font-size: 28px;
  }
 
    /* media query */
    @media only screen and (max-width: 600px) {
        .flex-container {
            display: flex;
            flex-direction: column;
            align-content: center;
            width: 100%;
        }

            .flex-container > .header {
                width: 100%;
                margin: 10px auto;
                font-size: 27px;
            }

            .flex-container > .login {
                width: 100%;
                margin: 0 auto;
            }

        /* home.hmtl*/
.rowcp {
    display: flex;
}

.row {
    display: flex;
    flex-direction: column;
    width: 50%;
}

.col {
    width: 100%;
    padding: 10px;
    margin: 10px auto;
}

.overlay {
    position: absolute;
    top: 95%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.button-container {
    display: flex;
    gap: 30px;
    text-align: center;
    margin-top: 20px;
}

    .button-container button {
        width: 160px;
        height: 70px;
        border-radius: 15px;
        color: #5375E2;
        font-family: "Roboto", sans-serif;
        font-size: 17px;
        font-weight: bold;
        border: none;
        letter-spacing: 2px;
    }

.header-DB {
    background-size: cover;
    width: 100%;
    height: 300px; /* Adjust height as needed */
}

.header-text {
    margin: 4% auto;
    text-align: center;
}

    .header-text h1 {
        position: relative;
        font-size: 30px;
        font-weight: 800;
        color: #fff;
        text-align: center;
        font-family: "Roboto", sans-serif;
        margin: 50px auto;
    }

img {
     width: 80px;
     height: 80px;
 }
}

    @media only screen and (min-width: 601px) and (max-width: 900px) {
        .flex-container {
            display: flex;
            flex-direction: column;
            align-content: center;
            width: 100%;
        }

            .flex-container > .header {
                width: 100%;
                margin: 10px auto;
                text-align: center;
            }

            .flex-container > .login {
                width: 500px;
                margin: 0px auto;
            }

        /* home.hmtl*/
        .rowcp {
            display: flex;
        }

        .row {
            display: flex;
            flex-direction: column;
            width: 50%;
        }

        .col {
            width: 100%;
            padding: 10px;
            margin: 10px auto;
        }

        .overlay {
            position: absolute;
            top: 95%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .button-container {
            display: flex;
            gap: 200px;
            text-align: center;
            margin-top: 20px;
        }

            .button-container button {
                width: 160px;
                height: 70px;
                border-radius: 15px;
                color: #5375E2;
                font-family: "Roboto", sans-serif;
                font-size: 17px;
                font-weight: bold;
                border: none;
                letter-spacing: 2px;
            }

        .header-DB {
            background-size: cover;
            width: 100%;
            height: 300px; /* Adjust height as needed */
        }

        .header-text {
            margin: 4% auto;
            text-align: center;
        }

            .header-text h1 {
                font-size: 18px;
                font-family: "Roboto", sans-serif;
                margin: 100px auto;
                font-weight: bold;
            }

        img {
            width: 80px;
            height: 80px;
        }
    }

    @media only screen and (min-width: 901px) {
        .flex-container {
            display: flex;
            margin: 0 auto;
            width: 70%;
        }

            .flex-container > .header {
                width: 100%;
                margin: 10px auto;
                line-height: 25px;
            }

            .flex-container > .login {
                width: 500px;
                margin: 0px auto;
            }
    }

    @media only screen and (min-width: 1024px) {
        .flex-container {
            display: flex;
            margin: 0 auto;
            flex-direction: column;
            align-content: center;
            width: 100%;
        }

            .flex-container > .header {
                width: 100%;
                margin: 10px auto;
            }

            .flex-container > .login {
                width: 500px;
                margin: 0px auto;
            }
    }
    </style>
</head>
<body>
    <div class="flex-container">
        <div class="header">
            <h1>Log in</h1>
            <h3>LSPU Quizlet/Reviewer</h3>
        </div>
        <div class="login">
            <form action="adminPHP/login.php" method="POST">
                <div><label for="email"> Username </label></div>
                <div><input type="text" name="username" required /></div>
                <div><label for="password"> PASSWORD </label></div>
                <div><input type="password" name="pass" required /></div>
                <div class="flex-container-1">
                </div>
                <button type="submit" name="login" value="submitted_value"> SIGN IN </button>
            </form>
        </div>
    </div>
    <canvas id="background"></canvas>
    <script src="js/background.js"></script>
</body>
</html>
