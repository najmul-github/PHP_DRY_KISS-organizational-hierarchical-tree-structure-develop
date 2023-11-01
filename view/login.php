<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/login.css"></link>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2 class="login-header">Login</h2>
                <form action="../src/login.php" method="post">
                    <label for="email">Email:</label>
                    <input type="text" name="email" required><br>

                    <label for="password">Password:</label>
                    <input type="password" name="password" required><br>

                    <label for="department">Department:</label><br>
                    <select class="custom-select" name="department" required aria-required="on">
                        <option selected disabled value="">Choose...</option>
                        <option value="1">Department A</option>
                        <option value="2">Department B</option>
                        <option value="3">Department C</option>
                    </select><br><br>

                    <input type="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
