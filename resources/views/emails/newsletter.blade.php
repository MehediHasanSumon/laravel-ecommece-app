<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }
        .logo {
            max-width: 150px;
            height: auto;
        }
        .content {
            padding: 20px 0;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #777;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3490dc;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 20px 0;
        }
        .social-links {
            text-align: center;
            margin: 20px 0;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #3490dc;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
        <h1>{{ $subject }}</h1>
    </div>
    
    <div class="content">
        {!! $message !!}
    </div>
    
    <div class="social-links">
        <a href="#">Facebook</a>
        <a href="#">Twitter</a>
        <a href="#">Instagram</a>
    </div>
    
    <div class="footer">
        <p>© {{ date('Y') }} Your E-commerce Store. All rights reserved.</p>
        <p>
            You're receiving this email because you subscribed to our newsletter.
            <a href="{{ route('newsletter.unsubscribe', ['email' => $email ?? '']) }}">Unsubscribe</a>
        </p>
    </div>
</body>
</html>