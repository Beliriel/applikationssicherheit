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
    <link rel="stylesheet" href="./css/pure/buttons.css" />
    <link rel="stylesheet" href="./css/pure/forms.css" />
    <link rel="stylesheet" href="./css/main.css" />
    <link rel="stylesheet" href="./css/cardform.css" />
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>
    <script src="./js/register_validation.js"></script>

    <title>Micard</title>

</head>
	<body>
		<header>
			<?php
                switch($control)
                {
                    case 2:
                    require_once './resources/def_header.php';
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
        <script src="./js/register_validation.js"></script>
    </body>

</html>
<?php
}
?>
