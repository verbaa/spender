<?php

return [
    'reg/new'   => ['ControllerRegistrant', 'actionNew'],
    'reg/add'   => ['ControllerRegistrant', 'actionReg'],
    'reg/link'   => ['ControllerRegistrant', 'actionCheckLink'],
    'avtorization/login' => ['ControllerUserAvtoriz', 'actionLogin'],
    'product/add' => ['ControllerAddProduct', 'addProduct'],
    'product/del' => ['ControllerDellRegExp', 'delReg'],
    'product/edit' => ['ControllerEditRegExp', 'editReg'],
    'product/load' => ['ControllerFirstLoad', 'loaded'],
    'user/photo' => ['ControllerUserPhoto', 'loadPhoto'],
    'user/exit' => ['ControllerUserExit', 'sessionDestroy'],
    'pass/pages' => ['ControllerPass', 'passPage'],
    'pass/restore' => ['ControllerPass', 'res'],
    'pass/chenge' => ['ControllerPass', 'chenge']
];

