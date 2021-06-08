<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Simple Transactional Email</title>
<style>
/* -------------------------------------
INLINED WITH htmlemail.io/inline
------------------------------------- */



.main-button {
background-color: #4173c9;
background-image: -moz-linear-gradient(top,#5e8ee4,#4173c9);
background-image: -webkit-linear-gradient(top,#5e8ee4,#4173c9);
background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0,#5e8ee4),color-stop(1,#4173c9));
background-image: linear-gradient(top,#5e8ee4,#4173c9);
border: 0;
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
border-radius: 2px;
color: #fff;
cursor: pointer;
display: inline-block;
font-family: arial,sans-serif;
font-size: 13px;
font-weight: bold;
line-height: 1.54;
padding: 7px 12px;
text-align: center;
text-shadow: 0 -1px 0 rgba(0,0,0,.08);
cursor: pointer;
}





/* -------------------------------------
RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
@media only screen and (max-width: 800px) {
table[class=body] h1 {
font-size: 28px !important;
margin-bottom: 10px !important;
}
table[class=body] p,
table[class=body] ul,
table[class=body] ol,
table[class=body] td,
table[class=body] span,
table[class=body] a {
font-size: 16px !important;
}
table[class=body] .wrapper,
table[class=body] .article {
padding: 10px !important;
}
table[class=body] .content {
padding: 0 !important;
}
table[class=body] .container {
padding: 0 !important;
width: 100% !important;
}
table[class=body] .main {
border-left-width: 0 !important;
border-radius: 0 !important;
border-right-width: 0 !important;
}
table[class=body] .btn table {
width: 100% !important;
}
table[class=body] .btn a {
width: 100% !important;
}
table[class=body] .img-responsive {
height: auto !important;
max-width: 100% !important;
width: auto !important;
}
}
/* -------------------------------------
PRESERVE THESE STYLES IN THE HEAD
------------------------------------- */
@media all {
.ExternalClass {
width: 100%;
}
.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
line-height: 100%;
}
.apple-link a {
color: inherit !important;
font-family: inherit !important;
font-size: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
text-decoration: none !important;
}
.btn-primary table td:hover {
background-color: #34495e !important;
}
.btn-primary a:hover {
background-color: #34495e !important;
border-color: #34495e !important;
}
}
</style>
</head>
<body class="" style="background-color: #f6f6f6; font-family:'Trebuchet', sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
<table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
<tr>
<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
<td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
<div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

<!-- START CENTERED WHITE CONTAINER -->
<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">
<!--This is preheader text. Some clients will show this text as a preview.--></span>
<table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

<!-- START MAIN CONTENT AREA -->
<tr>
<td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
<tr>
<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">


<br>

<p align="center"><img src="https://drive.google.com/uc?export=view&id=1e5qz-p0nv5Ng2AVsDcaTqZM7VspDiD3d" width="70px"></p>
<h1 style="text-align: center;">Activation Token</h1>
<p style="line-height: 150%; font-size: 14px; font-weight: normal; margin: 0; "></p>




 <p><b>Hi {{$user->names}},</b> You recently requested an activation token as part of your onboarding process on the Legal Aid Council Reporting Mobile App.</p>
 <p>All tokens are valid for 1 hour after generation, feel free to generate a new token if the current one expires.</p>
<br/>


<p><b>Activation Token:</b></p>
<b>{{$token}}</b>



<table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
<tbody>
<tr>
<td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
<tbody>
<tr>
  <!--
<td style="font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;"> <a href="http://htmlemail.io" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;">Call To Action</a> </td>-->
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<p style="font-family: sans-serif; font-size: 18px; font-weight: normal; margin: 0; margin-bottom: 15px; text-align: left;">

Thanks<br>
Team LAC
</p>
<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;"></p>
</td>
</tr>
</table>
</td>
</tr>

<!-- END MAIN CONTENT AREA -->
</table>

<!-- START FOOTER -->
<div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
<tr>
<td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
<span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">{{--bizaddress--}}</span>
<!-- <br> Don't like these emails? <a href="" style="text-decoration: underline; color: #999999; font-size: 12px; text-align: center;">Unsubscribe</a>. -->
</td>
</tr>
<tr>
<td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
<!--
Powered by <a href="http://htmlemail.io" style="color: #999999; font-size: 12px; text-align: center; text-decoration: none;">HTMLemail</a>.-->
</td>
</tr>
</table>
</div>
<!-- END FOOTER -->

<!-- END CENTERED WHITE CONTAINER -->
</div>
</td>
<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
</tr>
</table>
</body>
</html>