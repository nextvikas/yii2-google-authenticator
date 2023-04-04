<?php
use yii\helpers\Url;
use nextvikas\authenticator\assets\AuthenticatorAsset;
$assets = AuthenticatorAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authenticator</title>

<?php $this->head(); ?>
  
</head>
<body>
<?php $this->beginBody() ?>

<?php echo $content; ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
