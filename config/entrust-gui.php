<?php
return [
    "layout" => "entrust-gui::app",
    "route-prefix" => "administrador",
    "pagination" => [
        "users" => 5,
        "roles" => 5,
        "permissions" => 5,
    ],
    "middleware" => ['web', 'entrust-gui.admin'],
    "unauthorized-url" => '/login',
    "middleware-role" => 'ROLE_ADMINISTRADOR',
    "confirmable" => false,
    "users" => [
      'fieldSearchable' => [],
    ],
];
