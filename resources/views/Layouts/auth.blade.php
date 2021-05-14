<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Library MSP</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('assets/css/bootstrap.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/app.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/pages/auth.css') }}>
    <link rel="shortcut icon" href={{ asset('assets/images/msp.png') }} type="image/x-icon">
</head>

<body>
    <div id="auth">
        <div class="text-center auth-logo">
            <a href="index.html"><img src={{ asset('assets/images/msp.png') }} alt="Logo"></a>
        </div>
        <div id="auth-left">
            <div class="container">
                <div class="row h-100 py-5 ">
                    <div class="col-md-8 col-8 ">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
{{-- <div id="auth-left">


</div> --}}
{{-- <div class="col-lg-7 d-none d-lg-block">
    <div id="auth-right">
        <img src={{ asset('assets/images/contoh1.jpg') }} alt="">
    </div>
</div> --}}
