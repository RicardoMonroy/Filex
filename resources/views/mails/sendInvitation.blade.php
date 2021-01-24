<h3>Hola {{ $contract->signer_two_name }}, {{ $contract->signer_one_name }} te envió una invitación para firar un documento:</h3>

<p>
    Nombre del contrato: {{ $contract->name }}
</p><br>
<p>
    Mensaje: {{ $contract->message }}
</p>
<br><br>
<p>Puedes acceder a tu zona de contratos en la aplicación de Filex mediante el siguiente botón:</p>
<br>
<a class="btn btn-primary" href="{{ route('contracts.index') }}">Acceder</a>
