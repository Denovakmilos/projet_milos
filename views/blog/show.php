<h1><?= $params['post']->title ?></h1>
<div>
    <?php foreach ($params['post']->getTags() as $tag) : ?>
        <span class="badge badge-info"><?= $tag->name ?></span>
    <?php endforeach ?>
</div>
<p><?= $params['post']->content ?></p>
<a href="/posts" class="btn btn-secondary" style="background-color: #78A8AA;">Retourner en arrière</a> 