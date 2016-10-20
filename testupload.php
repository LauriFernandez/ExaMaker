<html>
<head>
<link rel="stylesheet" type="text/css" href="testupload.css">  
  <meta charset="utf-8">
</head>
<body>
    <form enctype="multipart/form-data" action="testupload2.php" method="post">
      <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
      Charger l'examen : <input  type="file" name="fichier" value="charger" />
      <input  type="submit"  name="charger" value="charger" />
    </form>
</body>
</html>
