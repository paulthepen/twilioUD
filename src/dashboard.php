<?php

$db = mysqli_connect('localhost', 'twilio_app', '5H!afoNHxD${LJ9#', 'twilio_ud');
$query = mysqli_query($db, 'SELECT * FROM call_sms');

?>

<html>
    <head>
        <title>UD Twilio Dashboard</title>
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>        <script src="https://use.fontawesome.com/3c11e2a10a.js"></script>
    </head>
    <body>
        <div class="container-fluid" style="background-color: #004; height: 100%">
            <div class="col-sm-8 offset-sm-2" id="content" style="background-color: #ddd; height: 100%">
                <h1 class="text-center">UD Automated SMS</h1>
                <?php 
                    while ($configuration = $query->fetch_assoc()) { ?>
                        <div class='col-xs-12'>
                            <h4><?php echo $configuration['name']; ?></h4>
                        </div>
                        <div class='d-flex p-2 form-group' style="padding: 10px; background-color: #aaa; border: 1px solid black; border-radius: 5px;">
                            <div class="flex-fill p-2">
                            <label class='control-label'>Twilio Number</label><input class="form-control" type="text" name="number-<?php echo $configuration['id']; ?>" value="<?php echo $configuration['twilio_number']; ?>" />
                            </div>
                            <div class="flex-fill p-2">
                            <label class='control-label'>Audio Link</label><input class="form-control" type="text" name="audio-<?php echo $configuration['id']; ?>" value="<?php echo $configuration['audio_link']; ?>" />
                            </div>
                            <div class="flex-fill p-2">
                            <label class='control-label'>Message To Text</label><input class="form-control" type="text" name="message-<?php echo $configuration['id']; ?>" value="<?php echo $configuration['message_text']; ?>" />
                            </div>
                            <div class="flex-shrink align-self-end p-2">
                                <button class="btn btn-primary"><i class="fa fa-save"></i></button>
                            </div>
                        </div>
                <?php } ?>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForm" style="position: fixed; bottom: 25px; right: 75px; "><i class="fa fa-3x fa-plus-circle"></i></button>
            </div>
        </div>
    </body>
</html>
