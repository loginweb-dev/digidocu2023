<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Com. Interna</title>
    <style>
        body {
            width: 100%;
            /* height: 2000px; */
            margin: 10px;
            padding: 0;
        }
        .border {
            position: fixed;
            top: 0;
            left: 0;
            border: 1px solid black;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
		td {
			text-align: center;
			padding: 5px;
            /* width: 100%; */
		}
		.miinput1 {
			width: 100%;
			height: 16px;
			border-radius: 5px;
		}
		.miinput2 {
			width: 100%;
			height: 60px;
            border-radius: 5px;
		}

		.miinput3 {
			width: 100%;
			height: 190px;
			border-radius: 15px;
		}

        
		.miinput4 {
			width: 100%;
			height: 140px;
			border-radius: 15px;
		}

		.table-border {
			border: 1px solid black;
			border-collapse: collapse;
            width: 100%;
		}

		hr {
		    border-top: 1px dashed black;
		}
	</style>

</head>

<body>
    <div class="border"></div>
    <table  class="table-border">
        <tr>
            <td class="text-center" style="width:20%; border: 1px solid black;">
                <img src="https://cmt.gob.bo//storage/logo.jpeg" alt="" width="80">
            </td>
            <td class="text-center" style="width:180%; background-color: #D8D8D8;">
                       
                    <strong style="font-size: 32px;">CONCEJO MUNICIPAL</strong>
                    <br>
                    <strong style="font-size: 22px;">DE LA SANTISIMA TRINIDAD</strong>
              
            </td>
            <td style="background-color: #D8D8D8; border: 1px solid black;">
                <strong>COMUNICACION INTERNA</strong>
                <br>
                <input type="text" class="miinput1" value="{{ $nci->id }}">
            </td>
        </tr>
    </table>

    <table style="width: 100%">
        <tr>
            <td style="width: 5px; background-color: #FF6699; border: 1px solid black;"></td>    
            <td style="width: 500px; border: 1px solid black; background-color: #D8D8D8;"> 
                <table>
                    <tr style="text-align: right;"> 
                        <td style="text-align: right;"><small style="font-size: 13px;">Fecha y Hora:</small></td>
                        <td style="width: 300px"><input type="text" class="miinput1"></td>
                    </tr>
                    <tr>
                        <td><small style="font-size: 13px;">Dirigido A: </small></td>
                        <td style="width: 300px"><input type="text" class="miinput1"></td>
                    </tr>
                    <tr>
                        <td><small style="font-size: 13px;">Via : </small></td>
                        <td style="width: 300px"><input type="text" class="miinput1"></td>
                    </tr>
                    <tr>
                        <td><small style="font-size: 13px;">De : </small></td>
                        <td style="width: 300px"><input type="text" class="miinput1"></td>
                    </tr>
                    <tr>
                        <td><small style="font-size: 13px;">Referencias:</small></td>
                        <td style="width: 400px"><input type="text" class="miinput2"></td>
                    </tr>
                </tr>
                <tr>
                    <td><small style="font-size: 13px;">Notas:</small></td>
                    <td style="width: 400px"><input type="text" class="miinput2"></td>
                </tr>
                </table>
            </td>
            <td style="border: 1px solid black; background-color: #D8D8D8; text-align: left">
                <small>Firma</small>
                <br>
                <input type="text" class="miinput3">
                <br>
                <small>Fecha Salida</small>
                <br>
                <input type="text" class="miinput1">
            </td>
        </tr>     
    </table>

    <table style="width: 100%">
        <tr>
            <td style="width: 5px; background-color: #7CB428; border: 1px solid black;"></td>    
            <td style="width: 500px; border: 1px solid black; background-color: #D8D8D8;"> 
                <table>
                    <tr style="text-align: right;"> 
                        <td style="text-align: right;"><small style="font-size: 13px;">Fecha y Hora:</small></td>
                        <td style="width: 300px"><input type="text" class="miinput1"></td>
                    </tr>
                    <tr>
                        <td><small style="font-size: 13px;">Dirigido A: </small></td>
                        <td style="width: 300px"><input type="text" class="miinput1"></td>
                    </tr>
                    <tr>
                        <td><small style="font-size: 13px;">Via : </small></td>
                        <td style="width: 300px"><input type="text" class="miinput1"></td>
                    </tr>
                    <tr>
                        <td><small style="font-size: 13px;">De : </small></td>
                        <td style="width: 300px"><input type="text" class="miinput1"></td>
                    </tr>
                </tr>
                <tr>
                    <td><small style="font-size: 13px;">Notas:</small></td>
                    <td style="width: 400px"><input type="text" class="miinput2"></td>
                </tr>
                </table>
            </td>
            <td style="border: 1px solid black; background-color: #D8D8D8; text-align: left">
                <small>Firma</small>
                <br>
                <input type="text" class="miinput4">
                <br>
                <small>Fecha Salida</small>
                <br>
                <input type="text" class="miinput1">
            </td>
        </tr>     
    </table>

    <table style="width: 100%">
        <tr>
            <td style="width: 5px; background-color: #7CB428; border: 1px solid black;"></td>    
            <td style="width: 500px; border: 1px solid black; background-color: #D8D8D8;"> 
                <table>
                    <tr style="text-align: right;"> 
                        <td style="text-align: right;"><small style="font-size: 13px;">Fecha y Hora:</small></td>
                        <td style="width: 300px"><input type="text" class="miinput1"></td>
                    </tr>
                    <tr>
                        <td><small style="font-size: 13px;">Dirigido A: </small></td>
                        <td style="width: 300px"><input type="text" class="miinput1"></td>
                    </tr>
                    <tr>
                        <td><small style="font-size: 13px;">Via : </small></td>
                        <td style="width: 300px"><input type="text" class="miinput1"></td>
                    </tr>
                    <tr>
                        <td><small style="font-size: 13px;">De : </small></td>
                        <td style="width: 300px"><input type="text" class="miinput1"></td>
                    </tr>
                </tr>
                <tr>
                    <td><small style="font-size: 13px;">Notas:</small></td>
                    <td style="width: 400px"><input type="text" class="miinput2"></td>
                </tr>
                </table>
            </td>
            <td style="border: 1px solid black; background-color: #D8D8D8; text-align: left">
                <small>Firma</small>
                <br>
                <input type="text" class="miinput4">
                <br>
                <small>Fecha Salida</small>
                <br>
                <input type="text" class="miinput1">
            </td>
        </tr>     
    </table>

</body>
</html>