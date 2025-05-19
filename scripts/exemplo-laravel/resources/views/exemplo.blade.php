<!DOCTYPE html>
<html>

<head>
    <title>{{ $titulo }}</title>
</head>

<body>
    <h1>Olá, {{ $nome }}!</h1>

    @if ($idade >= 18)
    <p>Você é maior de idade.</p>
    @else
    <p>Você é menor de idade.</p>
    @endif

    <ul>
        @foreach ($frutas as $fruta)
        <li>{{ $fruta }}</li>
        @endforeach
    </ul>
</body>

</html>