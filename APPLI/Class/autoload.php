<?php
spl_autoload_register(function ($nom_classe) {
   require_once $nom_classe . '.class.php';
});

?>