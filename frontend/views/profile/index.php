<?php
/* @var $this yii\web\View */

$this->title="Заказчик";

if (count($myprojects) > 0){
    $project_status_content = ['В ожидании оплаты', 'В ожидании нанимания', 'Незакончено', 'В ожидании подтверждения', 'Закончено', 'Приостановлено'];
    $project_status_colors = ['orange', 'orange', 'blue', 'orange', '-', 'red'];
    ?>
    <div class="title">Мои заказы</div>

    <ul class="collection">
        <?php
            foreach ($myprojects as $project){
                ?>
                <li class="collection-item">
                    <div>
                        <span class="new badge <?= $project_status_colors[$project->status] ?>" data-badge-caption="">
                            <?= $project_status_content[$project->status] ?>
                        </span>
                        <a href="project.html"><b><?= $project->title ?></b></a>
                        <br>
                        <?= $project->description ?>
                        <div class="fs10 grey-text"><?= $project->created_at ?></div>
                    </div>
                </li>
                <?php
            }
        ?>
    </ul>

    <?php
}
?>

//continue...
