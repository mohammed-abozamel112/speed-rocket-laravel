<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $isRtl ? 'رسالة تواصل جديدة' : 'New Contact Message' }}</title>
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

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }

        .info-table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .info-table tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{ $isRtl ? 'رسالة تواصل جديدة' : 'New Contact Message' }}</h1>
        </div>

        <div class="content">
            <p class="{{ $isRtl ? 'text-right' : 'text-left' }}">
                {{ $isRtl
                    ? 'لقد استلمت رسالة تواصل جديدة من خلال نموذج الاتصال في الموقع.'
                    : 'You have received a new contact message through the website contact form.' }}
            </p>

            <table class="info-table">
                <tr>
                    <td class="{{ $isRtl ? 'text-right' : 'text-left' }}" width="30%">
                        <strong>{{ $isRtl ? 'الاسم:' : 'Name:' }}</strong></td>
                    <td class="{{ $isRtl ? 'text-right' : 'text-left' }}">{{ $data['name'] }}</td>
                </tr>
                <tr>
                    <td class="{{ $isRtl ? 'text-right' : 'text-left' }}">
                        <strong>{{ $isRtl ? 'البريد الإلكتروني:' : 'Email:' }}</strong></td>
                    <td class="{{ $isRtl ? 'text-right' : 'text-left' }}">{{ $data['email'] }}</td>
                </tr>
                @if ($data['phone'])
                    <tr>
                        <td class="{{ $isRtl ? 'text-right' : 'text-left' }}">
                            <strong>{{ $isRtl ? 'رقم الهاتف:' : 'Phone:' }}</strong></td>
                        <td class="{{ $isRtl ? 'text-right' : 'text-left' }}">{{ $data['phone'] }}</td>
                    </tr>
                @endif
                @if ($data['company'])
                    <tr>
                        <td class="{{ $isRtl ? 'text-right' : 'text-left' }}">
                            <strong>{{ $isRtl ? 'الشركة:' : 'Company:' }}</strong></td>
                        <td class="{{ $isRtl ? 'text-right' : 'text-left' }}">{{ $data['company'] }}</td>
                    </tr>
                @endif
                <tr>
                    <td class="{{ $isRtl ? 'text-right' : 'text-left' }}">
                        <strong>{{ $isRtl ? 'الموضوع:' : 'Subject:' }}</strong></td>
                    <td class="{{ $isRtl ? 'text-right' : 'text-left' }}">{{ $data['subject'] }}</td>
                </tr>
                <tr>
                    <td class="{{ $isRtl ? 'text-right' : 'text-left' }}">
                        <strong>{{ $isRtl ? 'الرسالة:' : 'Message:' }}</strong></td>
                    <td class="{{ $isRtl ? 'text-right' : 'text-left' }}">{{ $data['message'] }}</td>
                </tr>
                <tr>
                    <td class="{{ $isRtl ? 'text-right' : 'text-left' }}">
                        <strong>{{ $isRtl ? 'وقت الإرسال:' : 'Sent At:' }}</strong></td>
                    <td class="{{ $isRtl ? 'text-right' : 'text-left' }}">{{ now()->format('Y-m-d H:i:s') }}</td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}.
                {{ $isRtl ? 'جميع الحقوق محفوظة' : 'All rights reserved' }}.</p>
        </div>
    </div>
</body>

</html>
