<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{csrf_token()}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Examen ATC CJ</title>
</head>
<style>
    #titulo {
        text-align: center;
        color: black;
        font-size: 25px;
    }

    #nombre {
        text-align: center;
        color: black;
        font-size: 15px;
    }

    #tabla {
        margin: 0 auto;
        width: 50%;
    }
</style>

<body>
    <hr>
    <div id="titulo"><b>Asignación de conductores y vehículos</b></div>
    </hr>
    <hr>
    <div style="text-align:center;">
        <div>
            <table id="tabla" class="table table-striped table-bordered">
                <thead style="background-color: #2C8FFE; color: white;">
                    <td><b>Nombre del conductor</b></td>
                    <td><b>Vehículo asignado</b></td>
                </thead>
                <tbody>
                    @foreach ($conductor_vehiculo as $item)
                    <tr>
                        <td>{{$item-> nombreConductor}} {{$item-> apellidoConductor}}</td>
                        <td>{{$item-> marcaVehiculo}} {{$item-> modeloVehiculo}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="padding-top: 25px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalregistro">Agregar conductor</button>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="modalregistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar vehículo a conductor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>

                <form>
                    <div style="text-align: center; margin: 15px;">
                        <select required style="width: 40%; margin: 15px; padding: 5px;" id="conductor">
                            <option value="0">Conductores disponibles</option>
                            @foreach ($conductores as $item)
                            <option value="{{ $item-> idConductor }}">{{$item-> nombreConductor}} {{$item-> apellidoConductor}}</option>
                            @endforeach
                        </select>

                        <select required style="width: 40%; margin: 15px; padding: 5px;" id="vehiculo">
                            <option value="0">Vehículos disponibles</option>
                            @foreach ($vehiculos as $item)
                            <option value="{{ $item-> idVehiculo }}">{{$item-> marcaVehiculo}} {{$item-> modeloVehiculo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="asignar">Asignar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </hr>
</body>

</html>

<script type="text/javascript">
    $('#asignar').click(function() {
        var conductor = $('#conductor').val();
        var vehiculo = $('#vehiculo').val();

        if (conductor != 0 && vehiculo != 0) {
            var url = "{{ route('registro', ['temp', 'aux']) }}";
            url = url.replace('temp', conductor);
            url = url.replace('aux', vehiculo);
            window.location.href = url;
        } else {
            alert('Revisar selección');
        }
        
    }).done();
</script>