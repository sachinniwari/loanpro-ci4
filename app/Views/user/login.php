<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="loginFormDiv">
    <section class="login">
        <header id="formhead">Login</header>
        <?=\Config\Services::validation()->listErrors() ?>
        <form action="<?= base_url() ?>/Home/auth" class="loginForm" name="login" id="loginForm" method="post">
            <div class="form-data">
                <label for="email">Email <em class="err">*</em></label>
                <input type="text" name="email" id="email" placeholder="Enter Your Email">
            </div>
            <div class="form-data">
                <label for="password">Password <em class="err">*</em></label>
                <input type="password" name="password" id="password" placeholder="Enter Your Password">
            </div>
            <div style="margin: 10px;">
                <div class="g-recaptcha" data-sitekey="6LdcOskjAAAAABncvzWA6tSdGw1oyUimf_gDVGqV">
                </div>
            </div>
            <div>
                <button name="login" id="loginbtn">Login</button>
            </div>
        </form>
    </section>
</div>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src='https://www.google.com/reCAPTCHA/api.js' async defer></script>
<script>
    document.getElementById("loginForm").addEventListener("submit", function (evt) {

        var response = grecaptcha.getResponse();
        if (response.length == 0) {
            //reCaptcha not verified
            alert("Please verify you are humann!");
            evt.preventDefault();
            return false;
        }

    });
    $(document).ready(function () {
        $("#loginForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8,
                }
            }
        });
    });
</script>
<?= $this->endSection() ?>