<html><head>

</head><body style="margin: 0 !important; padding: 0; background-color: #ffffff; line-height: auto;">
     


<content>
        <link rel="stylesheet" type="text/css" href="https://v3email.nego.ec/css/res_email.css">
        <center class="wrapper" style="width: 100%; table-layout: fixed; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;">
            <div class="webkit" style="max-width: 600px; margin: 0 auto;">
                <!--[if (gte mso 9)|(IE)]>
                <table width="600" align="center">
                <tr>
                <td>
                <![endif]-->
                
            </td>
        </tr>
<tr class="block ui-sortable-handle" style="display: block; background-color: rgb(255, 255, 255); padding: 0px; margin: 0px;">
            <td class="one-column" style="padding: 0; color: rgb(51, 51, 51);">
                <table width="100%" style="border-spacing: 0; font-family: sans-serif; color: #333333;">
                    <tbody>
<tr>
                        <td class="inner contents content-col" style="padding: 10px; width: 100%; text-align: left; color: rgb(51, 51, 51);">
<p class="h1" style="Margin: 0; font-size: 21px; font-weight: bold; Margin-bottom: 18px; line-height: 24px; text-align: center;"><span style="font-size: 24pt;"><br>Hola {{$data['nombre']}} , <br></span></p>
<p style="Margin: 0; font-size: 14px; Margin-bottom: 10px; text-align: justify;"><span style="font-size: 12pt;"><br>Hemos recibido una solicitud para restablecer la&nbsp;<span class="il">contraseña</span>, para continuar con el proceso haz clic en el enlace:<br>
     <br>
          <a href="{{route('confirm.Reset.Pass', [$data['email'], $data['confirm_token']] )}}"><img src="https://v3email.nego.ec/public/source/5d13d66f30a74/Sin%20t%C3%ADtulo.png1.png?1563293643684" alt="" width="214" height="34" style="border: 0; display: block; margin-left: auto; margin-right: auto;"></a>
          <br />
          <p>Si tienes algun problema para visualizar el correo copie y pegue la siguiente url</p>
          <p>{{route('confirm.Reset.Pass', [$data['email'], $data['confirm_token']] )}}</p>
          <p>Si tiene problemas, por favor comuníquenos.</p>

          <br><span>Recuerda que por seguridad este&nbsp;</span><strong>enlace es temporal y caducará en 24 Horas</strong><span>. Si no has sido tú quien ha enviado la solicitud, ignora este mensaje.</span><br><br></span>
     </p>
</td>
                    </tr>
                </tbody>
</table>
            </td>
        </tr>
<tr class="block" style="display: block; background-color: rgb(255, 255, 255); padding: 0px; margin: 0px;">
            <td class="width600" style="padding: 0; width: 600px; color: rgb(51, 51, 51);">
                <table class="" align="" style="border-spacing: 0; font-family: sans-serif; color: #333333;">
                    <tbody>
<tr>
                        <td class="full-width-image width600 content-col" style="padding: 0; width: 600px; color: rgb(51, 51, 51);"></td>
                    </tr>
                </tbody>
</table>
            </td>
        </tr>
<tr class="block ui-sortable-handle" style="display: block; background-color: rgb(255, 255, 255); padding: 0px; margin: 0px;">
            <td class="one-column" style="padding: 0; color: rgb(51, 51, 51);">
              
            </td>
        </tr>
</tbody>
</table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </div>
        </center>
    </content>

</body></html>