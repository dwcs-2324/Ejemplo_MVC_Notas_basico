<?php



spl_autoload_register(function ($nombre_clase) {

    $dirs = [CONTROLLERS_FOLDER, MODELS_FOLDER, REPOSITORIES_FOLDER, ENTITY_FOLDER, SERVICIO_FOLDER, INCLUDES_FOLDER, TRAITS_FOLDER];
    
    foreach ($dirs as $dir) {
        $ruta = dirname(__DIR__) . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $nombre_clase . '.php';
     
        
        //Para representar una backslash entre comillas dobles usamos doble backslash
        //https://www.php.net/manual/en/language.types.string.php
        $ruta = str_replace("\\", DIRECTORY_SEPARATOR, $ruta);
        
        //echo "## autoload.php ". $ruta . "<br/>";
        
        if (file_exists($ruta)) {
            require_once $ruta;
            return;
        }
    }
});
