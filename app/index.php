<?php
  $foo = 'bar';
  echo $foo;

  if($foo == 'bar') {
    echo 'it is equal';
  }

  xdebug_break();

  if($foo == 'bar') {
    echo 'it is not equal';
  }

  // phpinfo();
