<?php $title = 'Mon blog'; ?>

<!--ob_start is called buffering or temporisation in french-->
<?php ob_start(); ?>
<h1 style="text-align: center; font-size: 3em;">Liste des chapitres</h1>
<?php
foreach ($post as $data) 
{
?>
<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
              <h2 class="post-title">
                <?= ($data['title']) ?>
                </h2>
              <h3 class="post-subtitle">
                <?= substr($data['content'], 0, 200); ?>...
              </h3> 
            </a>
            <p class="post-meta"> Publié le <?= $data['creation_date_fr'] ?>
            <br />
            </p>
        <br />
          </div>
        </div>
    </div>
</div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require(FRONT_OFFICE_VIEW_PATH . 'template.php'); ?>