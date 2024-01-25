<?PHP require APP_ROOT.'/views/inc/header.php' ?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Create an Account</h2>
                <p>Fill out to Register</p>
                <form action="<?PHP echo URL_ROOT ?>/users/register" method="post">
                    <div class="form-group">
                        <label for="username">Username: <sup class="is-invalid">*</sup></label>
                        <input type="text" name="username" id="" class="form-control form-control-lg <?PHP echo (!empty($data['usernameErr'])) ? 'is-invalid' : '' ?>" value="<?PHP echo $data['username']?>" />
                        <span class="invalid-feedback"><?PHP echo $data['usernameErr'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: <sup class="is-invalid">*</sup></label>
                        <input type="text" name="email" id="" class="form-control form-control-lg <?PHP echo (!empty($data['emailErr'])) ? 'is-invalid' : '' ?>" value="<?PHP echo $data['email']?>" />
                        <span class="invalid-feedback"><?PHP echo $data['emailErr'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <sup class="is-invalid">*</sup></label>
                        <input type="password" name="password" id="" class="form-control form-control-lg <?PHP echo (!empty($data['passErr'])) ? 'is-invalid' : '' ?>" value="<?PHP echo $data['password']?>" />
                        <span class="invalid-feedback"><?PHP echo $data['passErr'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="again">Confirm: <sup class="is-invalid">*</sup></label>
                        <input type="password" name="again" id="" class="form-control form-control-lg <?PHP echo (!empty($data['againErr'])) ? 'is-invalid' : '' ?>" value="<?PHP echo $data['again']?>" />
                        <span class="invalid-feedback"><?PHP echo $data['againErr'] ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Register" class="btn btn-success btn-block" />
                        </div>
                        <div class="col">
                            <a href="<?PHP echo URL_ROOT ?>/users/login" class="btn btn-light btn-block">Already Registered? Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?PHP require APP_ROOT.'/views/inc/footer.php' ?>