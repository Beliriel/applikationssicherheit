<?php
	//Session starten
	session_start();

	//Zeit setzen
	if(empty($_SESSION['zeit'])) $_SESSION['zeit'] = date("H:i:s");

	//Builder laden
	include_once './resources/builder.php';
	include_once './resources/readusers.php';
	include_once './resources/readblogs.php';
	include_once './resources/resample.php';

	//connection-Daten für Datenbank
	if( !isset($GLOBALS['db']) ){
		$GLOBALS['db']['host'] = "localhost";
		$GLOBALS['db']['username'] = "root";
		$GLOBALS['db']['password'] = "";
		$GLOBALS['db']['dbname'] = "neurodb";
	}

	//lies die Userliste aus
	if( !isset($GLOBALS['userlist']) ){
		read_userlist();
	}



	$temp = trim($_SERVER['REQUEST_URI'], '/');
	$url = explode('/', $temp);

  	$url_pos = 0; //ändern um die Ressourcen von einem anderen Ort holen

	if(!empty($url[$url_pos]))
	{

		$url[$url_pos] = strtolower($url[$url_pos]);

		if(!empty($_SESSION['login']) && $_SESSION['login']) {
			$get_explode = explode('?', $url[$url_pos]);
			switch($get_explode[0])
			{
				case 'home':
         			build('memberhome.php');
         			break;

				case 'addblog':
				build('addblog.php', -1);
				break;

				case 'fileupload':
				build('fileupload.php', -1);
				break;

				case 'changeblog':
				build('changeblog.php', -1);
				break;

				case 'commentblog':
				build('commentblog.php', -1);
				break;

				case 'error':
				build('error_generic.php', 2);
				break;

				case 'nuke':
				build('nuke.php', -1);
				break;

				case 'blog':
				build('blog.php');
				break;

				case 'bild':
				$_POST['imid'] = $get_explode[1];
				$_POST['imsize'] = $get_explode[2];
				require './resources/bild.php';
				break;

				case 'member_eins':
				build('member_eins.php');
				break;

				case 'member_zwei':
				build('member_zwei.php');
				break;

				case 'logout':
				build('logout.php', -1);
				break;

				default:
				build('memberhome.php');
				break;

			}
		}
		else {
			switch($url[$url_pos])
			{

				case 'home':
				build('guesthome.php', 2);
				break;

				case 'index.php':
				build('guesthome.php', 2);
				break;

        			case 'index':
				build('guesthome.php', 2);
				break;

				case 'blog':
				build('blog.php', 2);
				break;

				case 'login':
				build('login.php', -1);
				break;

				case 'registration':
				build('registration.php', -1);
				break;

				case 'reg_error':
				build('reg_error.php', 2);
				break;

				default:
				build('guesthome.php', 2);
				break;
			}

		}
	}
	else
	{ //if something unforeseen happens
		 if( isset($_SESSION['userdata']) )
		 {
			 build('memberhome.php');
		 }
		 else {
			 build('guesthome.php', 2);
		 }
	}
?>
