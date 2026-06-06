<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordatorio de Expiración de Saldo</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f3f4f6; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); padding: 40px 30px; text-align: center; color: white; }
        .header h1 { margin: 0; font-size: 24px; font-weight: 700; }
        .header p { margin: 10px 0 0; opacity: 0.9; font-size: 16px; }
        .content { padding: 35px 30px; }
        .alert-box { background: #fffbeb; border-left: 5px solid #f59e0b; padding: 20px; border-radius: 10px; margin-bottom: 25px; }
        .alert-box h3 { margin: 0 0 8px; color: #92400e; font-size: 18px; }
        .alert-box p { margin: 0; color: #78350f; font-size: 15px; }
        .stats { display: flex; gap: 15px; margin-bottom: 25px; }
        .stat { flex: 1; background: #f8fafc; padding: 20px; border-radius: 12px; text-align: center; }
        .stat-value { font-size: 28px; font-weight: 700; color: #1e293b; margin-bottom: 5px; }
        .stat-label { font-size: 13px; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; }
        .cta { text-align: center; margin: 30px 0; }
        .cta a { display: inline-block; background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; text-decoration: none; padding: 16px 40px; border-radius: 50px; font-weight: 600; font-size: 16px; box-shadow: 0 4px 15px rgba(16,185,129,0.3); }
        .footer { background: #f8fafc; padding: 25px 30px; text-align: center; font-size: 13px; color: #94a3b8; }
        .footer a { color: #6366f1; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>⏳ Tu saldo está por expirar</h1>
            <p>Realiza una recarga para mantener tu balance activo</p>
        </div>

        <div class="content">
            <div class="alert-box">
                <h3>⚠️ Importante</h3>
                <p>
                    @if($daysRemaining === 1)
                        Tu saldo expira <strong>mañana</strong>. Si no recargas antes de medianoche, perderás tu balance acumulado.
                    @elseif($daysRemaining === 0)
                        Tu saldo <strong>expira hoy</strong>. Recarga de inmediato para evitar la pérdida.
                    @else
                        Tu saldo expirará en <strong>{{ $daysRemaining }} días</strong> si no realizas una nueva recarga.
                    @endif
                </p>
            </div>

            <div class="stats">
                <div class="stat">
                    <div class="stat-value">{{ number_format($wallet->balance, 2) }} Bs</div>
                    <div class="stat-label">Saldo Actual</div>
                </div>
                <div class="stat">
                    <div class="stat-value">{{ $daysRemaining }}</div>
                    <div class="stat-label">Días Restantes</div>
                </div>
            </div>

            <p style="color:#475569; line-height:1.7; font-size:15px;">
                Hola <strong>{{ $wallet->driver?->user?->name ?? 'Conductor' }}</strong>,<br><br>
                Te recordamos que tu última recarga fue el <strong>{{ $wallet->last_recharge_date?->format('d \de M \de Y') }}</strong>.
                Según nuestras políticas, el saldo expira automáticamente después de <strong>30 días</strong> sin actividad de recarga.
            </p>

            <p style="color:#475569; line-height:1.7; font-size:15px;">
                📅 <strong>Fecha límite:</strong> {{ $wallet->balance_expiration_date?->format('d \de M \de Y') ?? 'Próximos días' }}
            </p>

            <div class="cta">
                <a href="{{ url('/driver/topup') }}">Recargar Ahora</a>
            </div>

            <p style="color:#94a3b8; font-size:13px; text-align:center; margin-top:20px;">
                Si ya realizaste una recarga recientemente, por favor ignora este mensaje.
            </p>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} AVAROA Delivery. Todos los derechos reservados.</p>
            <p>Soporte: <a href="mailto:admin@deliveryavaroa.info">admin@deliveryavaroa.info</a></p>
        </div>
    </div>
</body>
</html>
