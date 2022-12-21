<?php
function validateUser($user)
{
    $errors = array();
    if (empty($user['username'])) {
        array_push($errors, 'Username is Required');
    }

    if (empty($user['email'])) {
        array_push($errors, 'Email is Required');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password is Required');
    }

    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Password Do Not Match');
    }
    //$existingUser = selectOne('users', ['email' => $user['email']]);
    //if ($existingUser) {
      //  array_push($errors, 'Email Already Exists');
   // }

   $existingUser = selectOne('users', ['email' => $user['email']]);
   if ($existingUser) {
       if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email Already Exists');
       }

       if (isset($user['create-admin'])) {
            array_push($errors, 'Email Already Exists');
       }
       
       }
   
   
    //$existingUser = selectOne('users', ['username' => $user['username']]);
   // if ($existingUser) {
     //   array_push($errors, 'Username Already Exists');
  //  }

    return $errors;
}



function ValidateLogin($user)
{
    $errors = array();
    if (empty($user['username'])) {
        array_push($errors, 'Username is Required');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password is Required');
    }

    return $errors;
}