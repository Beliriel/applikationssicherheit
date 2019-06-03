<?php

    $db = new mysqli("127.0.0.1", "root", "", "kerstingk");

    //fetch user data
    $sql_statement = $db->prepare("SELECT * FROM person WHERE PersonName=?");
    $sql_statement->bind_param('s', $_POST['username_login']);
    $sql_statement->execute();
    $result = $sql_statement->get_result();
    $row = $result->fetch_assoc();

    //fetch password data
    $sql_statement2 = $db->prepare("SELECT * FROM passwoord WHERE ID_Passwoord=?");
    $sql_statement2->bind_param('i', $row['Passwoord_ID']);
    $sql_statement2->execute();
    $pw_res = $sql_statement2->get_result();
    $pw_row = $pw_res->fetch_assoc();

    //check password
    $password_is_correct = ( sha1($_POST['password_login'].$pw_row['Assault']) === $pw_row['Hash_Password'] );

    if($row != NULL && $password_is_correct)
    {
        $_SESSION['userdata'] = $row;
        $_SESSION['username'] = $row['PersonName'];
        $_SESSION['login'] = true;

        header('Location:login');
    }
    else {
        header('Location:error');
    }

?>
