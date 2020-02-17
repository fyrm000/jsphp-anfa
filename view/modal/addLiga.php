<div class="modal fade container-fluid" id="addLiga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Liga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formLiga">
                    <div class="form-group">
                        <label for="lnombre">Nombre Liga</label>
                        <input id="lnombre" type="text" class="form-control" placeholder="Nombre del Equipo" autofocus>
                        <label for="lcomuna">Comuna</label>
                        <input id="lcomuna" type="text" class="form-control" placeholder="Comuna">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="addLiga">Guardar Equipo</button>
            </div>
            </form>
        </div>
    </div>
</div>