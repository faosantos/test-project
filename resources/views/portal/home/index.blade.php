<h1>Home Page do Portal</h1>
<a href="/login">Entrar</a>
<div class="text-center p-t-115">
    @if (Route::has('password.request'))
        <a class="txt2" href="{{ route('password.request') }}">
             {{ __('Esqueceu sua senha?') }}
        </a>
    @endif
    <br/>
    <span class="txt1">
        Não tem uma conta?
    </span>
    <a class="txt2" href="{{route('register')}}">
        Registre-se
    </a>
</div>