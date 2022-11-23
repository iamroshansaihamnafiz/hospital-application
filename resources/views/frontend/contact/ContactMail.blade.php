<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hospital Message</title>
</head>
<body>
<h1>Message Form Hospital</h1>
<p>Full Name: {{ $details['fullName'] }}</p>
<p>E-mail: {{ $details['emailAddress'] }}</p>
<p>Subject: {{ $details['subject'] }}</p>
<p>Message: {{ $details['message'] }}</p>
</body>
</html>
