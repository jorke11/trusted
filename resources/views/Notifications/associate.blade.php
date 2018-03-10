<html>
    <head>
        <style type="text/css">
            #main {border:#0471b4 1px solid;border-radius: 5px;}
            .title{color:#005b94;font-weight: bold;}
        </style>
    </head>

    <body>

        <!--[if gte mso 9]>
         <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px; height:332px;">
           <v:fill type="tile" src="img/sydney.jpg" color="#000" />
           <v:textbox inset="0,0,0,0">
         <![endif]-->



        <table  width="700" align="center" id="main"  border="0" cellspacing="0"cellpadding="0">
            <tr>
                <td>
                    <table width="700" align="center"  border="0" cellspacing="0"cellpadding="0">
                        <tr>
                            <td width='30%' >
                                <img src="{!!asset('img/65-01.png')!!}" width="100">
                            </td> 
                            <td rowspan="2"><h2 class="title">Hola,{{$name . " ".$last_name }} Ticket #{{$id}} te ha sido asociada<br>Cliente {{ucwords($client)}}</h2></td> 
                        </tr>
                        <tr>

                        </tr>

                        <tr>
                            <td><b>Prioridad</b></td>
                            <td>{{$priority}}</td>
                        </tr>
                        <tr>
                            <td><b>Asunto</b></td>
                            <td>{{$subject}}</td>
                        </tr>
                        <tr>
                            <td><b>Descripion</b></td>
                            <td>{{$description}}</td>
                        </tr>
                        <tr>
                            <td><br><br></td>
                        </tr>
                        <tr>
                            <td align='center' colspan="2" class="title">TRUSTED SYSTEM</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>


        <!--[if gte mso 9]>
      </v:textbox>
    </v:rect>
    <![endif]-->

    </body>
</html>
