<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
        body{
            
            text-align: center;
        }
        form{
            text-align: center;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }
        .main{
            border-width:1px;
            border-style:solid;
            border-color:blue;
            margin-left: 400px;
            margin-right: 400px;
        }
    </style>    
    </head>
    <body>
        <?php
            include 'dbconn.php';
            if(isset($_POST['submit']))
            {
                $query = "select password from user_login where username = '$_POST[username]'";
                $result = mysqli_query($conn, $query);
                $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

                if($data[0]['password'] == $_POST['passwd'])
                {
                    session_start();
                    $_SESSION['username'] = $_POST['username'];
                    header('Location: home.php');
                }
            } 
        ?>
        <div class="div1">
            <h1 style="margin-bottom: 50px; margin-top: 50px" >Log In</h1>
        </div>
        <div>
        </div>
        <div class="main">
        <form action="Login.php" style="margin-top: 20px; margin-top: 20px" method="POST">
        <div class="form-group">
        <div class="form-group">
            <label for="textInput"> Username </label>
            <input type="text" class="form-control" name="username" width=150 id="textInput">
        </div>
        <div class="form-group">
        <label>Password</label>
            <input type="password" class="form-control" name="passwd" width=150>
        </div>
        <div class="form-group">
            <button type="Submit" name= "submit" method = "POST" class="btn btn-primary">Login</button>
        </div>
        </div>
        </form>
        </div>
    </body>
</html>