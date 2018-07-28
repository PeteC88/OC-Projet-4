<?php

function autoload($classname)
{
  if (file_exists($file = __DIR__ . '/' . $classname . '.php'))
  {
    require $file;
  }
  elseif(file_exists($file = 'Entity/' . $classname . '.php'))
  {
  	require $file;
  }
  elseif(file_exists($file = 'back_office/Controllers/' . $classname . '.php'))
  {
  	require $file;
  }

  elseif(file_exists($file = 'DbConnect/' . $classname . '.php'))
  {
  	require $file;
  }

  elseif(file_exists($file = 'front_office/Controllers/' . $classname . '.php'))
  {
  	require $file;
  }

  elseif(file_exists($file = 'front_office/Models/' . $classname . '.php'))
  {
  	require $file;
  }
  
  elseif(file_exists($file = 'Entity/' . $classname . '.php'))
  {
  	require $file;
  }
}

spl_autoload_register('autoload');