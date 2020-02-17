<div class="modal fade container-fluid" id="addTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formTeam">
          <div class="form-group">
            <label for="enombre">Nombre</label>
            <input id="nombre" type="text" class="form-control" placeholder="Nombre del Equipo" autofocus>
            <label for="ecomuna">Comuna</label>
            <input id="comuna" type="text" class="form-control" placeholder="Comuna">
            <label for="eciudad">Localidad</label>
            <input id="ciudad" type="text" class="form-control" placeholder="Localidad">
            <label for="epuntos">Puntos</label>
            <input id="puntos" type="number" class="form-control" placeholder="Puntos">
            <label for="eposicion">Posición</label>
            <input id="posicion" type="number" class="form-control" placeholder="Posicion">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="addTeam">Guardar Equipo</button>
      </div>
      </form>
    </div>
  </div>
</div>