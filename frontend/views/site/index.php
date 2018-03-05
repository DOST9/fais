<?php
use yii\web\JsExpression;
use yii\helpers\Url;
use edofre\fullcalendar\Fullcalendar;
/* @var $this yii\web\View */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-index">
    <?php if(!Yii::$app->user->isGuest){ ?>
    <div class="body-content">
        <div class="row-fluid">
            <div class="panel panel-default col-lg-4" style="min-height: 450px">
                <div class="panel-heading"><i class="fa fa-address-book-o"></i> Transactions</div>
                <div class="panel-body">
                    <?= Fullcalendar::widget([
        'options'       => [
            'id'       => 'calendar',
            'language' => 'us-en',
        ],
        'clientOptions' => [
            'weekNumbers' => true,
            'selectable'  => true,
            'defaultView' => 'agendaWeek',
            'eventResize' => new JsExpression("
                function(event, delta, revertFunc, jsEvent, ui, view) {
                    console.log(event);
                }
            "),

        ],
        'events'        => Url::to(['calendar/events', 'id' => 1]),
    ]);
?>
                </div>
            </div>
            <div class="panel panel-default col-lg-4" style="min-height: 450px">
                <div class="panel-heading"><i class="fa fa-archive"></i> Inventory</div>
                <div class="panel-body">

                </div>
            </div>
            <div class="panel panel-default col-lg-4" style="min-height: 450px">
                <div class="panel-heading"><i class="fa fa-money"></i> Accounting</div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
    <?php }else{ ?>
    <div class="body-content">
        <div class="row-fluid">
            <div class="jumbotron-carousel">
                <h3>Enhaced ULIMS version 2.0</h3>
            </div>
        </div>
    </div>
    <?php } ?>
</div>