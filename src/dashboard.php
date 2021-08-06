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
        <script src="https://use.fontawesome.com/3c11e2a10a.js"></script>
    </head>
    <body>
        <div class="container-fluid" style="background-color: #004; height: 100%">
            <div class="col-sm-8 col-sm-offset-2" id="content" style="background-color: #ddd; height: 100%">
                <h1>UD Automated SMS</h1>
                <?php 
                    while ($configuration = $query->fetch_assoc()) { ?>
                        <div class='col-xs-12'>
                            <h4><?php echo $configuration['name']; ?></h4>
                        </div>
                        <div class='d-flex flex-row form-group' style="padding: 10px; background-color: #aaa; border: 1px solid black; border-radius: 5px;">
                            <div class="p-2">
                            <label class='control-label'>Twilio Number</label><input class="form-control" type="text" name="number-<?php echo $configuration['id']; ?>" value="<?php echo $configuration['twilio_number']; ?>" />
                            </div>
                            <div class="p-2">
                            <label class='control-label'>Audio Link</label><input class="form-control" type="text" name="audio-<?php echo $configuration['id']; ?>" value="<?php echo $configuration['audio_link']; ?>" />
                            </div class="p-2">
                            <div>
                            <label class='control-label'>Message To Text</label><input class="form-control" type="text" name="message-<?php echo $configuration['id']; ?>" value="<?php echo $configuration['message_text']; ?>" />
                            <div class="flex-shrink p-2">
                                <button class="btn btn-primary"><i class="fa fa-save"></i></button>
                            </div>
                        </div>
                <?php } ?>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForm" style="position: fixed; bottom: 25px; right: 75px; "><i class="fa fa-3x fa-plus-circle"></i></button>
            </div>
        </div>
    </body>
</html>
