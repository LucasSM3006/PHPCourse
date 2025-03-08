<?php
use Framework\Session;

$successMessage = Session::getFlashMessage('success_message');
$errorMessage = Session::getFlashMessage('error_message');
?>

<?php if(isset($successMessage)) : ?>
    <div class="message bg-green-100 p-4 my-3">
        <?= $successMessage ?>
    </div>
<?php endif; ?>

<?php if(isset($errorMessage)) : ?>
    <div class="message bg-red-100 p-4 my-3">
        <?= $errorMessage ?>
    </div>
<?php endif; ?>