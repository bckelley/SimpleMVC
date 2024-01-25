<?php require APP_ROOT . '/views/inc/header.php'; ?>
<?PHP echo message('post_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?PHP echo URL_ROOT; ?>/posts/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Add Post
        </a>
    </div>
</div>
<?PHP foreach ($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
        <h4 class="card-title"><?PHP echo $post->title ?></h4>
        <div class="bg-light p-2 mb-3">
            written by: <?PHP echo $post->name ?> on <?PHP echo $post->postCreated ?>
        </div>
        <p class="card-text"><?PHP echo $post->summary ?></p>
        <a href="<?PHP echo URL_ROOT ?>/posts/show/<?PHP echo $post->postId ?>" class="btn btn-dark">Read More</a>
    </div>
<?PHP endforeach; ?>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
