<?php
global $user;

if ($user != null) {
    echo "Déjà connecté.";
    return;
}


if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-' . $_SESSION['message']['type'] . '" role="alert">' . $_SESSION['message']['msg'] . '</div>';
}
unset($_SESSION['message']);

?>
<div class="container">
<div class="mx-auto my-4 bg-light p-4 " style="max-width: 400px;" id="loginform">

        <h4 class="card-title text-center">Se connecter</h4>
        <form action="../authentication/login_action.php" method="post">

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="email" class="form-control" placeholder="Email" type="email">
            </div>

            <div class="form-group input-group">

                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-key"></i> </span>
                </div>

                <input name="password" class="form-control" placeholder="Mot de passe" type="password">
            </div>

            <div class="">
              <p class="small text-right" id="resetPasswordModTrigger"><a href="#">Mot de passe oublié ?</a></p>

            <!--            TODO : FIX no JS action in non modal mode (in authentication/login.php)-->
            </div>

            <?php if (isset($token)){ ?> <input type="hidden" name="token" value="<?= $token ?>" <?php } ?>


            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
            </div>


        </form>
        <p class="text-right small"> Pas de compte ? <a class="text-secondary" href="../authentication/signup.php">Inscrivez-vous</a></p>

        

</div>
</div>