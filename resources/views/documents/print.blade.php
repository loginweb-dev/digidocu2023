<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" href="{{asset('logo.png')}}" type="image/png"> 
	<title>Documento #{{ $midoc->id }}</title>
    
	<style>
		td {
			text-align: center;
			padding: 5px;
		}
		.miinput1 {
			width: 98%;
			height: 18px;
			border-radius: 10px;
			text-align:center !important;
			/* padding: 5px; */
		}
		.miinput2 {
			width: 98%;
			height: 18px;
			/* border: 1px; */
			border-radius: 20px;
		}

		.miinput3 {
			width: 93%;
			height: 47px;
			/* border: 1px; */
			font-size: 12px;
			border-radius: 15px;
			padding: 10px;
		}
		.table-border {
			border: 1px solid black;
			border-collapse: collapse;
		}

		hr {
		border-top: 1px dashed black;
		}
	</style>
</head>
<body>

		<table border="0" width="100%" class="table-border">
			<tr>
				<td class="text-center">
					<img src="https://cmt.gob.bo//storage/logo.jpeg" alt="" width="80">
				</td>
				<td class="text-center">
					<div style="font-size: 35px;"><b>C O N C E J O  |  M U N I C I P A L</b></div>
					<div style="font-size: 18px;"><b>D E  |  T R I N I D A D</b></div> 
					<div style="font-size: 20px;">H O J A  |  D E  |  R U T A</div> 
					<div style="font-size: 20px;">Nro: {{ $midoc->code }} </div>
			</tr>
		</table>


		<table border="0" width="100%" style="margin-top: 3px;" class="table-border">
			<tr>
				<td style="text-align:left; width=50%;">
					<small>Fecha de Ingreso:</small>
					<br>
					<input type="text" class="miinput1" value="{{ $midoc->created_at }}">
				</td>
				<td style="text-align:left">
						<small>Origen:</small>
						<br>
						<input type="text" class="miinput1" value="{{ $midoc->name }}">
				</td>
			</tr>
			<tr>
				<td style="text-align:left" width="50%">
					<small>Remitente</small>
					<br>
					<input type="text" class="miinput3" value="{{ $miremit->name }}">
				</td>
				<td style="text-align:left">
					<small>Destinatario:</small>
					<br>
					@php
						if(count($thisDocPermissionUsers)==0){
							$miusers = "No destinatarios, realize una derivacion para ver datos.";
						}else{
							$miusers = "";
							foreach($thisDocPermissionUsers as $perm){
								$miusers = $miusers.$perm['user']->name.' ';
							}
						}
					@endphp
					<input type="text" class="miinput3" value="{{ $miusers }}">					
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:left">
					<small> Mensaje o Referencia: </small>
					<br>
						<div style="border-radius: 20px; border: 1px solid; padding-left: 5px; height: 82px; font-size: 13px;">
							{!!  $midoc->description !!}	
						</div>
				</td>
			</tr>
			<tr>
				<td style="text-align:left" width="50%">
					<small>Recibido por:</small>
					<br>
					<input type="text" class="miinput1" value="{{ $miuser->name }}">
				</td>
				<td style="text-align:left">
					<small>Firma:</small> 
					<br>
					<div style="text-align: center">
						<hr>
					</div>
					
				</td>
			</tr>
		</table>
		

		{{-- derivaciones  --}}
		<table border="0" width="100%" style="margin-top: 3px;" class="table-border">
			<tr>
				<td style="text-align:left" width="50%">
					<small>Fecha y Hora de Ingreso a Destinatario: </small>
					<br>
					<input type="text" class="miinput1">
				</td>
				<td style="text-align:left">
				</td>
			</tr>
			<tr>
				<td style="text-align:left" colspan="2">
					<div style="margin-left: 250px;">
						<small > <u> Comisiones:</u></small>
					</div>
					<table width="100%">
						<tr>
							<td style="text-align:left" width="34%">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1"><small> Ejecutivo Municipal</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1"><small> Pleno del Concejo</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small> Concejala, Concejal ..............</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small> (MAEC)</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label" for="exampleCheck1"> Otro .......................................</small>
								</div>
							</td>
							<td style="text-align:left" width="33%">
								<br>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label" for="exampleCheck1"> Jurídica Institucional</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label" for="exampleCheck1"> Económicas y Financieras</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label" for="exampleCheck1"> Administrativa</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label" for="exampleCheck1"> Serv. Públicos, Vialidad y Transp</small>
								</div>
							</td>
							<td style="text-align:left">
								<br>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label" for="exampleCheck1"> Tec. Planif. y Des. Territorial</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1"> Des. Humano Salud y Género</label>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label" for="exampleCheck1"> Educación Cultura y Deportes</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label" for="exampleCheck1"> Medio Amb. Ecosis. y Turismo</small>
								</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			
			<tr>
				<td style="text-align:left" colspan="2">
					<small><u> Instrucción: </u></small>
					<table width="100%">
						<tr>
							<td style="text-align:left">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label"> Urgente</small>
								</div>

								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label"> Preparar respuesta</small>
								</div>

								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label"> Elevar informe</small>
								</div>
							</td>
							<td style="text-align:left">					
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label"> Para su conocimiento</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label"> Asistir a evento</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label"> Ejecutar inspección</small>
								</div>
							</td>
							<td style="text-align:left">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label"> Analizar e informar</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label"> Proceder según norma</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label"> Para su difusión</small>
								</div>
							</td>
							<td style="text-align:left">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label"> Archivo</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label"> Coordinar con .........</small>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small class="form-check-label"> Otro ........................</small>
								</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="text-align:left" colspan="2">
					<small>Observaciones:</small> 
					<br>
					
					<div style="text-align:center">
						<hr>
					</div>
					<br>
					<div style="text-align:center">
						<hr>
					</div>
					<br>
					<div style="text-align:center">
						{{-- <hr> --}}
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align:left">
					<small>Fecha y Hora de Salida:<small>
						<br>
					<input type="text" class="miinput1">
				</td>
				<td style="text-align:left">
					<small>Firma y Sello:</small> 
					<br>		
					<div style="text-align: center">
						<hr>
					</div>
				</td>
			</tr>
		</table>

		<div class="saltopagina" style="page-break-before: always;"></div>
		
		<table border="0" width="100%" style="margin-top: 10px;" class="table-border">
			<tr>
				<td style="text-align:left" width="50%">
					Fecha y Hora de Ingreso
					<br>
					<input type="text" class="miinput1">
				</td>
				<td style="text-align:left">
					Recibido por:
					<br>
					<input type="text" class="miinput1">
				</td>
			</tr>
			<tr>
				<td style="text-align:left" colspan="2">
					Destinatario:
					<br>
					<input type="text" class="miinput1">
				</td>
			</tr>
			<tr>
				<td style="text-align:left" colspan="2">
					<small>Mensaje:</small>
					<div style="text-align: center">
						....................................................................................................................................
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align:left" width="50%">
					<small>Fecha y Hora de Salida</small>
					<br>
					<input type="text" class="miinput1">
				</td>
				<td style="text-align:left">
					<small>Firma:</small> 
					<br>
					<div style="text-align: center">
						............................................
					</div>
				</td>
			</tr>
		</table>

		<table border="0" width="100%" style="margin-top: 10px;" class="table-border">
			<tr>
				<td style="text-align:left" width="50%">
					Fecha y Hora de Ingreso
					<br>
					<input type="text" class="miinput1">
				</td>
				<td style="text-align:left">
					Recibido por:
					<br>
					<input type="text" class="miinput1">
				</td>
			</tr>
			<tr>
				<td style="text-align:left" colspan="2">
					Destinatario:
					<br>
					<input type="text" class="miinput1">
				</td>
			</tr>
			<tr>
				<td style="text-align:left" colspan="2">
					<small>Mensaje:</small>
					<div style="text-align: center">
						....................................................................................................................................
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align:left" width="50%">
					<small>Fecha y Hora de Salida</small>
					<br>
					<input type="text" class="miinput1">
				</td>
				<td style="text-align:left">
					<small>Firma:</small> 
					<br>
					<div style="text-align: center">
						............................................
					</div>
				</td>
			</tr>
		</table>

		<table border="0" width="100%" style="margin-top: 10px;" class="table-border">
			<tr>
				<td style="text-align:left" width="50%">
					Fecha y Hora de Ingreso
					<br>
					<input type="text" class="miinput1">
				</td>
				<td style="text-align:left">
					Recibido por:
					<br>
					<input type="text" class="miinput1">
				</td>
			</tr>
			<tr>
				<td style="text-align:left" colspan="2">
					Destinatario:
					<br>
					<input type="text" class="miinput1">
				</td>
			</tr>
			<tr>
				<td style="text-align:left" colspan="2">
					<small>Mensaje:</small>
					<div style="text-align: center">
						....................................................................................................................................
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align:left" width="50%">
					<small>Fecha y Hora de Salida</small>
					<br>
					<input type="text" class="miinput1">
				</td>
				<td style="text-align:left">
					<small>Firma:</small> 
					<br>
					<div style="text-align: center">
						............................................
					</div>
				</td>
			</tr>
		</table>

		<table border="0" width="100%" style="margin-top: 10px;" class="table-border">
			<tr>
				<td style="text-align:left" width="50%">
					Fecha y Hora de Ingreso
					<br>
					<input type="text" class="miinput1">
				</td>
				<td style="text-align:left">
					Recibido por:
					<br>
					<input type="text" class="miinput1">
				</td>
			</tr>
			<tr>
				<td style="text-align:left" colspan="2">
					Destinatario:
					<br>
					<input type="text" class="miinput1">
				</td>
			</tr>
			<tr>
				<td style="text-align:left" colspan="2">
					<small>Mensaje:</small>
					<div style="text-align: center">
						....................................................................................................................................
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align:left" width="50%">
					<small>Fecha y Hora de Salida</small>
					<br>
					<input type="text" class="miinput1">
				</td>
				<td style="text-align:left">
					<small>Firma:</small> 
					<br>
					<div style="text-align: center">
						............................................
					</div>
				</td>
			</tr>
		</table>
</body>
</html>