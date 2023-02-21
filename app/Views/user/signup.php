<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<div class="regform">
    <section class="container">
        <header id="formhead">Registration Form</header>
        
        <?php if (isset($validation)): ?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>
          
        <form action="<?= base_url()?>/Home/register" method="post" name="registrationForm" class="form" id="form"
            enctype="multipart/form-data">
            <div class="column">
                <div class="form-data">
                    <label for="firstName">First Name <em class="err">*</em></label>

                    <input type="text" name="firstName" id="firstName" placeholder="Enter Your First Name">
                   
                </div>

                <div class="form-data">
                    <label for="lastName">Last Name <em class="err">*</em></label>

                    <input type="text" name="lastName" id="lastName" placeholder="Enter Your Last Name">
                </div>
            </div>

            <div class="form-data">
                <label for="email">Email <em class="err">*</em></label>

                <input type="email" name="email" id="email" placeholder="Enter Your Email Id">
            </div>

            <div class="column">
                <div class="form-data">
                    <label for="mobile">Mobile No. <em class="err">*</em></label>

                    <input type="number" name="mobile" id="mobile" placeholder="Enter Your Mobile No.">
                </div>


                <div class="form-data">
                    <label for="password">Password <em class="err">*</em></label><br>

                    <input type="password" name="password" id="password" placeholder="Enter Your Password">
                </div>

                <div class="form-data">
                    <label for="confirmPassword">Confirm Password <em class="err">*</em></label><br>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
                </div>

                <div>
                    <button name="submit">Submit</button>
                </div>
        </form>
    </section>
</div>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
    $(document).ready(function () {
        $("#form").validate({
            rules: {
                firstName: {
                    required: true,
                    minlength: 3
                },
                lastName: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                confirmPassword: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                }
            }
        });
    });
</script>
<?= $this->endSection() ?>