<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
   </head>
   <body style="background-color:#f9f9f9">
      <table style="margin: 30px auto 0;" cellpadding="0" cellspacing="0" width="600">
         <tr>
            <td valign="top">
              <a href="http://help.klola.id" target="_blank"><img src="http://www.klola.id/storage/assets/ULgtLr3xQxZCTeR8wfMv1az4Y6TgJ282j6Ev7xun.png" width="120px" style="margin-top:20px"></a>
            </td>
         </tr>
      </table>
      <table style="margin: 20px auto;padding: 20px 30px" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff">
           <tr>
              <td align="center" valign="top">
                  <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                       <td>
                          <center>
                          <br>
                          <h3><?php echo $__env->yieldContent('subject'); ?></h3>
                          <br>
                          </center>
                       </td>
                    </tr>
                  </table>
                  <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                       <td style="margin: 20px; text-align: left;" align="left">
                          <br>
                          <div style="font-size:12px;color: #333333">
                            <?php echo $__env->yieldContent('content'); ?>
                          </div >
                          <br>
                       </td>
                    </tr>
                  </table>

                  <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                       <td>
                          <center>
                            <br>
                            <span style="font-size:12px;color: #333333">
                              <?php echo $__env->yieldContent('link'); ?>
                            </span>
                            <br>
                            <br>
                            <!--[if mso]>
                            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="8%" stroke="f" fillcolor="<?php echo e($setting->grab('email.color_button_bg')); ?>">
                               <w:anchorlock/>
                               <center>
                                  <![endif]-->
                                  <a href="<?php echo e(url($setting->grab('admin_route'))); ?>" style="background-color:<?php echo e($setting->grab('email.color_button_bg')); ?>;border-radius:4px;color:#ffffff;display:inline-block;font-family: Helvetica, Arial, sans-serif;font-size:16px;line-height:30px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;"><?php echo e($setting->grab('email.dashboard')); ?></a>
                                  <!--[if mso]>
                               </center>
                            </v:roundrect>
                            <![endif]-->
                          </center>
                       </td>
                    </tr>
                 </table>

                 <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                       <td>
                         <br>
                         <br>
                          <span style="font-size:12px;color: #333333">
                          <?php echo e($setting->grab('email.signoff')); ?><br>
                          <?php echo e($setting->grab('email.signature')); ?>

                          </span>
                          <br>
                         <br>
                       </td>
                    </tr>
                 </table>
              </td>
           </tr>
      </table>

       <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="600" >
           <tr>
              <td valign="top" >
                <center>
                     <br>
                     <a href="http://linkedin.com/company/klolaindonesia" target="_blank" style="margin-right:20px"><img src="http://www.klola.id/storage/assets/f8i1JqsnhEsHxllVwzwNkqhTOrTkVV32AZlKIMJb.png" alt="linkedin" width="22px"></a>
                     <a href="http://instagram.com/klolaindonesia" target="_blank" style="margin-right:20px"><img src="http://www.klola.id/storage/assets/Lbx7XUv3ugRyZ07SstXJmVN4WGc6XvN89AtPxXFP.png" alt="instagram" width="22px"></a>
                     <a href="http://facebook.com/klolaindonesia" target="_blank" style="margin-right:20px"><img src="http://www.klola.id/storage/assets/qrEN0lflBhwf1gI5o1RvIQ22VpQUVJoQFX5BdYP2.png" alt="facebook" width="22px"></a>
                     <a href="http://twitter.com/klolaindonesia" target="_blank"><img src="http://www.klola.id/storage/assets/yYUHEud4WZyjaHn9QnKFH04mHbSyNooijW4zRnKC.png" alt="twitter" width="22px"></a>
                     <br>
                     <br>
                     <span style="font-size:12px;color: #757575">
                       Copyright © 2018 - <a href="<?php echo e($setting->grab('email.footer_link')); ?>"  style="font-size:12px;color: #757575"><?php echo e($setting->grab('email.footer')); ?></a>, All rights reserved.
                       <br>
                       <br>
                       Pondok Indah Office Tower 2, 17th Fl. <br>
                       Jl. Sultan Iskandar Muda Kav. V-TA Pondok Indah Jakarta Selatan 12310 <br> Telp.: +6221 7592 2910 | Email: helpdesk@klola.id
                       <br>
                       <br>
                       <br>
                     </span>
                </center>
              </td>
          </tr>
       </table>
   </body>
</html>
