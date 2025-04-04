<?php  

$conn = pg_connect("host=localhost dbname=SIVI user=postgres password=123")  
    or die('No se ha podido conectar: ' . pg_last_error());
    ?> 

</script><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<LINK REL="SHORTCUT ICON" HREF="Logos/Nvo_LogoCEL_sfond.png">
<html>
<head>

<script>  
        function actualizarSelect() {  
            const opcion1 = document.getElementById("opcion1").value;  
            const select2 = document.getElementById("opcion2");  

            // Limpiar opciones del segundo select  
            select2.innerHTML = '';  

            let opciones;  
            if (opcion1 === 'DC') {  
                opciones = ['Ana Luisa Gomez Zambrano', 'Arianny Santeliz', 'Alicia Vargas'];  
            } else if (opcion1 === 'DG') {  
                opciones = ['Maria Inmaculada Medina'];  
            }  else if (opcion1 === 'DA') {  
                opciones = ['Ana Barrios', 'Bradley Orellana', 'Francelys Villacinda'];  
            }  else if (opcion1 === 'CB') {  
                opciones = ['Sandibel Teran'];  
            }  else if (opcion1 === 'DCRP') {  
                opciones = ['Gustavo Roman','Luis Garrido'];  
            }  else if (opcion1 === 'PRI') {  
                opciones = ['Jorge Silva'];  
            }  else if (opcion1 === 'CJ') {  
                opciones = ['Gustavo Rodriguez', 'Maribel Torres'];  
            }  else if (opcion1 === 'UAI') {  
                opciones = ['Juan Carlos Rivero', 'Sabas Perez', 'Keiber Querales'];  
            }  else if (opcion1 === 'DT') {  
                opciones = ['Beatriz Campos', 'Leidymar Arias'];  
            }  else if (opcion1 === 'CC') {  
                opciones = ['Diego Leon', 'Arturo Hurtado', 'Manuel Flores','Cristian Viloria','Dayana Rodriguez'];  
            }   else if (opcion1 === 'PGF') {  
                opciones = ['Lisette Vargas'];  
            }    else if (opcion1 === 'DDR') {  
                opciones = ['Yelitza Duran','Gabriel Mavare','Juan Pablo Vasquez','Andrea Oropeza','Egny Garcia','Luissanys Jimenez'];  
            }    else if (opcion1 === 'CCompras') {  
                opciones = ['Jose Velasquez','Julian Oropeza','Sthefany Castillo'];  
            }    else if (opcion1 === 'CCP') {  
                opciones = ['Anilda Mendoza','Ana Linares'];  
            }    else if (opcion1 === 'TH') {  
                opciones = ['Eglebren Nataly Reverand','Dailin Mendoza','Ezequiel Barrios','Ana Parada','Greisy Mendoza'];  
            }    else if (opcion1 === 'CSHL') {  
                opciones = ['Carmen Uranga','Valery Castro','Luis David Fuentes'];  
            }    else if (opcion1 === 'Fundascel') {  
                opciones = ['Yelitza Mora','Rubi Vargas','Josefina Camacaro','Ernesto Carrizo','Aimar Baez'];  
            }    else if (opcion1 === 'DCACOP') {  
                opciones = ['Jhonny Chirinos','Katiusca Travieso','Yuglis Gomez','Marianelly Pirela','Mari Carmen Segovia','Rosimar Alvarado','Mery Palencia','Leonardo Navarro'];  
            }    else if (opcion1 === 'PIDCACOP') {  
                opciones = ['Roberto Alvarez','Dixon Rojas','Daniel Alvarado'];  
            }    else if (opcion1 === 'DCAD') {  
                opciones = ['Daniel Villegas','Alexandra Torres','Enis Soto','Geraldin Monsalve','Maybel Alvarez','Oliday Carolina Espinoza','Alejandra Mendoza','Leslie Morales','Ylsen Silva','Nelly Orellana','Wileida Galindez','Milexa Roman'];  
            }    else if (opcion1 === 'PIDCAD') {  
                opciones = ['Simon Paradas','Juan Contreras','Jose Gimenez','Karina Rodriguez'];  
            }     else if (opcion1 === 'OAC') {  
                opciones = ['Jose Alberto Fernandez','Ambar Suarez','David Mendoza','Maria Jose Ruiz'];  
            }    else if (opcion1 === 'CPPC') {  
                opciones = ['Carmen Gomez','Daniel Soteldo','Marinez Cañizales','Freddy Peña','Norlyana Benitez','Jorge Jose Silva'];  
            }    else if (opcion1 === 'CAC') {  
                opciones = ['Janeth Torres ','Ceylin Freitez','Yoselin Sanchez','Andres Ladera'];  
            }    else if (opcion1 === 'SG') {  
                opciones = ['Jean Carlos Piñero','Luis Alvarado','Jose Romero'];  
            }    else if (opcion1 === 'CT') {  
                opciones = ['Rudy Gomez','Jose Rodriguez','Juan Jose Avila','Ever Pereira','John Mora','Andres Hernandez'];  
            }    else if (opcion1 === 'CMS') {  
                opciones = ['Euclides Depool','Maria Falcon','Rafael Escalona','Carmen Vargas','Carlos Ramirez','Ana Franco','Maria Edelmira Parra','Carmen Castillo','Milton Lara','Yelitza Guedez','Zoraida Martinez','Jose Hernandez','Daryerling Cantor','Rafel Santeliz','Rudy Abraham Gomez','Norma Orellana','Dixon Figueroa','Julio Piñango','Yradis Josefina','Bruce Torres','Toni Flores'];  
            }    else if (opcion1 === 'Idecel') {  
                opciones = ['Shellys Sosa de Garcia','Silvy De Abreu','Carmen Vargas','Amelia Vizcaya','Armando Jimenez'];  
            }
                

            opciones.forEach(opcion => {  
                let optionElement = document.createElement("option");  
                optionElement.value = opcion;  
                optionElement.textContent = opcion;  
                select2.appendChild(optionElement);  
            });  
        }  
    </script>  
 
<title>SIVI (Sistema de Visitas)</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<LINK href="../class/sia.css" type="text/css" rel="stylesheet">
<script language="JavaScript" type="text/JavaScript">
var Gcod_empleado="";
function Llamar_Incluir(mop){ document.form2.submit(); }


function Llamar_Ventana(url){var murl;
    Gcod_empleado=document.form1.txtcod_empleado.value;murl=url+Gcod_empleado;
    if (Gcod_empleado==""){alert("Codigo Trabajador debe ser Seleccionada");}else {document.location = murl;}
}
function Llamar_modificar(url){var murl;
    Gcod_empleado=document.form1.txtcod_empleado.value; murl=url+Gcod_empleado+"&Gcedula=";
    if (Gcod_empleado==""){alert("Codigo Trabajador debe ser Seleccionada");}else {document.location = murl;}
}



function Mover_Registro(MPos){var murl;
   murl="Act_info_trabajadores.php";
   if(MPos=="P"){murl="Act_info_trabajadores.php?Gcod_empleado=P"}
   if(MPos=="U"){murl="Act_info_trabajadores.php?Gcod_empleado=U"}
   if(MPos=="S"){murl="Act_info_trabajadores.php?Gcod_empleado=S"+document.form1.txtcod_empleado.value;}
   if(MPos=="A"){murl="Act_info_trabajadores.php?Gcod_empleado=A"+document.form1.txtcod_empleado.value;}
   document.location = murl;
}
function Llama_Eliminar(){var url; var r;
  r=confirm("Esta seguro en Eliminar los Datos del Trabajador ?");
  if (r==true) { r=confirm("Esta Realmente seguro en Eliminar los Datos del Trabajador ?");
    if (r==true) {url="Delete_trabajador.php?Gcod_empleado="+document.form1.txtcod_empleado.value; VentanaCentrada(url,'Eliminar Trabajador','','400','400','true');}}
   else { url="Cancelado, no elimino"; }
}
f
<script language="JavaScript" src="../class/sia.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>

<style type="">

.Estilo1 {font-family: Verdana, Arial, Helvetica, sans-serif;  font-size: 12px;   color: #000066; }
.Estilo4 {font-family: Arial, Helvetica, sans-serif; font-size: 12px;}
.Estilo6 {font-size: 14px}
.Estilo2 {color: #FFFFFF;}
-->
</style>

<body>
<table width="977" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="73"><div align="center" class="Estilo2 Estilo4"><img src="Logos/Nvo_LogoCEL_fb.jpg" width="72" height="42"></div></td>
    <td width="836"><div align="center" class="Estilo6 Estilo2 " >INFORMACI&Oacute;N DEL VISITANTE </div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo6">VER 2.0 </strong></td>
  </tr>
</table>
<table width="977" height="300" border="1" id="tablacuerpo">
<tr>
  <tr>
   <td width="92" height="300"><table width="92" height="300" border="0" cellpadding="3" cellspacing="1" bgcolor="#000066" id="tablamenu"><A:blank> MENU</A:blank>
      	
	        <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:Llamar_modificar('Mod_info_trabajadores.php?Gcod_empleado=')";
                onMouseOut="this.style.backgroundColor='#EAEAEA'""];"
                 height="35"  bgColor=#EAEAEA><A class=menu  href="javascript:Llamar_modificar('Mod_info_trabajadores.php?Gcod_empleado=');">Modificar</A></td>
      </tr>
	        <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:Mover_Registro('P')";
               onMouseOut="this.style.backgroundColor='#EAEAEA'""];" height="35"  bgColor=#EAEAEA><A class=menu href="javascript:Mover_Registro('P');">Primero</A></td>
      </tr>
      <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:Mover_Registro('A')";
                  onMouseOut="this.style.backgroundColor='#EAEAEA'""];" height="35"  bgColor=#EAEAEA><a href="javascript:Mover_Registro('A');" class="menu">Anterior</a></td>
      </tr>
      <tr>
        <td  onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:Mover_Registro('S')";
                  onMouseOut="this.style.backgroundColor='#EAEAEA'""];" height="35"  bgColor=#EAEAEA><a href="javascript:Mover_Registro('S');" class="menu">Siguiente</a></td>
      </tr>
      <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:Mover_Registro('U')";
                          onMouseOut="this.style.backgroundColor='#EAEAEA'""];" height="35"  bgColor=#EAEAEA><a href="javascript:Mover_Registro('U');" class="menu">Ultimo</a></td>
      </tr>
      <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('Cat_act_trabajadores.php')";
                          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><a href="Cat_act_trabajadores.php" class="menu">Impirimir Reporte</a></td>
      </tr>
	        <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" ;
               onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><A class=menu  href="javascript:Llama_Eliminar();">Eliminar</A></td>
      </tr>

	  	  <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:Ventana_002('/sia/nomina/ayuda/ayuda_inf_trabaja.htm','Ayuda Trabajadores','','900','600','true');";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><a href="javascript:Ventana_002('/sia/nomina/ayuda/ayuda_inf_trabaja.htm','Ayuda Trabajadores','','900','600','true');" class="menu">Ayuda </a></td>
      </tr>

  <td>&nbsp;</td>
  </tr>
    </table></td>
    <td width="888"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif" bgcolor="#008f39"><b></b></font>
      <form name="form1" method="post" action=""><div id="Layer1" style="position:absolute; width:841px; height:1198px; z-index:1; top: 79px; left: 115px;">
         <table width="865" border="0" >
           <tr>
             <td><table width="864">
               <tr>
                 <td width="300"><span class="Estilo5">NUMERO DE VISITA:</span></td>
                 <td width="150"><span class="Estilo5"><input class="Estilo10" name="txtcod_empleado" type="text" id="txtcod_empleado" size="5" maxlength="5"  value="51" readonly></span></td>
                 <td width="280"><span class="Estilo5">FECHA DE ENTRADA :</span></td>
                 <td width="140"><span class="Estilo5"> <input class="Estilo10" name="txtcedula" type="text" id="txtcedula" size="12" maxlength="10"  value="" ></span></td>
                 <td width="265"><span class="Estilo5">HORA DE ENTRADA : </span></td>
                 <td width="120"><span class="Estilo5"> <input class="Estilo10" name="txtnacionalidad" type="text" id="txtnacionalidad" size="15" maxlength="15"   value="" > </span></td>
                 
               </tr>
             </table></td>
           </tr>
           <tr>
             <td><table width="864">
               <tr>

               <head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Listas Desplegables Dependientes</title>  
    <script>  
        function actualizarSelect() {  
            const opcion1 = document.getElementById("opcion1").value;  
            const select2 = document.getElementById("opcion2");  

            // Limpiar opciones del segundo select  
            select2.innerHTML = '';  

            let opciones;  
            if (opcion1 === 'DC') {  
                opciones = ['Ana Luisa Gomez Zambrano', 'Arianny Santeliz', 'Alicia Vargas'];  
            } else if (opcion1 === 'DG') {  
                opciones = ['Maria Inmaculada Medina'];  
            }  else if (opcion1 === 'DA') {  
                opciones = ['Ana Barrios', 'Bradley Orellana', 'Francelys Villacinda'];  
            }  else if (opcion1 === 'CB') {  
                opciones = ['Sandibel Teran'];  
            }  else if (opcion1 === 'DCRP') {  
                opciones = ['Gustavo Roman','Luis Garrido'];  
            }  else if (opcion1 === 'PRI') {  
                opciones = ['Jorge Silva'];  
            }  else if (opcion1 === 'CJ') {  
                opciones = ['Gustavo Rodriguez', 'Maribel Torres'];  
            }  else if (opcion1 === 'UAI') {  
                opciones = ['Juan Carlos Rivero', 'Sabas Perez', 'Keiber Querales'];  
            }  else if (opcion1 === 'DT') {  
                opciones = ['Beatriz Campos', 'Leidymar Arias'];  
            }  else if (opcion1 === 'CC') {  
                opciones = ['Diego Leon', 'Arturo Hurtado', 'Manuel Flores','Cristian Viloria','Dayana Rodriguez'];  
            }   else if (opcion1 === 'PGF') {  
                opciones = ['Lisette Vargas'];  
            }    else if (opcion1 === 'DDR') {  
                opciones = ['Yelitza Duran','Gabriel Mavare','Juan Pablo Vasquez','Andrea Oropeza','Egny Garcia','Luissanys Jimenez'];  
            }    else if (opcion1 === 'CCompras') {  
                opciones = ['Jose Velasquez','Julian Oropeza','Sthefany Castillo'];  
            }    else if (opcion1 === 'CCP') {  
                opciones = ['Anilda Mendoza','Ana Linares'];  
            }    else if (opcion1 === 'TH') {  
                opciones = ['Eglebren Nataly Reverand','Dailin Mendoza','Ezequiel Barrios','Ana Parada','Greisy Mendoza'];  
            }    else if (opcion1 === 'CSHL') {  
                opciones = ['Carmen Uranga','Valery Castro','Luis David Fuentes'];  
            }    else if (opcion1 === 'Fundascel') {  
                opciones = ['Yelitza Mora','Rubi Vargas','Josefina Camacaro','Ernesto Carrizo','Aimar Baez'];  
            }    else if (opcion1 === 'DCACOP') {  
                opciones = ['Jhonny Chirinos','Katiusca Travieso','Yuglis Gomez','Marianelly Pirela','Mari Carmen Segovia','Rosimar Alvarado','Mery Palencia','Leonardo Navarro'];  
            }    else if (opcion1 === 'PIDCACOP') {  
                opciones = ['Roberto Alvarez','Dixon Rojas','Daniel Alvarado'];  
            }    else if (opcion1 === 'DCAD') {  
                opciones = ['Daniel Villegas','Alexandra Torres','Enis Soto','Geraldin Monsalve','Maybel Alvarez','Oliday Carolina Espinoza','Alejandra Mendoza','Leslie Morales','Ylsen Silva','Nelly Orellana','Wileida Galindez','Milexa Roman'];  
            }    else if (opcion1 === 'PIDCAD') {  
                opciones = ['Simon Paradas','Juan Contreras','Jose Gimenez','Karina Rodriguez'];  
            }     else if (opcion1 === 'OAC') {  
                opciones = ['Jose Alberto Fernandez','Ambar Suarez','David Mendoza','Maria Jose Ruiz'];  
            }    else if (opcion1 === 'CPPC') {  
                opciones = ['Carmen Gomez','Daniel Soteldo','Marinez Cañizales','Freddy Peña','Norlyana Benitez','Jorge Jose Silva'];  
            }    else if (opcion1 === 'CAC') {  
                opciones = ['Janeth Torres ','Ceylin Freitez','Yoselin Sanchez','Andres Ladera'];  
            }    else if (opcion1 === 'SG') {  
                opciones = ['Jean Carlos Piñero','Luis Alvarado','Jose Romero'];  
            }    else if (opcion1 === 'CT') {  
                opciones = ['Rudy Gomez','Jose Rodriguez','Juan Jose Avila','Ever Pereira','John Mora','Andres Hernandez'];  
            }    else if (opcion1 === 'CMS') {  
                opciones = ['Euclides Depool','Maria Falcon','Rafael Escalona','Carmen Vargas','Carlos Ramirez','Ana Franco','Maria Edelmira Parra','Carmen Castillo','Milton Lara','Yelitza Guedez','Zoraida Martinez','Jose Hernandez','Daryerling Cantor','Rafel Santeliz','Rudy Abraham Gomez','Norma Orellana','Dixon Figueroa','Julio Piñango','Yradis Josefina','Bruce Torres','Toni Flores'];  
            }    else if (opcion1 === 'Idecel') {  
                opciones = ['Shellys Sosa de Garcia','Silvy De Abreu','Carmen Vargas','Amelia Vizcaya','Armando Jimenez'];  
            }
                

            opciones.forEach(opcion => {  
                let optionElement = document.createElement("option");  
                optionElement.value = opcion;  
                optionElement.textContent = opcion;  
                select2.appendChild(optionElement);  
            });  
        }  
    </script>  
</head>  
<body>  
    <label width="800" for="opcion1">DIRECCION:</label>  
    <select id="opcion1" onchange="actualizarSelect()">  
        <option value="DC">Despacho</option>  
        <option value="DG">Direccion General</option>  
        <option value="DA">Administracion</option> 
        <option value="CB">Bienes</option> 
        <option value="DCRP">Comunicaciones</option> 
        <option value="PRI">Prensa y Relaciones Institucionales</option> 
        <option value="CJ">Consultoria Juridica</option> 
        <option value="UAI">Auditoria Interna</option> 
        <option value="DT">Direccion Tecnica</option> 
        <option value="CC">Computacion</option> 
        <option value="PGF">Planificacion y Gestion Fiscal</option> 
        <option value="DDR">Determinacion de Responsabilidad</option> 
        <option value="CCompras">Compras</option> 
        <option value="CCP">Contabilidad y Presupuetso</option> 
        <option value="TH">Talento Humano</option> 
        <option value="CSHL">Seguridad e Higiene Laboral</option> 
        <option value="Fundascel">FUNDASCEL</option> 
        <option value="DCACOP">Direcion de Control la Adminstracion Central Y Otro Poder</option> 
        <option value="PIDCACOP">Potestad Investigativa de la Direcion de Control la Adminstracion Central Y Otro Poder</option> 
        <option value="DCAD">Direccion Central de la Administracion Descentralizada</option> 
        <option value="PIDCAD">Potestad Investigativa de la Direccion Central de la Administracion Descentralizada</option>  
        <option value="OAC">Oficina de Atencion al Ciudadano</option> 
        <option value="CPPC">Pomocion y Participacion Ciudadana</option> 
        <option value="CAC">Archivo Central</option> 
        <option value="SG">Servicios Generales</option> 
        <option value="CT"> Transporte y Mensajeria</option> 
        <option value="CMS"> Mantenimiento y Suministros</option> 
        <option value="Idecel">IDECEL</option> 
    </select>  

    <td><table width="864">
    <td><table width="864">

    <label width="800" for="opcion2">FUNCIONARIO:</label>  
    <select id="opcion2">  
        <option value="">--Selecciona primero--</option>  
    </select>  
</body>  

  
                  </tr>
             </table></td>
           </tr>
           <tr>
          
             <td><table width="864">
               <tr>
               <td width="110"><span class="Estilo5"> NOMBRE DEL VISITANTE:</span></td>
                 <td width="500"><span class="Estilo5"><input class="Estilo10" name="txtdescripcion" type="text" id="txtdescripcion" size="50" maxlength="50"  value="" onFocus="encender(this)> </span></td>
                 <td width= "200" ><span class="Estilo5"> CARNET N°:</span></td>
                 <td width="300"><span class="Estilo5"><input class="Estilo10" name="txttipo_nomina" type="text" id="txttipo_nomina" size="3" maxlength="2"  value="01" ></span></td>
                 
              </tr>
             </table></td>
           </tr>
		   
		   <tr>
             <td><table width="864">
               <tr>
                 <td width="144"><span class="Estilo5">CEDULA: </span></td>
                 <td width="400"><span class="Estilo5"> <input class="Estilo10" name="txtcod_categoria" type="text" id="txtcod_categoria" size="18" maxlength="16"   value=" "  onFocus="encender(this)></span></td>
                  <td width="144"><span class="Estilo5"></span></td>
                 <td width="200"><span class="Estilo5">FECHA DE SALIDA: </span></td>
				 <td width="300"><span class="Estilo5"><span class="Estilo5"><input class="Estilo10" name="txtfuente" type="text" id="txtfuente" size="12" maxlength="12" value="">  </span></td>
				</tr>
             </table></td>
           </tr>
           <tr>
             
           
           
           <td><table width="864">
               <tr>
               <td width="400"><span class="Estilo5">
               <td width="80"><span class="Estilo5"></span></td>
                 <td width="500"><span class="Estilo5"><input type="button" value="REGISTRAR"> 
                 </tr>
             </table></td>

             
         


           </tr>
           <tr>
          
           
        
    </td>
  </tr>
</table>
</body>
</html>
