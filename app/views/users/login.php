<?PHP require APP_ROOT.'/views/inc/header.php' ?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <?PHP echo message('reg_success') ?>
                <h2>Login to your Account</h2>
                <p>Fill in your information to continue.</p>
                <form action="<?PHP echo URL_ROOT ?>/users/login" method="post">
                    <div class="form-group">
                        <label for="email">Email: <sup class="is-invalid">*</sup></label>
                        <input type="email" name="email" id="" class="form-control form-control-lg <?PHP echo (!empty($data['emailErr'])) ? 'is-invalid' : '' ?>" value="<?PHP echo $data['email']?>" />
                        <span class="invalid-feedback"><?PHP echo $data['emailErr'] ?></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password: <sup class="is-invalid">*</sup></label>
                        <input type="password" name="password" id="" class="form-control form-control-lg <?PHP echo (!empty($data['passErr'])) ? 'is-invalid' : '' ?>" value="<?PHP echo $data['password']?>" />
                        <span class="invalid-feedback"><?PHP echo $data['passErr'] ?></span>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Login" class="btn btn-success btn-block" />
                        </div>
                        <div class="col">
                            <a href="<?PHP echo URL_ROOT ?>/users/register" class="btn btn-light btn-block">Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?PHP require APP_ROOT.'/views/inc/footer.php' ?>