1. Для запуска проекта создайте в корне файд login.php со своими данными для подключения к MySQL
2. $host = '127.0.0.1';
   $data = 'publications';
   $root = "root";
   $pass = "";
   $chrs = 'utf8mb4';
   $attr = "mysql:host=$host;dbname=$data;charset=$chrs";
   $opts =
   [
   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
   PDO::ATTR_EMULATE_PREPARES => false,
   ];
