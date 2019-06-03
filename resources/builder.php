<?php

//build-Funktion setzt die einzelnen Seitenteile zusammen

function build($page, $control = 0){
    $controlfile = $page;

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/normal.css" />
    <link rel="stylesheet" href="./css/mobile.css" />
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>

    <title>Micard</title>

</head>
	<body>
		<header>
			<?php
                switch($control)
                {
                    case 2:
                    require_once './resources/headerguest.php';
                    break;

                    case 0:
                    require_once './resources/header.php';
                    break;

                    default:
                    require_once './resources/header.php';
                }
            ?>
		</header>
		<main>
            <?php

                switch($control)
                {
                    case -1:
                    $folder = './resources/';
                    break;

                    case 0:
                    $folder = './views/';
                    break;


                    default:
                    $folder = './views/';
                    break;
                }
            ?>
            <?php require_once "$folder" . "$controlfile"; ?>
        </main>
        <script src="./scripts/navburger.js"></script>
        <script src="./scripts/regexvars.js"></script>
        <script src="./scripts/settings.js"></script>
    </body>

</html>
<?php
}
?>
