<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldo Expirado por Inactividad</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f3f4f6; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #ef4444 0%, #b91c1c 100%); padding: 40px 30px; text-align: center; color: white; }
        .header h1 { margin: 0; font-size: 24px; font-weight: 700; }
        .header p { margin: 10px 0 0; opacity: 0.9; font-size: 16px; }
        .content { padding: 35px 30px; }
        .danger-box { background: #fef2f2; border-left: 5px solid #ef4444; padding: 20px; border-radius: 10px; margin-bottom: 25px; }
        .danger-box h3 { margin: 0 0 8px; color: #991b1b; font-size: 18px; }
        .danger-box p { margin: 0; color: #7f1d1d; font-size: 15px; }
        .amount-box { background: #fef2f2; border: 2px dashed #ef4444; padding: 25px; border-radius: 12px; text-align: center; margin-bottom: 25px; }
        .amount-box .label { color: #991b1b; font-size: 14px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; }
        .amount-box .value { color: #dc2626; font-size: 36px; font-weight: 800; }
        .reason { background: #f8fafc; padding: 18px; border-radius: 10px; margin-bottom: 25px; }
        .reason strong { color: #1e293b; }
        .reason p { margin: 8px 0 0; color: #64748b; font-size: 14px; }
        .cta { text-align: center; margin: 30px 0; }
        .cta a { display: inline-block; background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); color: white; text-decoration: none; padding: 16px 40px; border-radius: 50px; font-weight: 600; font-size: 16px; box-shadow: 0 4px 15px rgba(99,102,241,0.3); }
        .footer { background: #f8fafc; padding: 25px 30px; text-align: center; font-size: 13px; color: #94a3b8; }
        .footer a { color: #6366f1; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>⚠️ Tu saldo ha expirado</h1>
            <p>30 días de inactividad sin recargas</p>
        </div>

        <div class="content">
            <div class="danger-box">
                <h3>Saldo Expirado Automáticamente</h3>
                <p>Tu balance ha sido reiniciado a <strong>Bs 0.00</strong> debido a 30 días sin realizar una nueva recarga.</p>
            </div>

            <div class="amount-box">
                <div class="label">Monto Perdido</div>
                <div class="value">-{{ number_format($expiredAmount, 2) }} Bs</div>
            </div>

            <div class="reason">
                <strong>📋 Motivo de la expiración:</strong>
                <p>{{ $wallet->expiration_reason ?? 'Balance expired due to 30 days of inactivity.' }}</p>
            </div>

            <p style="color:#475569; line-height:1.7; font-size:15px;">
                Hola <strong>{{ $wallet->driver?->user?->name ?? 'Conductor' }}</strong>,<br><br>
                Lamentamos informarte que tu saldo de <strong>{{ number_format($expiredAmount, 2) }} Bs</strong> ha expirado el día de hoy.
                Esto ocurre automáticamente cuando transcurren <strong>30 días</strong> desde tu última recarga sin nueva actividad.
            </p>

            <p style="color:#475569; line-height:1.7; font-size:15px;">
                ✅ <strong>Buenas noticias:</strong> Puedes volver a usar tu billetera en cualquier momento. Solo necesitas realizar una nueva recarga para reactivar tu cuenta y restablecer el contador de 30 días.
            </p>

            <div class="cta">
                <a href="{{ url('/driver/topup') }}">Recargar y Reactivar</a>
            </div>

            <p style="color:#94a3b8; font-size:13px; text-align:center; margin-top:20px;">
                Este es un proceso automático de seguridad. Si tienes dudas, contacta a soporte.
            </p>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} AVAROA Delivery. Todos los derechos reservados.</p>
            <p>Soporte: <a href="mailto:admin@deliveryavaroa.info">admin@deliveryavaroa.info</a></p>
        </div>
    </div>
</body>
</html>
