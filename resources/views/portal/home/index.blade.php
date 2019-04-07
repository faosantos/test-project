<h1>Home Page do Portal</h1>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/painel') }}">Painel</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

{{-- Parte antiga do código --}}
{{-- <a href="/login">Entrar</a>
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
</div> --}}