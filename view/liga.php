<div class="card m-3">
    <div class="card-header">
        <div class="float-left">
            <button class="btn btn-success btn-sm" id="buttonAddLiga"><i class="fas fa-user-plus"></i>&nbsp;Agregar Liga</button></div>
        <div class="float-sm-right">
            <form class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <input class="form-control mr-sm-2" type="text" placeholder="Nombre de la liga" id="valueSearchL">
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
                <th>Acción</th>
                <!-- <th>Cantidad de equipos</th> -->
            </thead>
            <tbody id="table-liga">
                <!-- Contenido Json -->
            </tbody>
        </table>
    </div>
</div>