<h1>
    <h2>Bienvenido {{ $user->name }}, ha sido dado de alta como técnico</h2>
    <p>Su <strong>contraseña</strong> es: 12345678</p>
    <p style="color: red;">Le recomendamos que cambie su contraseña</p>
    <p>Para poder iniciar sesión en nuestra plataforma es necesario que verifique su correo</p>
    <a href="{{ $url }}" style="padding: 0.5em 1em;text-decoration: none;color: #fff;background: #0069d9;">Verify</a>
</h1>