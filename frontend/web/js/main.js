/* 
 * Project Name: eulims * 
 * Copyright(C)2018 Department of Science & Technology -IX * 
 * Developer: Eng'r Nolan F. Sunico  * 
 * 01 31, 18 , 1:42:50 PM * 
 * Module: main * 
 */

yii.allowAction = function ($e) {
    var message = $e.data('confirm');
    return message === undefined || yii.confirm(message, $e);
};
yii.confirm = function (message, $e) {
    bootbox.confirm({
        title: 'Confirm',
        message: message,//'Are you sure?',
        callback: function (result) {
            if (result) {
                yii.handleAction($e);
            }
        }
    });
    // confirm will always return false on the first call
    // to cancel click handler
    return false;
}
