@if (Session::has('sucesso'))
    <div class="card green">
        <div class="card-content white-text">
            <span class="card-title">Parabéns!</span>
            <p>{{ Session::get('sucesso') }}</p>
        </div>
    </div>
@endif