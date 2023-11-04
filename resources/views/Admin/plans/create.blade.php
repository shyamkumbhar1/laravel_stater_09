<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Plan</title>
</head>

<body>
    <h1>Create Plan</h1>
    <form action="{{route('plans.store')}}" method="POST">
@csrf
        <div class="form-group">
            <label for="">Plan Name</label>
            <input type="text" name="name" class="form-control " placeholder="Enter Plan Name">
        </div>
        <div class="form-group">
            <label for="">Ammount</label>
            <input type="number" name="amount" class="form-control " placeholder="Enter Ammount">
        </div>
        <div class="form-group">
            <label for="">Currency</label>
            <input type="text" name="currency" class="form-control " placeholder="Enter Currency">
        </div> <div class="form-group">
            <label for="">Interval Count</label>
            <input type="number" name="interval_count" class="form-control " placeholder="Enter Count">
        </div>
        <div class="form-group">
            <label for="">Billing Period</label>
            <select name="billing_period" id="" class="form-controll">
                <option disabled selected> Choose Billing Methode</option>
                <option value="week">weekly</option>
                <option value="month">Monthly</option>
                <option value="year">Yearly</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
