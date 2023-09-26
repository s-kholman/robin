<?php
if (!empty($_POST['name'])){
    $name = $_POST['name'];
} else
    $name = 'не введено';
echo <<< END
<html>
<head>
<title>Form test</title>
</head>
<body>
Вас зовут: $name<br>
<form method="post" action="formtest.php">
Как вас зовут?
<input type="text" name="name">
<input type="submit">
</form>
</body>
</html>
END;
