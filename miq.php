<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta name="viewport" content="width=1000">
      <meta name="MobileOptimized" content="1000">
      <link rel='stylesheet' id='cptch_stylesheet-css'  href='css/style.css' type='text/css' media='all' />
      <link rel="stylesheet" href="css/sweetalert.min.css">
      <link rel="stylesheet" type="text/css" href="css/dropzone.min.css" />
      <script type='text/javascript' src='js/jquery-1.9.1.min.js'></script>
      <style>@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);body  { font-family: 'Open Sans', sans-serif; } </style>
      <style>@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);h1  { font-family: 'Open Sans', sans-serif; } </style>
      <style>@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);.main-navigation  { font-family: 'Open Sans', sans-serif; } </style>
      <title>MediaIQ  Screenshots &#8211; AutonomyWorks</title>
   </head>
   <body class="page-template page-template-screenshots-media page-template-screenshots-media-php page page-id-1986 page-child parent-pageid-1867">
      <div id="wrapper">
         <div id="page" class="hfeed site">
            <div id="masthead-wrap">
               <div id="topbar_container" style="min-height: 30px"></div>
               <header id="masthead" class="site-header header_container" role="banner">
                  <div class="centro-site-logo" style="float: left;display: block;margin: 30px 0 0 30px;">
                     <a href="http://staging.autonomy.works" title="MediaQ" rel="home"><img src="http://staging.autonomy.works/wp-content/themes/formationpro/images/media_q_logo.png" alt="MiQ" style="height:30px"></a>
                  </div>
                  <nav role="navigation" class="site-navigation main-navigation">
                     <div style="max-width:1160px;float: right;line-height: 100px;">
                        <span style="float:right;margin-right: 15px;">
                        </span>
                        <span style="float:right;margin-right: 15px;">
                        <a href="http://clients.autonomyworks.net/menu/" style="font-weight: bold;">Main Menu</a>
                        </span>
                     </div>
                  </nav>
                  <!-- .site-navigation .main-navigation -->
               </header>
               <!-- #masthead .site-header -->
            </div>
            <!-- #masthead-wrap -->
            <hr/>
            <div id="main" class="site-main">
               <header class="entry-header">
                  <h1 class="page-title" style="padding: 0px;">Requesting Screenshots</h1>
               </header>
               <div id="primary_home" class="content-area">
                  <div id="content" class="fullwidth" role="main">
                     <head>
                     </head>
                     <body>
                        <form name="screenshotForm"  id="screenshotForm" onsubmit="return processForm(this);" action="senddropzone.php" method="post" enctype="multipart/form-data">
                           <input type="hidden" name="no_attachments_flag" id="no_attachments_flag" value="1">
                           <input type="hidden" name="mediaiq" value="1">
                           <table border="0" width="500" align="center" class="table">
                              <p>For all screenshot requests for your selected advertiser (including screenshots at the launch of a campaign, creative swaps, and new flights),
                                 please fill out the information below.
                              </p>
                              <tr width="80%">
                                 <td width="30%"> Requester email address:<span style="color: red;">*</span></td>
                                 <td width="50%">
                                    <input type="text" class="required_fields form-control" name="requester_email" id="requester_email">
                                    <p id="span_requester_email"  style="color: red; display:none">Requester email address is required</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Additional screenshot recipients (email addresses):</td>
                                 <td><input type="text" name="additional_screenshot" class="form-control" id="additional_screenshot" style="margin-top: 5px;"></td>
                              </tr>
                              <tr>
                                 <td>
                                    <p class="custom-content">Our standard turnaround time is by EOD the next business day. If you have an urgent request, please list the due date and time here. AutonomyWorks will confirm if we can meet this deadline</p>
                                    <span style="color: red;"></span>
                                 </td>
                                 <td><input type="text" name="screenshot_due_date" class="required_fields form-control" id="screenshot_due_date" style="margin-top: 5px;">
                                 </td>
                              </tr>
                              <tr>
                                 <td>Advertiser:<span style="color: red;">*</span></td>
                                 <td>
                                    <input type="text" class="required_fields form-control" name="advertiser" id="advertiser" style="margin-top: 5px; width: 330px;" >
                                    <p id="span_advertiser"  style="color: red; display:none">Advertiser is required</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td>JIRA Ticket Number:<span style="color: red;">*</span></td>
                                 <td>
                                    <input type="text" class="required_fields form-control" name="jira_id" id="jira_id" style="margin-top: 5px; width: 330px;" >
                                    <p id="span_jira_id"  style="color: red; display:none">JIRA Ticket Number is required</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Creative ID(s):<span  style="color: red;">*</span></td>
                                 <td>
                                    <textarea class="required_fields form-control" name="campaign_id"  id="campaign_id" style="width: 330px; margin: 0px; height: 45px;"></textarea>
                                    <p id="span_campaign_id"  style="color: red; display:none">Creative ID is required</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Sites / Publishers:</td>
                                 <td>
                                    <textarea name="sites_publishers" class="form-control" id="sites_publishers" cols="50" rows="6" style="width: 330px;"></textarea>
                                 </td>
                              </tr>
                              <tr>
                                 <td style="padding: 10px 0;">Geo-targeting:</td>
                                 <td><input type="radio" name="geo_target" value="No" checked> No  <input type="radio" name="geo_target" value="Yes"  style="margin-left: 15px;"> Yes (please specify) <textarea  style="margin: 0px;width: 300px;height: 21px;" name="geo_target_yes" id="showOnYes"></textarea> </td>
                              </tr>
                              <tr>
                                 <td style="padding: 10px 0;">Content targeting:</td>
                                 <td><input type="radio" name="content_target" value="No" checked> No  <input type="radio" name="content_target" value="Yes"  style="margin-left: 15px;"> Yes (please specify) <textarea  style="margin: 0px;width: 300px;height: 21px;" name="content_target_yes" id="showOnYesContent"></textarea> </td>
                              </tr>
                              <tr>
                                 <td>Please include any special instructions for this request (e.g. number of creative versions, client template, etc.)</td>
                                 <td><textarea name="special_instruction" class="form-control" id="special_instruction" style="margin: 0px;width: 300px;height: 42px;"></textarea>
                                 </td>
                              </tr>
                           </table>
                           Attach additional files here (max 25 MB):
                           <div id="dZUpload" class="dropzone">
                              <div class="fallback">
                                 <input name="file[]" type="file" multiple />
                              </div>
                              <div class="dz-default dz-message">
                                 Drag files here to upload, or click to browse for files.
                              </div>
                           </div>
                           <div>
                              <br>
                              <input type="submit" name="screenshot_submit" id="screenshot_submit" value="Submit" class="btnRegister" onclick=" return checkFileUploaded();">
                              <span id="span_file_size_error"  style="color: red; display:none">File size is greater than 25MB.</span>
                           </div>
                        </form>
                  </div>
                  <div class="request-from-area">
                  <div class="user-info-area">
                  <div class="support-message"><br /><br />
                  <p>&nbsp;<br/>For support contact <a href="mailto:mediaiq@emailautonomy.com">mediaiq@emailautonomy.com</a></p><br /><br />
                  </div>
                  </div>
                  </div>
               </div>
            </div>
            <!-- #content .site-content -->
         </div>
         <!-- #primary .content-area -->
         <style>
         .hint { display: none; color: gray; font-style: italic; }
         input:focus + .hint { display: inline; }
         </style>
         <script type="text/javascript"></script>
      </div>
      <!-- #main .site-main -->
      <!-- #colophon .site-footer -->
      <a href="#top" id="smoothup"></a>
      </div>
      <!-- #page .hfeed .site -->
      </div>
      <!-- end of wrapper -->
      <script type='text/javascript' src='js/smoothscroll.js?ver=4.7.2'></script>
      <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
      <script src="js/dropzone.min.js" type="text/javascript"></script>
      <script type='text/javascript' src='js/scripts.js'></script>
      <script src="js/sweetalert.min.js"></script>
   </body>
</html>