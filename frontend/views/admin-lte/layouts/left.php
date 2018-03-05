<?php
use common\models\system\User;

$Request_URI=$_SERVER['REQUEST_URI'];
//$_SERVER['SERVER_NAME']
if($Request_URI=='/'){//alias ex: http://admin.eulims.local
    $Backend_URI=Yii::$app->urlManagerBackend->createUrl('/');
    $Backend_URI=$Backend_URI."/uploads/user/photo/";
}else{//http://localhost/eulims/backend/web
    $Backend_URI='//localhost/eulims/backend/web/uploads/user/photo/';
}
Yii::$app->params['uploadUrl']=$Backend_URI;
if(Yii::$app->user->isGuest){
    $CurrentUserName="Visitor";
    $CurrentUserAvatar=Yii::$app->params['uploadUrl'] . 'no-image.png';
    $CurrentUserDesignation='Guest';
    $UsernameDesignation=$CurrentUserName;
}else{
    $CurrentUser= User::findOne(['user_id'=> Yii::$app->user->identity->user_id]);
    $CurrentUserName=$CurrentUser->profile ? $CurrentUser->profile->fullname : $CurrentUser->username;
    $CurrentUserAvatar=$CurrentUser->profile ? Yii::$app->params['uploadUrl'].$CurrentUser->profile->getImageUrl() : Yii::$app->params['uploadUrl'] . 'no-image.png';
    $CurrentUserDesignation=$CurrentUser->profile ? $CurrentUser->profile->designation : '';
    if($CurrentUserDesignation==''){
       $UsernameDesignation=$CurrentUserName;
    }else{
       $UsernameDesignation=$CurrentUserName.'<br>'.$CurrentUserDesignation;
    }
}
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $CurrentUserAvatar ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= $UsernameDesignation ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Line-Item Budget', 'icon' => 'cog', 'url' => ['/settings'],'visibles'=> Yii::$app->user->can('access-settings')],
                    ['label' => 'PPMP', 'icon' => 'cog', 'url' => ['/settings'],'visibles'=> Yii::$app->user->can('access-settings')],
                    ['label' => 'APP', 'icon' => 'cog', 'url' => ['/settings'],'visibles'=> Yii::$app->user->can('access-settings')],
                    [
                        'label' => 'System tools',
                        'icon' => 'cogs',
                        'url' => '/#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],'visibles'=> Yii::$app->user->can('access-gii')],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],'visibles'=> Yii::$app->user->can('access-debug')],
                            ['label' => 'Package List', 'icon' => 'cog', 'url' => ['/package'],'visibles'=> Yii::$app->user->can('access-package-list')],
                            ['label' => 'Package Manager', 'icon' => 'cog', 'url' => ['/package/manager'],'visibles'=> Yii::$app->user->can('access-package')],
                            [
                                'label' => 'RBAC',
                                'icon' => 'fa fa-user-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Users', 'icon' => 'fa fa-user-o', 'url' => ['/admin/user'],'visibles'=> Yii::$app->user->can('access-user')],
                                    ['label' => 'Assignment', 'icon' => 'dashboard', 'url' => ['/admin'],'visibles'=> Yii::$app->user->can('access-assignment')],
                                    ['label' => 'Route', 'icon' => 'line-chart', 'url' => ['/admin/route'],'visibles'=> Yii::$app->user->can('access-route')],
                                    ['label' => 'Roles', 'icon' => 'glide-g', 'url' => ['/admin/role'],'visibles'=> Yii::$app->user->can('access-role')],
                                    ['label' => 'Permissions', 'icon' => 'resistance', 'url' => ['/admin/permission'],'visibles'=> Yii::$app->user->can('access-permission')],
                                    ['label' => 'Menus', 'icon' => 'scribd', 'url' => ['/admin/menu'],'visibles'=> Yii::$app->user->can('access-menu')],
                                    ['label' => 'Rules', 'icon' => 'reorder', 'url' => ['/admin/rule'],'visibles'=> Yii::$app->user->can('access-rule')],
                                ],
                                'visible'=> Yii::$app->user->can('access-rbac')
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>
    </section>

</aside>
