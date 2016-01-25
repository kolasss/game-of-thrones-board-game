<? include 'database.php';

if(isset($_POST['password']))

{

    $err = array();



    # проверям логин

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)

    {

        $err[] = "Login must be at least 3 characters long and no more than 30.";

    }
	
	if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))

    {

        $err[] = "Login can only consist of English letters and digits.";

    }

    # проверяем, не сущестует ли пользователя с таким именем

    $query = mysql_query("SELECT COUNT(user_id) FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."'");

    if (gettype($query)!="boolean")
	{
		if(mysql_result($query, 0) > 0)
	
		{
	
			$err[] = "This username is already exist in the database.";
	
		}
	}

    

    # Если нет ошибок, то добавляем в БД нового пользователя

    if(count($err) == 0)

    {

        

        $login = $_POST['login'];

        

        # Убераем лишние пробелы и делаем двойное шифрование

        $password = md5(md5(trim($_POST['password'])));

        

        mysql_query("INSERT INTO users SET user_login='".$login."', user_password='".$password."'");

        echo json_encode("ok");

    }

    else

    {

        echo json_encode($err);

    }

}

?>