<?php include('./templates/header.php'); ?>
<?php include('./src/controllers/signup.php') ?>

<div id="signup--wrapper">
    <form method="POST">
    
        <input placeholder="User name"          class="input" type="text"      name="user_name">
        <input placeholder="User first name"    class="input" type="text"      name="user_fname">
        <input placeholder="User last name"     class="input" type="text"      name="user_lname">
        <input placeholder="User E-mail"        class="input" type="text"      name="user_email">
        <input placeholder="Password"           class="input" type="password"  name="user_pass">
        <input placeholder="Repeat Password"    class="input" type="password"  name="user_pass_repeat">
        <input type="hidden" name="user_request_tokken" value="1">
        <input class="submit" type="submit">
    
    </form>
</div>


<?php include ('./templates/footer.php'); ?>



