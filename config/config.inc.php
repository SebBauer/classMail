<?php

// Sposób 1 - wykorzystanie metody magicznej autoload

// function __autoload($className) {
//     require '../../../../../xampp/htdocs/nauka_php/classMail/class/'.$className.'php'; // Przed klas nie można dać kropek, poniważ klasy będą wywoływane z index.php
// }

// Sposób 2

function loadClass($className) {
    $classFile = 'class/'.$className.'.php';
    require $classFile;
}

spl_autoload_register('loadClass');

// Sposób 3

// spl_autoload_register(function($className){
//     $classFile = 'class/'.$className.'.php';

//     if(file_exists($classFile)){
//         require $classFile;
//     }

// });

?>