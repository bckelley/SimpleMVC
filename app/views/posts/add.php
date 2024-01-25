<?PHP require APP_ROOT.'/views/inc/header.php' ?>
    <a href="<?PHP echo URL_ROOT ?>/posts/index" class="btn btn-secondary"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Add Post</h2>
        <p>Create a new post.</p>
        <form action="<?PHP echo URL_ROOT ?>/posts/add" method="post">
            <div class="form-group">
                <label for="title">Title: <sup class="is-invalid">*</sup></label>
                <input type="text" name="title" id="" class="form-control form-control-lg <?PHP echo (!empty($data['titleErr'])) ? 'is-invalid' : '' ?>" value="<?PHP echo $data['title']?>" />
                <span class="invalid-feedback"><?PHP echo $data['titleErr'] ?></span>
            </div>

            <div class="form-group">
                <label for="summary">Summary: <sup class="is-invalid">*</sup></label>
                <input type="text" name="summary" id="" class="form-control form-control-lg <?PHP echo (!empty($data['summaryErr'])) ? 'is-invalid' : '' ?>" value="<?PHP echo $data['summary']?>" />
                <span class="invalid-feedback"><?PHP echo $data['summaryErr'] ?></span>
            </div>

            <div class="form-group">
                <label for="body">Body: <sup class="is-invalid">*</sup></label>
                <textarea name="body" id="" class="form-control form-control-lg <?PHP echo (!empty($data['bodyErr'])) ? 'is-invalid' : '' ?>"><?PHP echo $data['body']?></textarea>
                <span class="invalid-feedback"><?PHP echo $data['bodyErr'] ?></span>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>

<?PHP require APP_ROOT.'/views/inc/footer.php' ?>