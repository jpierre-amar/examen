<?php


function loadController( string $ctrl)
{
    if(file_exists('controllers/'. $ctrl .'.php'))
    {

        require_once 'controllers/'. $ctrl . '.php';
    }
}

spl_autoload_register('loadController');


function loadModel(string $model)
{
    if(file_exists('models/'.$model.'.php'))
    {
        require_once 'models/'.$model.'.php';
    }
}

spl_autoload_register('loadModel');

// spl_autoload_register('loadClass');


