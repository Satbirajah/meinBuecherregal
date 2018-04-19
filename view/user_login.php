
<section class="intro" >
    <div class="introBox">
        <div class="content">


<?php

$form = new Form('/login/login');

echo $form->text()->label('Nickname')->name('nickname');
echo $form->email()->label('Mail')->name('email');
echo $form->password()->label('Passwort')->name('passwort');
echo $form->submit()->label('Login')->name('send');

$form->end();
?>
</div>
</div>
</section>
