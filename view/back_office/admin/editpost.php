<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edit Post</title>
    <link href="../public/css/stylesheet.css" rel="stylesheet" />
   <script src="public/tinymce/tinymce.js" language="javascript" type="text/javascript">
    </script>
    <script language="javascript" type="text/javascript">
        tinyMCE.init({
        mode : 'textareas',
        plugins : ['image', 'media', 'textcolor'],
        toolbar : ['print preview media | image | forecolor backcolor emoticons | codesample help fontselect fontsizeselect'],
        

  media_scripts: [
   {filter: 'http://media1.tinymce.com'},
   {filter: 'http://media2.tinymce.com', width: 100, height: 200} ],

        images_upload_url : 'uploadImages.php',
        automatic_uploads : false,

        images_upload_handler : function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'uploadImages.php');

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.file_path != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.file_path);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
        });
    </script>
</head>

<?php ob_start(); ?>
<body>
<h1> Modifier un post :</h1>

<br />

<form name="formulaire" id="formulaire" action="index.php?action=adminEditPost" method="post">
<input type="hidden" size='3' name="id" value="<?= $post['id'] ?>" />
<label for="titre">Titre :</label><input name="title" value="<?= htmlspecialchars($post['title'])?>" />
<br />
<label for="titre">Texte :</label><textarea rows="15" cols="100" name="content"><?= $post['content']  ?></textarea><br />
<input type="submit" name="modifier" value="Modifier !">
</form>

<!--<?php /*require('../frontend/template.php')*/;?>-->

</body>
    
<?php $content = ob_get_clean(); ?>
</html>

<?php require(ADMIN_VIEW_PATH . 'templateAddEdit.php'); ?>
