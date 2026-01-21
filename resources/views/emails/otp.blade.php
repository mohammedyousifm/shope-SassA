<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>رمز التحقق</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f8fafc; padding:20px">

    <div style="max-width:500px;margin:auto;background:#ffffff;border-radius:10px;padding:20px;text-align:center">

        <h2 style="color:#111827">رمز التحقق</h2>

        <p style="color:#374151;font-size:15px">
            استخدم رمز التحقق التالي لإكمال العملية:
        </p>

        <div style="font-size:32px;
                    letter-spacing:10px;
                    font-weight:bold;
                    color:#2563eb;
                    margin:20px 0">
            {{ $code }}
        </div>

        <p style="color:#6b7280;font-size:13px">
            هذا الرمز صالح لمدة <strong>10 دقائق</strong> فقط.
        </p>

        <p style="color:#9ca3af;font-size:12px;margin-top:20px">
            إذا لم تطلب هذا الرمز، يمكنك تجاهل هذه الرسالة.
        </p>
    </div>

</body>

</html>