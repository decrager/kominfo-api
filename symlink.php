<?php
$targetFolder = __DIR__.'/../../kominfo-api/storage/app/public';
$linkFolder = __DIR__.'/storage';
symlink($targetFolder,$linkFolder);
echo 'Symlink process successfully completed';
?>