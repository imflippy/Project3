<div class="chechboxes-wrapper">
    <div class="chechboxes">
        <div class="chechboxes-left" id="products-left">
            <h2>Login Form</h2>
            <form action="index.php?page=do-login" method="post" class="form">
                <div class="input-field">
                    <input type="email" name="email" id="email" class="" placeholder="Enter Email">
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="password" class="" placeholder="Enter Pasword">
                </div>
                <div>
                    <button type="submit" class="btn" name="btnLogin">Login</button>
                </div>
            </form>

            <div class="messages">
                <ul class="erros">
                    <?php
                    if(isset($_SESSION['errorsLog'])):
                        foreach ($_SESSION['errorsLog'] as $e):
                            ?>
                            <li><?= $e ?></li>
                        <?php
                        endforeach;
                        unset($_SESSION['errorsLog']);
                    endif;
                    ?>
                </ul>
            </div>
        </div>
        <div class="chechboxes-right" id="products-right">
            <h2>Register Form</h2>
            <form action="index.php?page=do-register" method="post" class="form">
                <div class="input-field">
                    <input type="text" name="first_name" id="first_name" class="" placeholder="Enter First Name">
                </div>
                <div class="input-field">
                    <input type="text" name="last_name" id="last_name" class="" placeholder="Enter Last Name">
                </div>
                <div class="input-field">
                    <input type="email" name="email" id="email" class="" placeholder="Enter Email">
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="password" class="" placeholder="Enter Pasword">
                </div>
                <div>
                    <button type="submit" class="btn" name="btnRegister">Register</button>
                </div>
            </form>
            <div class="messages">
                <ul class="erros">
                    <?php
                    if(isset($_SESSION['errorsReg'])):
                        foreach ($_SESSION['errorsReg'] as $e):
                            ?>
                            <li><?= $e ?></li>
                        <?php
                        endforeach;
                        unset($_SESSION['errorsReg']);
                    endif;
                    ?>
                </ul>

                <?php
                if(isset($_SESSION['successReg'])):
                    ?>
                    <span class="success"><?= $_SESSION['successReg']; ?></span>
                <?php
                endif;
                unset($_SESSION['successReg']);
                ?>
            </div>
        </div>
    </div>
</div>