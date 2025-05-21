<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Load reCAPTCHA script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <h2>Login</h2>

    <?php if (!empty($error)) echo '<p style="color:red;">' . $error . '</p>'; ?>

    <form method="post" action="<?= base_url('index.php/mango/login') ?>">

        <label>Email:</label><br>
        <input type="email" name="email"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <!-- reCAPTCHA widget -->
        <div class="g-recaptcha" data-sitekey="6Lfx4T8rAAAAALVm9qfdF2-7FxV1zNGLIW2JCUk1"></div>
        <br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
