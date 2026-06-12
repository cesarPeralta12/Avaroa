<!DOCTYPE html>
<html>
<head>
    <title>Solicitud de Cotización</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <h2 style="color: #333;">Nueva Solicitud de Cotización</h2>

    <p><strong>Nombre:</strong> {{ $quotation['name'] }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $quotation['email'] }}</p>
    <p><strong>Teléfono:</strong> {{ $quotation['phone'] ?? 'N/A' }}</p>
    <p><strong>País:</strong> {{ $quotation['country'] ?? 'No especificado' }}</p>
    <p><strong>Mensaje:</strong> {{ $quotation['message'] ?? 'No se proporcionó mensaje' }}</p>

    <h3 style="margin-top: 20px;">Productos:</h3>
    <ul>
        @foreach(json_decode($quotation['products'], true) as $product)
            <li style="margin-bottom: 15px;">
                <strong>{{ $product['name'] }}</strong> (ID: {{ $product['id'] }})<br>
                <strong>Código:</strong> {{ $product['code'] }}<br>

                @php
                    $baseUrl = "https://rasthal.store/";
                    $imageUrl = filter_var($product['image'], FILTER_VALIDATE_URL) ? $product['image'] : $baseUrl . ltrim($product['image'], '/');
                @endphp

                <img src="{{ $imageUrl }}" alt="{{ $product['name'] }}" width="100"
                     style="border: 1px solid #ddd; padding: 5px; margin-top: 5px;">
            </li>
        @endforeach
    </ul>

    <p>¡Gracias!</p>
</body>
</html>
