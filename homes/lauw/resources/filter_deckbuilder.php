<?php
    function build_WHERE_string(&$build, &$from)
    {
        $build = $from[0];
        for($i=1; $i<sizeof($from); $i++)
        {
            if($i!=1)
            {
                $build = $build." AND ";
            }
            $build = $build.$from[$i];
        }
    }




    $reg_db = new mysqli("127.0.0.1", "root", "", "kerstingk");

    echo "<p>well lets test this</p>";
    $wh = array();
    $where_query = '';

    $wh0 = ' WHERE ';
    $wh1 = 'tp.Type like "%'.$_POST['type1'].'%"';
    $wh2 = 'tp.Type like "%'.$_POST['type2'].'%"';

    if($_POST['white']=='' && $_POST['blue']=='' && $_POST['black']=='' && $_POST['red']=='' && $_POST['green']=='')
    {
        $wh3 = 'cl.Colour="Colorless"';
    }
    else
    {
        $wh3 = '(cl.Colour="'.$_POST['white'].'" OR cl.Colour="'.$_POST['blue'].'" OR cl.Colour="'.$_POST['black'].'" OR cl.Colour="'.$_POST['red'].'" OR cl.Colour="'.$_POST['green'].'")';
    }

    $wh4 = 'cd.CardName like "%'.$_POST['cardname'].'%"';
    $wh5 = 'stp.Subtype like "%'.$_POST['subtype1'].'%"';
    $wh6 = 'stp.Subtype like "%'.$_POST['subtype2'].'%"';

    array_push($wh, $wh0, $wh1, $wh3, $wh4, $wh5);
    build_WHERE_string($where_query, $wh);
    var_dump($where_query);
    //$wh2 und $wh6 werden separat in einer if Schleife geprüft

    //synthesize SQL-Query
    //base data
    echo "something is happening";
    $sl1 = 'SELECT * FROM card AS cd ';
    $sl2 = 'LEFT JOIN card_type AS cd_tp ON cd_tp.Card_ID = cd.ID_Card ';
    $sl3 = 'LEFT JOIN type AS tp ON  tp.ID_Type = cd_tp.Type_ID ';
    $sl4 = 'LEFT JOIN card_subtype AS cd_stp ON cd_stp.Card_ID = cd.ID_Card ';
    $sl5 = 'LEFT JOIN subtype AS stp ON stp.ID_Subtype = cd_stp.Subtype_ID ';
    $sl6 = 'LEFT JOIN card_colour AS cd_cl ON cd_cl.Card_ID = cd.ID_Card ';
    $sl7 = 'LEFT JOIN colour AS cl ON cl.ID_Colour = cd_cl.Colour_ID ';
    $sl8 = 'LEFT JOIN card_ability AS cd_ab ON cd_ab.Card_ID = cd.ID_Card ';
    $sl9 = 'LEFT JOIN ability AS ab ON ab.ID_Ability = cd_ab.Ability_ID ';
    $sl10 = 'LEFT JOIN artist AS art ON art.ID_Artist = cd.Artist_ID ';
    $sl11 = 'LEFT JOIN rarity as rare ON rare.ID_Rarity = cd.Rarity_ID ';
    $sl12 = 'LEFT JOIN expansion AS ex ON ex.ID_Expansion = cd.Expansion_ID';

    $base_query = $sl1.$sl2.$sl3.$sl4.$sl5.$sl6.$sl7.$sl8.$sl9.$sl10.$sl11.$sl12;

    $complete_query = $base_query.$where_query;
    echo "<br/><br/>$complete_query<br/><br/>";
    $sql15 = $reg_db->prepare($complete_query);
    $sql15->execute();
    $just = $sql15->get_result();

    $resall = $just->fetch_assoc();
    var_dump($_POST);
    echo '<br/>';
    echo '<br/>';
    while($resall != null){
        var_dump($resall);
        echo '<br/>';
        echo '<br/>';
        $resall = $just->fetch_assoc();
    }



    //var_dump($rowType1);
    //var_dump($rowColour);



?>
