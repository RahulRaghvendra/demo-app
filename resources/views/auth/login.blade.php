<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/bootstrap.min.css">
    <style>
        /* Additional CSS for custom styling */
        body {
            background-color: #f8f9fa;
        }

        .card {
            max-width: 400px;
            margin: 150px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            /* background-color: #000000; */
            color: #000000;
            border-bottom: none;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
            margin-top: 10px;
        }

        .card-body {
            padding: 20px;
        }

        h3 {
            text-align: center;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-dark {
            width: 100%;
        }

        .text-danger {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header" >
            <h3>Login</h3>
          
        </div>
        <div class="card-body">
            <form action="{{ route('login_post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    @if ($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @if ($errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary w-100 ">Login</button>
                <div class="mt-2 ">
                <label>
                    <input type="checkbox"  name="remember"> Remember Me
                </label>
                </div>
            </form>
        </div>
    </div>
    @include('success')
    <script src="{{asset('public/assets')}}/js/vendor/jquery.min.js"></script>
    <script src="{{asset('public/assets')}}/js/font-awesome.min.js"></script>
    <script src="{{asset('public/assets')}}/js/bootstrap.bundle.min.js"></script>
</body>

</html>