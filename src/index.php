<?php

require_once 'validation.php';

$errors = [
    'email' => array(),
    'password' => array(),
    'passwordConfirmation' => array(),
    'birthday' => array(),
    'score' => array(),
    'website' => array(),
];

if ($_POST) {
    $email = $_POST['email'];
    if (!not_empty_validator($email))
        $errors['email'][] = 'Email required';
    elseif (!email_validator($email))
        $errors['email'][] = 'Email should be valid email address';

    $password = $_POST['password'];
    if (!not_empty_validator($password))
        $errors['password'][] = 'Password required';
    elseif (string_length_validator($password) < 8)
        $errors['password'][] = 'Password should contain more than 8 symbols';

    $passwordConfirmation = $_POST['passwordConfirmation'];
    if (!not_empty_validator($passwordConfirmation))
        $errors['passwordConfirmation'][] = 'Password confirmation required';
    elseif (string_length_validator($passwordConfirmation) < 8)
        $errors['passwordConfirmation'][] = 'Password should contain more than 8 symbols';
    elseif (!identical_validator($password, $passwordConfirmation))
        $errors['passwordConfirmation'][] = 'Passwords dont match';

    $sex = $_POST['sex'];
    if (!in_array($sex, [0, 1], 1))
        $errors['sex'][] = 'Magic happened';

    $birthdate = $_POST['birthdate'];
    if (!not_empty_validator($birthdate))
        $errors['birthday'][] = 'Birthday required';
    elseif (!date_validator($birthdate))
        $errors['birthday'][] = 'When you was born?';

    $score = $_POST['score'];
    if (!digit_validator($score))
        $errors['score'][] = 'Score should be a number';
    elseif (!between_validator($score, [0, 100]))
        $errors['score'][] = 'Score should fit an interval between 0 and 100';

    $website = $_POST['website'];
    if (!not_empty_validator($website))
        $errors['website'][] = 'Website required';
    elseif (!uri_validator($website))
        $errors['website'][] = 'Website should be a valid URL address';
}

?>

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