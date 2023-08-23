<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
</head>

<body>

    <h1>About Us</h1>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quibusdam.</p>
    {{ date('d/m/Y') }}
    {{ time() }}

    @if (1 == 2)
        <p>1 is equal to 2</p>
    @endif


</body>

</html>
