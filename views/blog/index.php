<br>

<div class="card bg-dark text-white">
  <img class="card-img" src="/public/img/milosbanner.png" alt="Card image" width="400" height="280">
  <div class="card-img-overlay">
  </div>
</div>

<br>

<?php foreach ($params['posts'] as $post) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <h2><?= $post->title ?></h2>
            <div>
                <?php foreach ($post->getTags() as $tag) : ?>
                    <span class="badge-color: #78A8AA"><a href="/tags/<?= $tag->id ?>" class="text-#78A8AA"><?= $tag->name ?></a></span>
                <?php endforeach ?>
            </div>
            <small class="text-info">Publié le <?= $post->getCreatedAt() ?></small>
            <p><?= $post->getExcerpt() ?></p>
            <?= $post->getButton() ?>
        </div>
    </div>
<?php endforeach ?>




