<?PHP require APP_ROOT.'/views/inc/header.php' ?>

    <a href="<?PHP echo URL_ROOT ?>/posts/index" class="btn btn-secondary"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h1><?PHP echo $data['post']->title ?></h1>
        <div class="bg-secondary text-white p-2 mb-3">
            Written by <?PHP echo $data['user']->name ?> on <?PHP echo $data['post']->created_at ?></div>
    </div>

    <p><?PHP echo $data['post']->body ?></p>

    <?PHP if ($data['post']->user_id == $_SESSION['userId']) : ?>
        <hr>
        <a href="<?PHP echo URL_ROOT ?>/posts/edit/<?PHP echo $data['post']->id ?>" class="btn btn-dark"><i class="fa fa-edit"></i>   Edit Post</a>

        <form method="post" action="<?PHP echo URL_ROOT ?>/posts/delete/<?PHP echo $data['post']->id ?>" class="pull-right">
            <input type="submit" value="Delete Post" class="btn btn-danger">
        </form>
    <?PHP endif;?>

<?PHP require APP_ROOT.'/views/inc/footer.php' ?>