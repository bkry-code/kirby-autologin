<?php

c::set('routes', array(
  array(
    'pattern' => 'autologin',
    'action'  => function() {
      $username = 'YOURUSERNAME';
      $password = 'YOURPASSWORD';
      
      // Prevent access on the production system
      if(url::host() !== 'localhost') return false;
      
      $user = site()->user($username);
      if($user and $user->login($password)) {
        go('panel'); // or use go(); to redirect to the frontpage
      } else {
        echo 'invalid username or password';
        return false;
      }

    }
  )
));