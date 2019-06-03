<?php
	//Session starten
	session_start();

	//Zeit setzen
	if(empty($_SESSION['zeit'])) $_SESSION['zeit'] = date("H:i:s");

	//Builder laden
	include_once './resources/builder.php';
	//include_once './resources/login.php';


	$temp = trim($_SERVER['REQUEST_URI'], '/');
	$url = explode('/', $temp);

	if(!empty($url[2]))
	{

		$url[2] = strtolower($url[2]);

		if(!empty($_SESSION['login']) && $_SESSION['login']) {
			switch($url[2])
			{
				 case 'lauwrensw':
				 build('login_home.php');
				 break;

				case 'home':
				build('login_home.php');
				break;

				case 'index.php':
				build('login_home.php');
				break;

				case 'explanation':
				build('explanation.php');
				break;

				case 'geschichte':
				build('geschichte.php');
				break;

				case 'regeln':
				build('regeln.php');
				break;

				case 'collection':
				build('collection.php');
				break;

				case 'cards':
				build('cards.php');
				break;

				case 'decks':
				build('decks.php');
				break;

				case 'deckbuilder':
				build('deckbuilder.php');
				break;

				case 'filter_deckbuilder':
				build('filter_deckbuilder.php', -1);
				break;

				case 'cardform':
				build('cardform.php');
				break;

				case 'stats':
				build('stats.php');
				break;

				case 'links':
				build('links.php');
				break;

				case 'kontakt':
				build('kontakt.php');
				break;

				case 'login':
				build('login_home.php');
				break;

				default:
				build('login_home.php');
				break;

			}
		}
		else {
			switch($url[2])
			{
				case 'lauwrensw':
				build('home.php', 2);
				break;

				case 'home':
				build('home.php', 2);
				break;

				case 'index.php':
				build('home.php', 2);
				break;

				case 'registration':
				build('registration.php', 2);
				break;

				case 'register':
				build('register.php', -1);
				break;

				case 'register_success':
				build('register_success.php', 2);
				break;

				case 'try_login':
				build('dbbinding.php', -1);
				break;

				case 'error':
				build('error.php', 2);
				break;

				case 'explanation':
				build('explanation.php', 2);
				break;

				case 'geschichte':
				build('geschichte.php', 2);
				break;

				case 'regeln':
				build('regeln.php', 2);
				break;

				case 'links':
				build('links.php', 2);
				break;

				case 'kontakt':
				build('kontakt.php', 2);
				break;

				default:
				build('home.php', 2);
				echo "hahahahahssssdfdsfksjfhdkssss";
				break;
			}

		}
	}
	else
	{ //if something unforeseen happens
		 if( isset($_SESSION['userdata']) )
		 {
			 build('login_home.php');
		 }
		 else {
			 build('home.php', 2);
			 echo "hahahahahssssssssssssssssssss";
		 }
	}
?>
