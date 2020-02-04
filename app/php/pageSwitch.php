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

        case 4:
            $pagina = 'agenda';
            $title = 'Agenda';
            break;

        case 5:
            $pagina = 'dag';
            $title = 'Dagoverzicht';
            break;

        case 6:
            $pagina = 'taak';
            $title = 'Taak';
            break;

        case 7:
            $pagina = 'paniek';
            $title = 'Paniek';
            break;

        default:
            $pagina = 'login';
            $title = 'Login';
            break;
    }