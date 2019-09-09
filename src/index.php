<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Registration form</title>
</head>
<body>
    <!-- Default form login -->
    <div class="row">
        <form class="col-sm-6 text-center border border-light p-5" method="post" autocomplete="off">

        <p class="h4 mb-4">Register</p>

        <!-- Email -->
        <input type="text" name="email" class="form-control mb-4" placeholder="E-mail">

        <!-- Password -->
        <input type="password" name="password" class="form-control mb-4" placeholder="Password">

        <!-- Password confirmation -->
        <input type="password" name="passwordConfirmation" class="form-control mb-4" placeholder="Password confirmation">

        <!-- Sex -->
        <div class="form-group form-control mb-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="male" value="0" checked>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="female" value="1">
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div>

        <!-- Birthdate -->
        <input type="text" name="birthdate" class="form-control mb-4" placeholder="Birthdate">

        <!-- Score -->

        <input type="text" name="score" class="form-control mb-4" placeholder="Score">

        <!-- Website -->
        <input type="text" name="website" class="form-control mb-4" placeholder="Website">


        <!-- Register button -->
        <button class="btn btn-info btn-block my-4" type="submit">Register</button>
</form>
    </div>
    <!-- Default form login -->
</body>
</html>