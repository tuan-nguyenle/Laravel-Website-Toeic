<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>

<body>
    <h1>Test Email</h1>
    <p>Name : <?php echo e($mailData['name']); ?></p>
    <p>DOB : <?php echo e($mailData['dob']); ?></p>
</body>

</html>
<?php /**PATH /var/www/html/resources/views/email/test.blade.php ENDPATH**/ ?>