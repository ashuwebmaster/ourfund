<html>
    <head></head>
<body>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr style="border-collapse:collapse"> 
      <td class="es-adaptive" align="center" bgcolor="#ffffff" style="padding:0;Margin:0"> 
       <table class="es-header-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#3D5CA3;width:600px" cellspacing="0" cellpadding="0" bgcolor="#3d5ca3" align="center"> 
        <tbody>
         <tr style="border-collapse:collapse"> 
          <td style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;background-color:#fafafa" bgcolor="#fafafa" align="left"> 
           <table cellspacing="0" cellpadding="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
            <tbody>
             <tr style="border-collapse:collapse"> 
              <td align="left" style="padding:0;Margin:0;width:560px"> 
               <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                <tbody>
                 <tr style="border-collapse:collapse"> 
                  <td align="center" style="padding:0;Margin:0;font-size:0px"><img class="adapt-img" src="{{ asset('assets/img/logo.jpg') }}" alt="" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="188"></td> 
                 </tr> 
                </tbody>
               </table></td> 
             </tr> 
            </tbody>
           </table></td> 
         </tr> 
        </tbody>
       </table>
      </td> 
     </tr>
    <tr style="border-collapse:collapse"> 
      <td style="padding:0;Margin:0;background-color:#ffffff" bgcolor="#ffffff" align="center"> 
       <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px;border:1px solid #f7f7f7" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center"> 
        <tbody>
         <tr style="border-collapse:collapse"> 
          <td style="padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:40px;background-color:transparent" bgcolor="transparent" align="left"> 
           <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
            <tbody>
             <tr style="border-collapse:collapse"> 
              <td valign="top" align="center" style="padding:0;Margin:0;width:560px"> 
               <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top" width="100%" cellspacing="0" cellpadding="0" role="presentation"> 
                <tbody>
                 <tr style="border-collapse:collapse"> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#252525"><strong>Hello admin,</strong></p></td> 
                 </tr>
                 <tr style="border-collapse:collapse"> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">You have received new record in Ourfund the details are the following as:</p></td> 
                 </tr> 
                 <tr style="border-collapse:collapse"> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">Fund Name</p></td> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">{{ $fund['fund_name'] }}</p></td> 
                 </tr> 
                 <tr style="border-collapse:collapse"> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">Fund Description</p></td> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">{{ $fund['fund_description'] }}</p></td> 
                 </tr> 
                 <tr style="border-collapse:collapse"> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">Venmo</p></td> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">{{ $fund['venmo'] }}</p></td> 
                 </tr> 
                 <tr style="border-collapse:collapse"> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">Paypal</p></td> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">{{ $fund['paypal'] }}</p></td> 
                 </tr> 
                 <tr style="border-collapse:collapse"> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">Full Name</p></td> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">{{ $fund['full_name'] }}</p></td> 
                 </tr> 
                 <tr style="border-collapse:collapse"> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">Phone No</p></td> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">{{ $fund['phone_no'] }}</p></td> 
                 </tr> 
                 <tr style="border-collapse:collapse"> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">Facebook</p></td> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">{{ $fund['fb_url'] }}</p></td> 
                 </tr> 
                 <tr style="border-collapse:collapse"> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">Instagram</p></td> 
                  <td align="left" style="padding:0 15px 15px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#676767">{{ $fund['insta_url'] }}</p></td> 
                 </tr> 
                </tbody>
               </table></td> 
             </tr> 
            </tbody>
           </table></td> 
         </tr> 
        </tbody>
       </table></td> 
     </tr>
        </tbody>
    </table>
</body>
</html>