<?php

$db = mysqli_connect('localhost', 'twilio_app', '5H!afoNHxD${LJ9#', 'twilio_ud');
$query = mysqli_query($db, 'SELECT * FROM call_sms');
var_dump(mysqli_fetch_row($query));

echo ('
    <html>
    <head>
        <title>UD Twilio Dashboard</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
        ');
        foreach (mysqli_fetch_row($query) as $configuration) {
            echo ('
                <div class="col-xs-10 col-xs-offset-1">
                    <span>
                        ' . $configuration['number'] . '
                    </span>
                    <span>
                        ' . $configuration['audio_link'] . '
                    </span>
                    <span>
                        ' . $configuration['message_text'] . '
                    </span>
                </div>
            ');
        }
    echo ('
    </div>
    </body>
    </html>
');
