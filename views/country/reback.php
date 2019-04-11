<?php
/**
 * User: xifei
 * Date: 2019/3/30
 * Time: 下午11:18
 */
use yii\helpers\Html;
use yii\helpers\Url;



?>


<p>尊敬的:<b><?php echo $username; ?></b></p>
<p>您找回密码的链接如下：</p>
<?php $url=Yii::$app->urlManager->createAbsoluteUrl(['site/reback','time'=> $time,'username'=>$username,'token'=>$token]); ?>
<p><a href="<?php echo $url; ?>"><?php echo $url; ?></a></p>
<p>该链接5分钟内有效，请勿传递给别人</p>
<p>该邮件为系统自动发送，请勿回复！！</p>