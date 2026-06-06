<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto </title>
</head>
<body>
    <h2>Contacto </h2>
    <p><strong>Nombre:</strong> {{ $data['name'] }}</p>
    <p><strong>Correo electrónico:</strong> {{ $data['email'] }}</p>
    <p><strong>Número de celular:</strong> {{ $data['phone'] }}</p>
    <p><strong>Mensaje:</strong></p>
    <p>{{ $data['message_content'] }}</p>
</body>
</html>
