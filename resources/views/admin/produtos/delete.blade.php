<div id="delete-{{ $produto->id }}" class="modal">
    <div class="modal-content">

        <h4>
            <i class="material-icons">delete</i>
            Tem certeza?
        </h4>

        <p>
            Tem certeza que deseja excluir
            <strong>{{ $produto->nome }}</strong>?
        </p>

    </div>

    <div class="modal-footer">

        <a href="#!"
           class="modal-close waves-effect waves-green btn grey">
            Cancelar
        </a>

        <form
            action="{{ route('admin.produto.delete', $produto->id) }}"
            method="POST"
            style="display: inline-block; margin-left: 8px;"
        >
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="waves-effect waves-light btn red">
                Excluir
            </button>
        </form>

    </div>
</div>