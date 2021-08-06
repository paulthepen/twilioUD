<?php

$db = mysqli_connect('localhost', 'twilio_app', '5H!afoNHxD${LJ9#', 'twilio_ud');
$query = mysqli_query($db, 'SELECT * FROM call_sms');

?>

<html>
    <head>
        <title>UD Twilio Dashboard</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="custom-style.css">
    </head>
    <body>
        <div class="container">
        <h1>UD Automated SMS</h1>
        <?php 
            while ($configuration = $query->fetch_assoc()) { ?>
                <div class='col-12'>
                    <h4><?php echo $configuration['name']; ?></h4>
                </div>
                <div class='col-12 form-group'>
                    <div class='col-4'>
                    <label class='control-label'>Twilio Number</label><input class="form-control" type="text" name="number-<?php echo $configuration['id']; ?>" value="<?php echo $configuration['twilio_number']; ?>" />
                    </div>
                    <div class='col-4'>
                    <label class='control-label'>Audio Link</label><input class="form-control" type="text" name="audio-<?php echo $configuration['id']; ?>" value="<?php echo $configuration['audio_link']; ?>" />
                    </div>
                    <div class='col-4'>
                    <label class='control-label'>Message To Text</label><input class="form-control" type="text" name="message-<?php echo $configuration['id']; ?>" value="<?php echo $configuration['message_text']; ?>" />
                    </div>
                </div>
        <?php } ?>
        </div>
    </body>
</html>
