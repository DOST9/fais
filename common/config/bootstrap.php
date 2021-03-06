<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');


$whitelist = array(
    '127.0.0.1',
    '::1',
    'localhost'
);
if (isset($_SERVER['SERVER_NAME'])) {
    if (!in_array($_SERVER['SERVER_NAME'], $whitelist)) {
        $Backend_URI = 'http://' . $_SERVER['SERVER_NAME'];
        $BaseURI = $Backend_URI.'/';
        $Backend_URI = $Backend_URI . "/uploads/user/photo/";
        $FrontendBaseURI = 'http://' . $_SERVER['SERVER_NAME'] . '/';
    } else {
        $Backend_URI = 'http://localhost/fais/backend/web/uploads/user/photo/';
        $BaseURI = "http://localhost/fais/backend/web/";
        $FrontendBaseURI = "http://localhost/fais/frontend/web/";
    }
    $GLOBALS['upload_url'] = $Backend_URI;
    $GLOBALS['base_uri'] = $BaseURI;
    $GLOBALS['frontend_base_uri'] = $FrontendBaseURI;
}

