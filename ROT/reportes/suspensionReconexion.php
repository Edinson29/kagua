<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body{
    box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	font-family: arial;
    display: block;
}
.container{
    height: 400px;
    display: flex;
    margin-left: auto;
    margin-right: auto;
    justify-content: center;
    align-items: center;
}
.form{
    background-color: #f2f2f2;
    padding: 30px;
    border-radius: 5px;
}
select, input{
    margin-bottom: 10px;
}
.exportar{
    padding: .375rem .75rem;
    border: 1px solid #00c400;
    border-radius: 3px;
    background-color: #00c400;
    color: #fff;
    float: right;
}
.exportar:hover{
    cursor: pointer;
    transition: 0.5s all;
    border: 1px solid #00c400;
    background-color: transparent;
    color: #00c400;
}
.exportar:focus{
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0,196,0,.5)
}
.date-start{
    margin-left: 150px;
}
.date-end{
    margin-left: 165px;
}
</style>
<body>
    <div class="container">
        <div class="form">
            <form action="suspensionReconexionExcel.php" method="POST">
                <h4>Reporte de Suspension y Reconexion</h4><hr>
                <label for="repo">Seleccione el tipo de reporte: </label>
                <select name="repo" id="data">
                    <option value="">Por seleccionar</option>
                    <option value="SUP">Suspension</option>
                    <option value="RCX">Reconexion</option>
                    <option value="SUP RCX">Suspension y Reconexion</option>
                </select><br>
                <label for="inicio">Fecha Inicio:</label>
                <input type="date" name="inicio" class="date-start"><br>
                <label for="fin">Fecha Fin:</label>
                <input type="date" name="fin" class="date-end"><br>
                <input type="submit" value="Exportar a excel" name="crear" class="exportar">
            </form>
        </div>
    </div>
</body >
</html>