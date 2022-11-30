<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <title>Document</title>
    <style>
      body{
        padding: 8px ;
      }
      table {
        border-collapse: collapse;
      }
      td,th{
        border: 1px solid black;
      }
      img {
        width: 125px;
        height: 40px;
      }
      .cuerpo td,th{
        font-size: 10px;

      }
     .encabezado th{
      background-color:rgb(190, 189, 189);
     }



/* table{border-collapse:collapse;}
th,tr,td{
 border:1px solid #000;
 width:150px;
 height:45px;
 vertical-align:middle;
 text-align:center;
}
th{
 color:#fff;
 background-color: #252525;
}

tr:nth-child(odd) td{
 background-color:#eee;
}
.cuerpo td,th{
        font-size: 12px;

      } */
    </style>
</head>

<body>
    <table>
        <tr>
            <th style="padding: 10px;    width: 520px; height: 25px; "><img src="https://soporte.grupopaz.com.bo/logo.php" alt=""></th>
            <th style="width: 460px;" colspan="2">GESTIÓN DE ACTIVOS</th>
        </tr>
        <tr>
            <td colspan="2" style="padding: 2px; height: 20px;"><center> REPORTE DE ASIGNACIÓN</center></td>
            <td colspan="1" style="padding: 2px; height: 20px;"><center> Departamento IT</center></td>
        </tr>
    </table>
    <br>
    <table>
    <thead class="encabezado">
                 <tr>
                     <th style="width:75px; height:auto;">Codigo</th>
                     <th style="width:120px; height:auto;">Activo</th>
                     <th style="width:120px; height:auto;">Modelo</th>
                     <th style="width:80px; height:auto;">Marca</th>
                     <th style="width:150px; height:auto;">Nro. Serial</th>
                     <th style="width:90px; height:auto;">Condición</th>
                     <th style="width:160px; height:auto;">Usuario Asignado</th>
                     <th style="width:100px; height:auto;">Empresa</th>
                     <th style="width:80px; height:auto;">Fecha Asignación</th>

                 </tr>
             </thead>

             <tbody class="cuerpo">
             @if(empty($data))
              <p>sin resultado1</p>
             @elseif(empty($data))
              <p>sin resultados</p>
            @else
                @forelse($data as $obj)
                    <tr>
                        <td><center>{{$obj->Codigo}}</center></td>
                        <td><center>{{$obj->activo}}</center></td>
                        <td><center>{{$obj->Modelo}}</center></td>
                        <td><center>{{$obj->Marca}}</center></td>
                        <td><center>{{$obj->NroSerial}}</center></td>
                        <td><center>{{$obj->Condicion}}</center></td>
                        <td><center>{{$obj->UsuarioAsig}}</center></td>
                        <td><center>{{$obj->empresa}}</center></td>
                        <td><center>{{$obj->fecha_i}}</center></td>

                    </tr>
                    @empty
                    @endforelse
             @endif
             </tbody>
    </table>
</body>

</html>
