<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	 <link rel="shortcut icon" href="/images/icon.png" type="image/png">

</head>

<body>

<?php
define("password", "password.log");
if(!is_file(password)){
$newuser = array(
array('Name'=> "Anton\n",
'SecondName' => "Saenko\n",
'Mail' => "saenkoai@mail.ru\n",
'Comment' => "Normal\n"
));}
else{
$default_str = serialize($newuser);
file_put_contents(password,$default_str,FILE_APPEND);
$parol = file_get_contents("password.log");


$newuser = unserialize($parol);
$count=count($newuser);
 echo"<p> Снаружи " . $count . "</p>";


 if($_SERVER["REQUEST_METHOD"]=="POST"){  
$count=$count+1;
 echo "Внутри".$count . " " ;
    $comment=trim(strip_tags($_POST['comment']));

   $onename=trim(strip_tags($_POST['f']));

     $twoname=trim(strip_tags($_POST['s']));

     $mail=trim(strip_tags($_POST['mail']));


	 $newuser[$count-1]=array('Name' => $onename,'SecondName' => $twoname,'Mail' => $mail,'Comment' => $comment);
 
	 $count = count($newuser);
	
	 $users = serialize($newuser);


 file_put_contents(password,$users,FILE_APPEND);
$count = $count + 1; 
}

}
	?>
	

	<div class='btn btn-lg btn-primary'>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<h1><p>Введите форму:

<div class="input-group">

<p>Имя:<input  name="f" required class="form-control" aria-describedby="basic-addon1"></input></p>

<p>Фамилия:<input  name="s" required class="form-control" aria-describedby="basic-addon1"></input></p>

<p>Mail:<input  name="mail" required class="form-control" value="@mail.ru" aria-describedby="basic-addon1"></input></p>

   <textarea name="comment" required class="form-control" aria-describedby="basic-addon1" cols="55" rows="3"></textarea></p>

   </div>

  <p><input class='btn btn-lg btn-success' type="submit" value="Отправить">

   <input type="reset" class='btn btn-lg btn-danger' value="Очистить"></p>

   </h1>
 
   <a href="savepass.php">Посмотреть</a>

</body>

</html>