<?php

/* @var $this yii\web\View */

$this->title = 'Добро пожаловать!';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать!</h1>

        <p class="lead">
            Вы можете сгенерировать себе ссылку, а после перейти по ней и попадате снова сюда :)
            <br>
            Хорошего вам дня!
        </p>

        <p>
            <button class="btn btn-lg btn-success" id="main_button">
                Получить ссылку
            </button>
        </p>
        <div class="result">

        </div>
    </div>

</div>
<script>
    var full_url = "<?=Yii::$app->request->url?>";
</script>