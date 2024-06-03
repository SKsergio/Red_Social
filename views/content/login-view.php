<div class="main">
    <div class="content__main">

        <secction class="sc1">
            <img src="<?php echo URL_BASE;?>views/css/img/8_1sasa11.png" alt="logo papaaa" id="logo">
            <section>
                <p>Mantente siempre conectado y en contacto con quien quieras y cuando quieras</p>
            </section>
        </secction>

        <secction class="sc2">

            <div class="wrapper">

                <h1>Walweb</h1>

                <form class="form__login" method="post">

                    <div class="container_inputs">
                        <div class="input__box">
                            <input type="text" class="input_file" required id="user_gmail" name="user">
                            <span>User</span>
                            <i></i>
                        </div>

                        <div class="input__box">
                            <input type="password" class="input_file" required id="password" name="password">
                            <span>Password</span>
                            <i></i>
                        </div>
                    </div>
                    
                    <div class="butons">

                        <input type="submit" id="loginBtn" value="Login" class="LOGBTN">
                        
                        <div class="forg">
                            <a id="forgotPassword" href="#">Forgotten password?</a>
                        </div>

                        <a class="create" id="createAccountBtn" href="<?php echo URL_BASE;?>formUser1/">Create new account</a>

                        
                    </div>
                    
                </form>
            </div>
            
        </secction>
    </div>  
</div>