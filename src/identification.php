<?php

/*	Antoine Basset antoine.basset@epitech.eu
**
**	Identification script
**
*/

	if (isset($_POST['mail'])&& isset($_POST['passwd']))
	{
		$login = htmlentities(mysql_real_escape_string($_POST['mail']));
		$pass = htmlentities(mysql_real_escape_string($_POST['passwd']));
		
		$res = $db->prepare('SELECT id, login, mail, admin FROM user WHERE mail = :mail AND passwd = SHA1(:passwd)');
		$res->execute(array('mail' => $login, 'passwd' => $pass));
		$ret = $res->fetchAll(PDO::FETCH_ASSOC);

		if ($ret == NULL)
		{
			header("Location: index.php?page=login.php&error=error");
			exit(0);
		}
		if (isset($_POST['remember']))
		{
			foreach ($ret[0] as $key =>$val)
				$_SESSION[SESSION_PREFIX.$key] = $val;
		}
		header("Location: index.php");
	}
	else 
		header("Location: index.php?page=login.php&error=error");
?>