<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $isRtl ? 'تأكيد الاستلام' : 'Confirmation' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #A31621;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .content {
            background-color: #f9f9f9;
            padding: 20px;
        }

        .footer {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{ $isRtl ? 'شكراً لتواصلك معنا' : 'Thank You for Contacting Us' }}</h1>
        </div>

        <div class="content">
            <p class="{{ $isRtl ? 'text-right' : 'text-left' }}">
                {{ $isRtl ? 'عزيزي/عزيزتي' : 'Dear' }} <strong>{{ $data['name'] }}</strong>,
            </p>

            <p class="{{ $isRtl ? 'text-right' : 'text-left' }}">
                {{ $isRtl
                    ? 'نشكرك على تواصلك معنا. لقد استلمنا رسالتك وسنقوم بالرد عليك في أقرب وقت ممكن.'
                    : 'Thank you for reaching out to us. We have received your message and will get back to you as soon as possible.' }}
            </p>

            <div class="{{ $isRtl ? 'text-right' : 'text-left' }}"
                style="margin: 20px 0; padding: 15px; background-color: #fff; border-left: 4px solid #A31621;">
                <p><strong>{{ $isRtl ? 'الموضوع:' : 'Subject:' }}</strong> {{ $data['subject'] }}</p>
                <p><strong>{{ $isRtl ? 'الرسالة:' : 'Message:' }}</strong></p>
                <p>{{ $data['message'] }}</p>
            </div>

            <p class="{{ $isRtl ? 'text-right' : 'text-left' }}">
                {{ $isRtl ? 'سنقوم بالرد على بريدك الإلكتروني:' : 'We will respond to your email at:' }}
                <strong>{{ $data['email'] }}</strong>
            </p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. {{ $isRtl ? 'جميع الحقوق محفوظة' : 'All rights reserved' }}.</p>
            <p style="margin-top: 10px;">
                <strong>{{ $isRtl ? 'البريد الإلكتروني:' : 'Email:' }}</strong>
                <a href="mailto:info@fid.sa" style="color: white;">info@fid.sa</a> |
                <strong>{{ $isRtl ? 'الهاتف:' : 'Phone:' }}</strong>
                <a href="tel:+966502057206" style="color: white;">+966 50 205 7206</a>
            </p>
        </div>
    </div>
</body>

</html>
