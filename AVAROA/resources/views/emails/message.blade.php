@component('mail::message')
# {{ $title }}

{!! $body !!}

@component('mail::footer')
© {{ date('Y') }} Negociosgen. Todos los derechos reservados.
@endcomponent
@endcomponent
