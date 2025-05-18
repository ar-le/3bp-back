<!-- resources/views/emails/eto_welcome.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Welcome to the Earth-Trisolaris Organization</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #0c2e44;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.8em;
            color: #777;
            text-align: center;
        }
        .code {
            font-family: monospace;
            background-color: #f5f5f5;
            padding: 2px 5px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Earth-Trisolaris Organization</h1>
        <p>For a New Civilization</p>
    </div>

    <div class="content">
        <p>Dear {{ $user->username }},</p>

        <p>We welcome you to the Earth-Trisolaris Organization. Your commitment to our cause has been noted, and we are pleased to have you among our ranks.</p>

        <p>As you know, our organization serves as the bridge between civilizations, working toward the noble goal of preparing humanity for the coming of our Trisolaran friends.</p>



        <p>You will receive further instructions regarding your first assignment soon. Until then, maintain normal activities and avoid suspicion.</p>

        <p>Remember our motto: <em>"The universe is a dark forest."</em></p>

        <p>For the new civilization,</p>
        <p><strong>The ETO Leadership</strong></p>
    </div>

    <div class="footer">
        <p>This message will self-destruct after reading. Do not reply to this communication.</p>

    </div>
</body>
</html>
