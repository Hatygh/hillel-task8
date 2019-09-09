<?php

require_once 'validation.php';

$errors = [
    'email' => array(),
    'password' => array(),
    'passwordConfirmation' => array(),
    'birthdate' => array(),
    'sex' => array(),
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
    elseif (!string_length_validator($password, 8, 20))
        $errors['password'][] = 'Password should contain more than 8 and less than 20 symbols';

    $passwordConfirmation = $_POST['passwordConfirmation'];
    if (!not_empty_validator($passwordConfirmation))
        $errors['passwordConfirmation'][] = 'Password confirmation required';
    elseif (!string_length_validator($passwordConfirmation, 8, 20))
        $errors['passwordConfirmation'][] = 'Password should contain more than 8 and less than 20 symbols';
    elseif (!identical_validator($password, $passwordConfirmation))
        $errors['passwordConfirmation'][] = 'Passwords dont match';

    $sex = $_POST['sex'];
    if (!in_array($sex, ['0', '1'], 1))
        $errors['sex'][] = 'Magic happened';

    $birthdate = $_POST['birthdate'];
    if (!not_empty_validator($birthdate))
        $errors['birthdate'][] = 'Birthday required';
    elseif (!date_validator($birthdate))
        $errors['birthdate'][] = 'When you was born?';

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

    $count = null;
    foreach ($errors as $error) {
        $count += count($error);
    }

    if (!$count) {
        echo "<div class=\"alert alert-success\">" . 'Registration successful' . "</div>";
    }
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
        <input type="text" name="email" class="form-control mb-4" placeholder="E-mail" value=<?= $_POST['email'] ?? ""?> >
        <?php if (count($errors['email'])): ?>
            <div>
                <?php foreach ($errors['email'] as $error): ?>
                    <p class="alert alert-primary"> <?= $error; ?> </p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Password -->
        <input type="password" name="password" class="form-control mb-4" placeholder="Password">
        <?php if (count($errors['password'])): ?>
            <div>
                <?php foreach ($errors['password'] as $error): ?>
                    <p class="alert alert-primary"> <?= $error; ?> </p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Password confirmation -->
        <input type="password" name="passwordConfirmation" class="form-control mb-4" placeholder="Password confirmation">
        <?php if (count($errors['passwordConfirmation'])): ?>
            <div>
                <?php foreach ($errors['passwordConfirmation'] as $error): ?>
                    <p class="alert alert-primary"> <?= $error; ?> </p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

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
            <?php if (count($errors['sex'])): ?>
                <div>
                    <?php foreach ($errors['sex'] as $error): ?>
                        <p class="alert alert-primary"> <?= $error; ?> </p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Birthdate -->
        <input type="text" name="birthdate" class="form-control mb-4" placeholder="Birthdate" value=<?= $_POST['birthdate'] ?? ""?> >
        <?php if (count($errors['birthdate'])): ?>
            <div>
                <?php foreach ($errors['birthdate'] as $error): ?>
                    <p class="alert alert-primary"> <?= $error; ?> </p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Score -->

        <input type="text" name="score" class="form-control mb-4" placeholder="Score" value=<?= $_POST['score'] ?? ""?> >
        <?php if (count($errors['score'])): ?>
            <div>
                <?php foreach ($errors['score'] as $error): ?>
                    <p class="alert alert-primary"> <?= $error; ?> </p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Website -->
        <input type="text" name="website" class="form-control mb-4" placeholder="Website" value=<?= $_POST['website'] ?? ""?> >
        <?php if (count($errors['website'])): ?>
            <div>
                <?php foreach ($errors['website'] as $error): ?>
                    <p class="alert alert-primary"> <?= $error; ?> </p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>


        <!-- Register button -->
        <button class="btn btn-info btn-block my-4" type="submit">Register</button>
</form>
    </div>
    <!-- Default form login -->
</body>
</html>