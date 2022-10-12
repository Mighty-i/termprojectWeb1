<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-center">
                <div class="shadow-lg bg-white p-5 mt-5 rounded-4 ">
                    <div class="text-center"><br />
                        <h1>Login Page</h1>
                    </div>
                    <form method="post" action="checklogin.php" class="form-horizontal">
                        <div class="form-group">
                            <br />
                            <div class="form-center">
                                <div class="col-center">
                                    <input class="form-control" type="text" id="txt_login" name="txt_login" placeholder="UserName" required="true">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <br />
                            <div class="col-center">
                                <input class="form-control" type="password" id="txt_password" name="txt_password" placeholder="Password" required="true">
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="form-group">
                                <label for="bt" class="col-1 col-form-label"></label>
                                <div>
                                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                    <button class="btn btn-primary" id="bt">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>