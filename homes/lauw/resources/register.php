<?php
    function validate_POST_registration(){
        $isvalid = true;

        $firstname_match = preg_match('/^[A-Z]+[a-zA-ZäöüÄÖÜ]{2,49}$/', $_POST['firstname']) == 1;
        $surname_match = preg_match('/^[A-Z]+[a-zA-ZäöüÄÖÜ]{2,49}$/', $_POST['surname']) == 1;
        $username_match = preg_match('/^[a-zA-Z0-9_äöüÄÖÜ]{2,50}$/', $_POST['username']) == 1;
        $email_match = preg_match('/^(\w+|\w+[\.\-]\w+)@(\w+|\w+[\.\-]\w+)\.\w{2,3}$/', $_POST['email_registration']) == 1;
        $password_match = preg_match('/^.*(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/', $_POST['password_registration']) == 1;
        $password_length_match = preg_match('/^.{6,200}$/', $_POST['password_registration']) == 1;
        $password_confirmation_match = preg_match('/'.$_POST['password_registration'].'/','/'.$_POST['password_conformation_registration'].'/') == 1;


        if( !$firstname_match || !$surname_match || !$username_match || !$email_match || !$password_match || !$password_length_match || !$password_confirmation_match )
        {
            $isvalid = false;
        }

        return $isvalid;
    }

    //secure salt generation funktioniert nicht
    function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    $registration_is_valid = validate_POST_registration();
    if( $registration_is_valid )
    {
        echo 'debug1';
        //do something
        $reg_db = new mysqli("127.0.0.1", "root", "", "kerstingk");
        $sql1 = $reg_db->prepare("SELECT * FROM person WHERE PersonName=?");
        $sql1->bind_param('s', $_POST['username']);
        $sql1->execute();

        $reg_result = $sql1->get_result();
        $reg_row = $reg_result->fetch_assoc();


        echo 'debug2';
        var_dump($reg_row);
        if($reg_row == NULL){

            var_dump($_POST['username']);
            var_dump($_POST['firstname']);
            var_dump($_POST['surname']);
            var_dump($_POST['email_registration']);

            //insert password and salt
            $sql3 = $reg_db->prepare("INSERT INTO passwoord ( Hash_Password, Assault ) VALUES (?,?)");
            echo 'debug3.4';
            $reg_salt = generateRandomString(20);
            echo 'debug3.5';
            var_dump($reg_salt);
            $pw_salted = $_POST['password_registration'].$reg_salt;
            var_dump($pw_salted);
            $pw_hashed = sha1($pw_salted);
            var_dump($pw_hashed);

            $sql3->bind_param('ss', $pw_hashed , $reg_salt);
            $sql3->execute();
            echo 'debug4';

            $sql4 = $reg_db->prepare("SELECT ID_Passwoord FROM passwoord WHERE Hash_Password=? AND Assault=?");
            $sql4->bind_param('ss', $pw_hashed, $reg_salt);
            $sql4->execute();
            $pw_result = $sql4->get_result();
            $pw_row = $pw_result->fetch_array();
            var_dump($pw_row[0]);
            $pw_id = $pw_row[0];

            //insert user
            $sql2 = $reg_db->prepare("INSERT INTO `person`(`PersonName`, `FirstName`, `LastName`, `Email`, `Passwoord_ID`) VALUES (?,?,?,?,?)");
            $sql2->bind_param('ssssi', $_POST['username'], $_POST['firstname'], $_POST['surname'], $_POST['email_registration'], $pw_id);
            $sql2->execute();
            echo 'debug3';

            $sql1->close();
            $sql2->close();
            $sql3->close();
            $reg_db->close();

            header('Location:register_success');
        }
        else{
            $sql1->close();
            $reg_db->close();
            header('Location:error');
        }

    }
    else {
        header('Location:error');
    }

?>
