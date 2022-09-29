<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
    <style type="text/css">
        body{
            background: #c8e1f7;
        }
    </style>
</head>
<body>
    <div class="container mt-5 p5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7">
                        <img src="/assets/image/bg-register.jpg" class="card-img-top">
                    </div>

                    <div class="col-lg-5">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (Session::has('status'))
                        <div class="alert alert-warning" role="alert">
                            {{ Session::get('status')}}
                        </div>
                        @endif
                        <form action="{{ url('register') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h3>Form Register</h3>
                            <hr>
                            <label>Nama</label>
                            <input type="text" name="name_user" class="form-control">

                            <label>Email</label>
                            <input type="text" name="email" class="form-control">

                            <label>Password</label>
                            <input type="password" name="password" class="form-control">

                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            <label>Level Akses</label>
                            <select class="form-control" name="level" id="level">
                            <option value="1">Admin</option>
                            <option value="2">Kasir</option>
                            </select>

                            <br>
                            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Register">
                            <a href="login" class="btn btn-danger">Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
 </body> 
 
 </html>