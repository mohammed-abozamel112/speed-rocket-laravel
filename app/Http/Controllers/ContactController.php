<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactConfirmation;
use App\Mail\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class ContactController extends Controller
{
    public function index()
    {
        
        // تحديد اتجاه النص بناءً على اللغة
        $isRtl = in_array(app()->getLocale(), ['ar']);
        $textAlign = $isRtl ? 'text-right' : 'text-left';
        $marginRight = $isRtl ? 'ml-2' : 'mr-2';
        $flexReverse = $isRtl ? 'flex-row-reverse' : '';
        $spaceReverse = $isRtl ? 'space-x-reverse' : '';
        $borderLeft = $isRtl ? 'border-r-4' : 'border-l-4';

        return view('contact.index', compact(
            'isRtl',
            'textAlign',
            'marginRight',
            'flexReverse',
            'spaceReverse',
            'borderLeft'
        ));
    }

    public function submit(ContactFormRequest $request)
    {
        // تحديد اتجاه النص بناءً على اللغة
        $isRtl = in_array(app()->getLocale(), ['ar']);

        try {
            $contactData = $request->validated();

            // تسجيل بيانات التواصل المستلمة
            Log::info('Contact form submitted: ', $contactData);

            // إرسال رسالة التأكيد إلى المرسل
            Mail::to($contactData['email'])->send(new ContactConfirmation($contactData, $isRtl));
            Log::info('Confirmation email sent to: ' . $contactData['email']);

            // إرسال الإشعار إلى البريد الإداري
            $adminEmail = config('mail.admin_email', 'info@fid.sa');

            // التحقق من صحة البريد الإلكتروني للإدارة
            if (!filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
                Log::error('Invalid admin email address: ' . $adminEmail);
                throw new \Exception("Admin email address is invalid");
            }

            Mail::to($adminEmail)->send(new ContactNotification($contactData, $isRtl));
            Log::info('Notification email sent to admin: ' . $adminEmail);

            return redirect()->back()->with(
                'success',
                $isRtl
                ? 'تم إرسال رسالتك بنجاح! سنقوم بالرد عليك قريباً.'
                : 'Your message has been sent successfully! We will get back to you soon.'
            );

        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());
            Log::error('Error trace: ' . $e->getTraceAsString());

            return redirect()->back()->with(
                'error',
                $isRtl
                ? 'حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة مرة أخرى.'
                : 'An error occurred while sending your message. Please try again.'
            )->withInput();
        }
    }
}
