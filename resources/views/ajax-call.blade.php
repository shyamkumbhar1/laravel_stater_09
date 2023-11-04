<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<button id="fetchButton">Fetch Data</button>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#fetchButton').on('click', function() {
            $.ajax({
                url: "{{ route('fetch.data') }}",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    // Handle the data and update the page content here
                    console.log(data); // For demonstration purposes, you can log the data in the console
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Log any errors to the console
                }
            });
        });
    });
</script>

</body>
</html>
