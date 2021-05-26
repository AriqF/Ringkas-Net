<!DOCTYPE html>
<html>
    <head>
        <title>Login AdoptMe</title>
        <?php
            include 'header-signin.php';
        ?>
        <form form class="form" action="login" method="post">
        <div class="content">
            <div class="container slideBoxAnim" id="box" style="padding: 0; margin-top: 20px;">
                <div class="row">
                    <div class="col-md-6">
                        <!--Form Box-->
                        <div class="container" id="formBox">
                            <h2 style="font-weight:bold; letter-spacing:1.5px;">Login Forms</h2>

                            <p style="font-size: 16px;">Login dan berbagilah inspirasi!</p>
                            <hr style="margin-bottom: 36px;">
                            <div class="w-100"></div>
                            <form>
                                <label class="label control-label">username</label>
                                <input type="text" class="form-control" name="username" placeholder="username">
                                <label class="label control-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="password">

                                <input type="hidden" class="form-control" name="usertype" value="user">

                                <div class="col text-center" style="margin-top: 210px;">
                                    <br>
                                    <a href="signUp">saya belum memiliki akun</a> <a href="forgot-password"> / lupa password?</a>
                                    <div class="w-100"></div>
                                    <button name="login-btn" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="startbtn" style="margin-top: 10px;">
                                        Login
                                    </button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    <!--Image Box-->
                    <div class="col-md-6">
                        <div class="container" id="pictBox">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <script>
            document.getElementById("pictBox").style.backgroundImage = "url(../src/img/signin-img.jpg)";
        </script>
    </body>
</html>