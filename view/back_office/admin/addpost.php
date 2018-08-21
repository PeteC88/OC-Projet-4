<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Ajoute post</title>
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
<br />
<br />

<h1> Ajouter un nouveau post :</h1>

<br />
<form name="formulaire" id="formulaire" action="index.php?action=adminAddPost" method="post">

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Titre :</span>
      </div>
      <input type="text" id="titre" name="titre" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required="titre">
    </div>
    <br />
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Texte : </span>
      </div>
      <textarea id="texte" name="texte" rows="25" class="form-control" aria-label="Texte : "></textarea>
    </div>  
    <br />
    <div>
        <input class="btn" type="submit" value="Publier" />
    </div>
 </form>


	</body>
<?php $content = ob_get_clean(); ?>
</html>

<?php require(ADMIN_VIEW_PATH . 'templateAddEdit.php'); ?>
