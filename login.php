<!DOCTYPE html>
<html lang="en">
<head>
    <title> Hedefim12.Com - Kullanıcı Girişi </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php $this->load->view("inc_forms/inc_form-style"); ?>

</head>

<body class="woodbg">

<div class="smart-wrap">
    <div class="smart-forms smart-container wrap-3">

        <div class="form-header header-red">
            <h4><i class="fa fa-sign-in"></i>Kullanıcı Girişi</h4>
        </div><!-- end .form-header section -->

        <form method="post" action=<?php echo site_url('User/user_login_control')?> id="contact">
            <div class="form-body theme-red">

                <div class="spacer-b30">
                    <div class="tagline"><span>Sosyal Medya Hesabı ile </span></div><!-- .tagline -->
                </div>

                <div class="section">
                    <a href="#" class="button btn-social facebook span-left"> <span><i class="fa fa-facebook"></i></span> Facebook </a>
                    <a href="#" class="button btn-social twitter span-left">  <span><i class="fa fa-twitter"></i></span> Twitter </a>
                    <a href="#" class="button btn-social googleplus span-left"> <span><i class="fa fa-google-plus"></i></span> Google+ </a>
                </div><!-- end section -->

                <div class="spacer-t30 spacer-b30">
                    <div class="tagline"><span> Kullanıcı Girişi </span></div><!-- .tagline -->
                </div>

                <div class="section">
                    <label class="field prepend-icon">
                        <input type="text" name="email" id="email" class="gui-input" placeholder="Kullanıcı e-mail">
                        <span class="field-icon"><i class="fa fa-user"></i></span>
                    </label>
                    <?php echo form_error('email'); ?>
                </div><!-- end section -->

                <div class="section">
                    <label class="field prepend-icon">
                        <input type="text" name="password" id="password" class="gui-input" placeholder="Şifre">
                        <span class="field-icon"><i class="fa fa-lock"></i></span>
                    </label>
                    <?php echo form_error('password'); ?>
                </div><!-- end section -->

                <div class="section">
                    <label class="switch switch-red block">
                        <input type="checkbox" name="remember" id="remember" checked>
                        <span class="switch-label" for="remember" data-on="YES" data-off="NO"></span>
                        <span> Beni hatırla</span>
                    </label>
                </div><!-- end section -->

            </div><!-- end .form-body section -->
            <div class="form-footer">
                <button type="submit" class="button btn-red" name="login">Giriş yap</button>
            </div><!-- end .form-footer section -->
        </form>

    </div><!-- end .smart-forms section -->
</div><!-- end .smart-wrap section -->

<div></div><!-- end section -->

</body>
</html>
