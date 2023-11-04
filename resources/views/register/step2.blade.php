@if (isset($message))
    <div class="alert alert-success">
        <strong>Success:</strong> {{ $message }}
    </div>
@endif

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');*{padding: 0;margin: 0;box-sizing: border-box;font-family: 'Poppins', sans-serif}body{margin-top: 50px;display: flex;align-items: center;justify-content: center}.card{max-width: 250px;height: 380px;position: relative;padding: 20px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px}.h-1{text-transform: uppercase}.ribon{position: absolute;left: 50%;top: 0;transform: translate(-50%, -50%);width: 80px;height: 80px;background-color: #2b98f0;border-radius: 50%;display: flex;align-items: center;justify-content: center}.ribon .fas.fa-spray-can, .ribon .fas.fa-broom, .ribon .fas.fa-shower, .ribon .fas.fa-infinity{font-size: 30px;color: white}.card .price{color: #2b98f0;font-size: 30px}.card ul{display: flex;flex-direction: column;align-items: center;justify-content: center}.card ul li{font-size: 12px;margin-bottom: 8px}.card ul .fa.fa-check{font-size: 8px;color: gold}.card:hover{background-color: gold}.card:hover .fa.fa-check{color: #2b98f0}.card .btn{width: 200px;height: 50px;display: flex;align-items: center;justify-content: center;background-color: #2b98f0;border: none;border-radius: 0px;box-shadow: none}@media (max-width:500px){.card{max-width: 100%}}
    </style>
</head>

<body>
    <div class="container">
        <div>
            <p class="text-center mb-50 h2">Choose Your Perfect Plans</p>
        </div>
        <div class="mt-4 row">
            <div class="col-lg-3 col-md-6 ">
                <div class="card d-flex align-items-center justify-content-center">
                    <div class="ribon"> <span class="fas fa-spray-can"></span> </div>
                    <p class="h-1 pt-5">STARTER</p> <span class="price"> <sup class="sup">$</sup> <span
                            class="number">49/per month</span> </span>

                    <ul class="mb-5 list-unstyled text-muted">
                        <li><span class="fa fa-check me-2"></span>Details</li>

                    </ul>
                    <div class="btn btn-primary">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">Get Started</a>
                        @endif

                    </div>
                </div>
            </div>


        </div>
    </div>

</body>

</html>
