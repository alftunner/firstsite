<h3>Registration form</h3>
<?php
if (!isset($_POST['regbtn'])) { ?>
    <form action="index.php?page=4" method="post">
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" class="form-control" name="login">
        </div>
        <div class="form-group">
            <label for="pass1">Password:</label>
            <input type="password" class="form-control" name="pass1">
        </div>
        <div class="form-group">
            <label for="pass2">Confirm Password:</label>
            <input type="password" class="form-control" name="pass2">
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email">
        </div>
        <button type="submit" class="btn btn-primary" name="regbtn">Register</button>
    </form>

<? } else {
    if (register($_POST['login'], $_POST['pass1'], $_POST['email'])) {
        echo "<h3><span style='color: green;'>New user is successfully added!</span></h3>";
    }
} ?>
