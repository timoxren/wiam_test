<?php

namespace app\controllers\Requests;

class Request
{
    function __constructor()
    {
        $email = 'test@example.com';
        $validator = new \yii\validators\EmailValidator();

        if ($validator->validate($email, $error)) {
            echo 'Email is valid.';
        } else {
            echo $error;
        }

        if ($model->validate()) {
            // all inputs are valid
        } else {
            // validation failed: $errors is an array containing error messages
            $errors = $model->errors;
        }
    }
}