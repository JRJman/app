<?php
    switch($page){
        case 1:
            $pagina = 'login';
            $title = 'Login';
            break;

        case 2:
            $pagina = 'wachtwoord_vergeten';
            $title = 'Wachtwoord Vergeten';
            break;

        case 3:
            $pagina = 'kiezen';
            $title = 'Pagienten Kiezen';
            break;

        default:
            $pagina = 'login';
            $title = 'Login';
            break;
    }