<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{'Bootstrap_to_copy/css/bootstrap.min.css'}}">
        <title>Login</title>
    </head>
    <body>
        <div class="row mt-5">
        <div class="col-md-6 m-auto">
            <div class="card card-body">
                <form action="/lumen/myapp/public/api/users" method="GET">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter username"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password"/>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>