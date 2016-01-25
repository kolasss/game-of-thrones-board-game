<? include 'database.php';

// Страница авторизации

# Функция для генерации случайной строки

function generateCode($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

    $code = "";

    $clen = strlen($chars) - 1;  

    while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];  

    }

    return $code;

}



if(isset($_POST['password']))

{

    # Вытаскиваем из БД запись, у которой логин равняеться введенному

    $query = mysql_query("SELECT * FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."' LIMIT 1");

    $data = mysql_fetch_assoc($query);

    

    # Соавниваем пароли

    if($data['user_password'] === md5(md5($_POST['password'])))

    {

        # Генерируем случайное число и шифруем его

        $hash = md5(generateCode(10));
    

        # Записываем в БД новый хеш авторизации и IP

        mysql_query("UPDATE users SET user_hash='".$hash."' WHERE user_id='".$data['user_id']."'");

        

        # Ставим куки

        /*setcookie("id", $data['user_id'], time()+60*60*24*30);

        setcookie("hash", $hash, time()+60*60*24*30);*/

        

        # Переадресовываем браузер на страницу проверки нашего скрипта

        /*header("Location: check.php"); exit();*/
		
		$row['id'] = $data['user_id'];
		$row['hash'] = $hash;
		$row['lastgame'] = $data['lastgame'];
		echo json_encode ($row);

    }

    else

    {

        echo json_encode ("error");

    }

} else {echo "fail";}

?>