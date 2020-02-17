<div class="modal fade container-fluid" id="editTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Editar Equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="eformTeam">
                    <div class="form-group">
                        <label for="enombre">Nombre</label>
                        <input id="enombre" type="text" class="form-control" placeholder="Nombre del Equipo" autofocus>
                        <label for="ecomuna">Comuna</label>
                        <input id="ecomuna" type="text" class="form-control" placeholder="Comuna">
                        <label for="eciudad">Localidad</label>
                        <input id="eciudad" type="text" class="form-control" placeholder="Localidad">
                        <label for="epuntos">Puntos</label>
                        <input id="epuntos" type="number" class="form-control" placeholder="Puntos">
                        <label for="eposicion">Posición</label>
                        <input id="eposicion" type="number" class="form-control" placeholder="Posicion">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="editTeam">Guardar Edición</button>
            </div>
            </form>
        </div>
    </div>
</div>