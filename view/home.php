<div class="card m-3">
    <div class="card-header">
        <div class="float-left">
            <button class="btn btn-success btn-sm" id="buttonAddTeam"><i class="fas fa-user-plus"></i>&nbsp;Agregar Equipo</button></div>
        <div class="float-sm-right">
            <form class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <input class="form-control mr-sm-2" type="text" placeholder="Nombre del Equipo" id="valueSearch">
                </div>
                <div class="input-group-btn">
                    <i class="fas fa-search"></i>
                </div>
            </form>
        </div>
    </div>
    <div class="card-header text-muted text-center" id="resultado"></div>
    <div class="card-body">
        <table class="table" id="tableTeam">
            <thead class="thead-dark">
                <th>ID</th>
                <th>Nombre</th>
                <th>Comuna</th>
                <th>Localidad</th>
                <th>Posición</th>
                <th>Puntos</th>
                <th>Acción</th>
            </thead>
            <tbody id="table-teams">
                <!-- Contenido Json -->
            </tbody>
        </table>
    </div>
</div>