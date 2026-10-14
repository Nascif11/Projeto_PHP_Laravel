<div id="delete-{{$produto -> id}} " class="modal">
        <div class="modal-content">
            <h4>
                <i class="material-icons">Delete</i>
                Tem certeza ?
            </h4>

            <form class="col s12">
                <div class="row">

                    <p>Tem certeza que deseja excluir {{$produto -> nome}}

                </div>

                <div class="row">
                    <div class="col s12">
                        <a
                            href="#!"
                            class="modal-close waves-effect waves-green btn blue right"
                        >
                            Cancelar
                        </a><br>
                        <form action= "{{route('admin.delete',$produto->id)}}" method ="POST">
                            @method('DELETE')
                            @csrf
                        <button
                            
                            type="submit" class="waves-effect waves-green btn blue right"
                        >
                            Excluir
                        </button><br>
                    </div>
                </div>
            </form>
        </div>
    </div>