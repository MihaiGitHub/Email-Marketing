<!DOCTYPE HTML>
<!--[if lte IE 7]><html lang="en" class="ie7"><![endif]-->
<!--[if IE 8]><html lang="en" class="ie8"><![endif]-->
<!--[if gte IE 9]><html lang="en" class="ie9"><![endif]-->
<!--[if !IE]><!--<html lang="en"><>!--<![endif]-->
<head>
  <meta name="robots" content="noindex">
  <meta name="googlebot" content="noindex">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
  <meta itemprop="description" content="Responsive Email Template-design">
  <title>Email Marketer</title>
  <link href="css/jquery-ui-1.10.4.custom.css" rel="stylesheet">
  <link href="css/jihe.css" rel="stylesheet">
  
  		<!--[if IE]>
			<style type="text/css">
                html, body{overflow-x: hidden;}
                .placehold(margin-left:-20px !important;}
			</style>
		<![endif]-->
        
        <!--[if lt IE 9]>
          <script src="assets/js/h5.js"></script>
        <![endif]-->
        
  		<!--[if IE 7]>
			<style type="text/css">
                html, body{overflow-x: hidden;}
                .placehold(margin-left:-20px !important;}
			</style>
		<![endif]-->
		<!--[if IE 6]>
			<style type="text/css">
                html, body{overflow-x: hidden;}
                .placehold(margin-left:-20px !important;}
			</style>
		<![endif]-->
</head>
<body id="builder" class="lightt">

<!--
<div id="mask1">
  <div id="guideInner">
  	<div id="cancelTabs">Close Guide</div>
    <div id="tabs">
      <ul>
          <li rel="info"><a href="#tabs-1" title="click to enlage the image">- Welcome</a></li>
          <li rel="install"><a href="ajax/info.html">- Template Info</a></li>
          <li rel="install"><a href="ajax/installation.html">Installation</a></li>
          <li rel="function"><a href="ajax/function.html">All functions</a></li>
          <li rel="layout"><a href="ajax/layout.html">Prebuild Layouts</a></li>
          <li rel="choose module"><a href="ajax/module.html">Choose Modules</a></li>
          <li rel="color"><a href="ajax/color.html">Color Setting</a></li>
          <li rel="bg"><a href="ajax/bg.html">BG/Radius/Divider</a></li>
          <li rel="gAPI"><a href="ajax/googlefonts.html">Googel Fonts</a></li>
          <li rel="download"><a href="ajax/download.html">Export the Page</a></li>
          <li rel="copyright"><a href="ajax/copyright.html">Copyright</a></li>
          <li rel="guide"><a href="ajax/guide.html">Guide</a></li>
          <li rel="myitem"><a href="ajax/myitem.html">All Email Templates</a></li>
          <li rel="responsive"><a href="ajax/responsive.html">Responsive Effect</a></li>
          <li rel="operate"><a href="ajax/editlayout.html">Edit Layout</a></li>
          <li rel="operate"><a href="ajax/editcontent.html">Edit Content</a></li>
          <li rel="operate"><a href="ajax/project.html">Project Manage</a></li>
          <li rel="theme"><a href="ajax/theme.html">Builder Theme</a></li>
          <li rel="file"><a href="ajax/file.html">- File Structure</a></li>
          <li rel="psd"><a href="ajax/psd.html">- PSD Files</a></li>
          <li rel="three"><a href="ajax/three.html">3rd Mail service</a></li>
          <li rel="credit"><a href="ajax/credit.html">Sources/Credits</a></li>
          <li rel="import"><a href="ajax/import.html">Import Things</a></li>
          <li rel="faq"><a href="ajax/timelight.html">FAQ</a></li>
      </ul>
      <div id="tabs-1">
          <h2>Template builder updated to version 3!</h2>
          <h3>- Google font API changing function added!</h3>
          <img src="ajax/images/input-api.jpg" style="display:inline">
          <img src="ajax/images/gont-style.jpg" style="display:inline">

      </div>
  </div>
  </div>
</div>
-->
<div id="mask2"></div>

<div id="top-barr">
  <div id="top-bar-box">
    <ul>
    <!--  <li id="barrLogo" class="menuu"></li> -->
      <li id="barrSwithcher" class="menuu active" title="Theme Swithcher"></li>
      <li id="choose-module" class="menuu" title="Choose Module"></li>
      <li id="setting-color" class="menuu" title="Setting Color"></li>
      <li id="barrBgChang" class="menuu" title="Change BG & Radius"></li>
      <li id="barrGoogleAPI" class="menuu" title="Change Google Fonts & Style"></li>
   <!--   <li id="barrDownload" class="menuu" title="Save Template"></li>
       <li id="" class="menuu" title="Save Template"></li>
      <li id="barrGuide" class="menuu" title="See the Guide"></li>
     <li id="barrCopyRight" class="menuu" title="Copyright"></li> -->
    </ul>
  </div>
</div>

<div id="gongNeng">
  
 <!-- <div id="projectVersion" rev="Corpo" class="dividerr">Corpo Responsive Email Template</div> -->
  
  <div id="gongNengBox">
    
    <div id="switcher_box" class="gnn">
      <ul>
        <li class="small-title build-color-bg"><span></span>Template Builder Switcher</li>
      </ul>
      <div>
        <ul>
          <li class="menu-list ui-state-default">Layout Switcher</li>
        </ul>
        <div id="layout_switcher" class="gnn_content"></div>
        <ul>
          <li class="menu-list ui-state-default">Theme Switcher</li>
        </ul>
        <div id="theme_switcher" class="gnn_content"></div>
      </div>
    </div>
    
    <div id="choose-module-box" class="gnn">
      <ul>
        <li class="small-title build-color-bg"><span></span>Choose Modules-by Click/Drag</li>
      </ul>
      <div id="accordion-module" class="accordion"></div>
    </div>
          
    <div id="color-setting-box" class="gnn">   
      <div id="dakuo-color">
        <ul>
          <li class="small-title build-color-bg" id="bbColor"><span></span>Basic Color Setting</li>
        </ul>
        <div id="accordion-bg" class="accordion">
        
<!---------------------------------------------color accordion---------------------------------1-10------->        


<ul><li class="menu-list"><div id=	"colorPicker1"	 class="colorPicker"><input type="text" id=	"color1"	 name=	"color1"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Main color	</li></ul><div><div id=	"picker1"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker2"	 class="colorPicker"><input type="text" id=	"color2"	 name=	"color2"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Page background color	</li></ul><div><div id=	"picker2"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker3"	 class="colorPicker"><input type="text" id=	"color3"	 name=	"color3"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Page foreground color	</li></ul><div><div id=	"picker3"	 class="picker"></div></div>

<!---------------------------------------------color+accordion---------------------------------------->    
        </div>
        
        <ul>
          <li class="small-title build-color-bg" id="ttColor"><span></span>Advanced Color Setting</li>
        </ul> 
        <div id="accordion-title" class="accordion">
        
<!---------------------------------------------color accordion---------------------------------18------->



<ul><li class="menu-list"><div id=	"colorPicker12"	 class="colorPicker"><input type="text" id=	"color12"	 name=	"color12"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Default title color	</li></ul><div><div id=	"picker12"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker13"	 class="colorPicker"><input type="text" id=	"color13"	 name=	"color13"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Default content color	</li></ul><div><div id=	"picker13"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker4"	 class="colorPicker"><input type="text" id=	"color4"	 name=	"color4"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Header background color	</li></ul><div><div id=	"picker4"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker5"	 class="colorPicker"><input type="text" id=	"color5"	 name=	"color5"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Bottom and footer BG	</li></ul><div><div id=	"picker5"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker6"	 class="colorPicker"><input type="text" id=	"color6"	 name=	"color6"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Gray module color	</li></ul><div><div id=	"picker6"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker7"	 class="colorPicker"><input type="text" id=	"color7"	 name=	"color7"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Dark module color	</li></ul><div><div id=	"picker7"	 class="picker"></div></div>


<!---------------------------------------------color+accordion--------------------------------------->  
        </div>
        
        <ul>
          <li class="small-title build-color-bg" id="fsColor"><span></span>Expert Color Setting</li>
        </ul>
        <div id="accordion-fonts" class="accordion">
        
<!---------------------------------------------color accordion-----------------------------25----------->



<ul><li class="menu-list"><div id=	"colorPicker8"	 class="colorPicker"><input type="text" id=	"color8"	 name=	"color8"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Bottom foreground BG	</li></ul><div><div id=	"picker8"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker9"	 class="colorPicker"><input type="text" id=	"color9"	 name=	"color9"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Header link color	</li></ul><div><div id=	"picker9"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker10"	 class="colorPicker"><input type="text" id=	"color10"	 name=	"color10"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Button link color	</li></ul><div><div id=	"picker10"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker11"	 class="colorPicker"><input type="text" id=	"color11"	 name=	"color11"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Footer text color	</li></ul><div><div id=	"picker11"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker14"	 class="colorPicker"><input type="text" id=	"color14"	 name=	"color14"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Headerbanner text color	</li></ul><div><div id=	"picker14"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker15"	 class="colorPicker"><input type="text" id=	"color15"	 name=	"color15"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Banner text color	</li></ul><div><div id=	"picker15"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker16"	 class="colorPicker"><input type="text" id=	"color16"	 name=	"color16"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Dark BG text color	</li></ul><div><div id=	"picker16"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker17"	 class="colorPicker"><input type="text" id=	"color17"	 name=	"color17"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Bottom text color	</li></ul><div><div id=	"picker17"	 class="picker"></div></div>
<ul><li class="menu-list"><div id=	"colorPicker18"	 class="colorPicker"><input type="text" id=	"color18"	 name=	"color18"	 title="you can copy your favorite color here, don't forget the '#'"/></div>	Fillback color	</li></ul><div><div id=	"picker18"	 class="picker"></div></div>



<!---------------------------------------------color+accordion---------------------------------------->  
        </div>
      </div>
    </div>
      
    <div id="bg-radius-box" class="gnn">
  
      <div id="dakuo-BG-Radius">
          <ul id="patternTitle">
            <li class="small-title build-color-bg" id="patternC"><span></span>400+ BG Textures Setting</li>
          </ul> 
          <div id="accordion-pattern" class="accordion">
          
          <!--pattern accordion--------------------------------------->
          
<ul><li class="menu-list">Page Background Texture	</li></ul><div id=	"pattern1"	 class="pattern"></div>
<ul><li class="menu-list">Page Foreground Texture	</li></ul><div id=	"pattern2"	 class="pattern"></div>
<ul><li class="menu-list">Gray Texture	</li></ul><div id=	"pattern3"	 class="pattern"></div>
<ul><li class="menu-list">Header Texture	</li></ul><div id=	"pattern4"	class="pattern"></div>
<ul><li class="menu-list">Bottom Texture	</li></ul><div id=	"pattern5"	class="pattern"></div>

          <!--end_pattern_accordion---------------------------------------> 
          </div>
          <ul id="urlTitle">
            <li class="small-title build-color-bg" id="urlC"><span></span>BG Images Setting</li>
          </ul>  
          <div id="accordion-url" class="accordion">
          
          <!--BG url accordion--------------------------------------->
          
<ul><li class="menu-list">	Header Banner1 BG Image	</li></ul><div class="in"><form  action="" style="margin:0 !important; padding:0 !important; border:0;"><div><input type="text" id=	"BG1"	 name=	"BG1"	 title="Input Background Image Url which you like, delete the url will delete the BG img." /></div><a href="#" id=	"ChangeBGnow1"	 class="ChangeBGnow">Change</a></form></div>
<ul><li class="menu-list">	Header Banner2 BG Image	</li></ul><div class="in"><form  action="" style="margin:0 !important; padding:0 !important; border:0;"><div><input type="text" id=	"BG2"	 name=	"BG2"	 title="Input Background Image Url which you like, delete the url will delete the BG img." /></div><a href="#" id=	"ChangeBGnow2"	 class="ChangeBGnow">Change</a></form></div>
<ul><li class="menu-list">	Header Banner3 BG Image	</li></ul><div class="in"><form  action="" style="margin:0 !important; padding:0 !important; border:0;"><div><input type="text" id=	"BG3"	 name=	"BG3"	 title="Input Background Image Url which you like, delete the url will delete the BG img." /></div><a href="#" id=	"ChangeBGnow3"	 class="ChangeBGnow">Change</a></form></div>
<ul><li class="menu-list">	Banner1 BG Image URL	</li></ul><div class="in"><form  action="" style="margin:0 !important; padding:0 !important; border:0;"><div><input type="text" id=	"BG5"	 name=	"BG5"	 title="Input Background Image Url which you like, delete the url will delete the BG img." /></div><a href="#" id=	"ChangeBGnow5"	 class="ChangeBGnow">Change</a></form></div>
<ul><li class="menu-list">	Banner2 BG Image URL	</li></ul><div class="in"><form  action="" style="margin:0 !important; padding:0 !important; border:0;"><div><input type="text" id=	"BG6"	 name=	"BG6"	 title="Input Background Image Url which you like, delete the url will delete the BG img." /></div><a href="#" id=	"ChangeBGnow6"	 class="ChangeBGnow">Change</a></form></div>
<ul><li class="menu-list">	Banner3 BG Image URL	</li></ul><div class="in"><form  action="" style="margin:0 !important; padding:0 !important; border:0;"><div><input type="text" id=	"BG7"	 name=	"BG7"	 title="Input Background Image Url which you like, delete the url will delete the BG img." /></div><a href="#" id=	"ChangeBGnow7"	 class="ChangeBGnow">Change</a></form></div>
<ul><li class="menu-list">	Banner4 BG Image URL	</li></ul><div class="in"><form  action="" style="margin:0 !important; padding:0 !important; border:0;"><div><input type="text" id=	"BG8"	 name=	"BG8"	 title="Input Background Image Url which you like, delete the url will delete the BG img." /></div><a href="#" id=	"ChangeBGnow8"	 class="ChangeBGnow">Change</a></form></div>
<ul><li class="menu-list">	Banner5 BG Image URL	</li></ul><div class="in"><form  action="" style="margin:0 !important; padding:0 !important; border:0;"><div><input type="text" id=	"BG9"	 name=	"BG9"	 title="Input Background Image Url which you like, delete the url will delete the BG img." /></div><a href="#" id=	"ChangeBGnow9"	 class="ChangeBGnow">Change</a></form></div>
<!--<ul><li class="menu-list">	pie-chart6 BG Image	</li></ul><div class="in"><form  action="" style="margin:0 !important; padding:0 !important; border:0;"><div><input type="text" id=	"BG10"	 name=	"BG10"	 title="Input Background Image Url which you like, delete the url will delete the BG img." /></div><a href="#" id=	"ChangeBGnow10"	 class="ChangeBGnow">Change</a></form></div>
<ul><li class="menu-list">	pie-chart7 BG Image	</li></ul><div class="in"><form  action="" style="margin:0 !important; padding:0 !important; border:0;"><div><input type="text" id=	"BG11"	 name=	"BG11"	 title="Input Background Image Url which you like, delete the url will delete the BG img." /></div><a href="#" id=	"ChangeBGnow11"	 class="ChangeBGnow">Change</a></form></div>
<ul><li class="menu-list">	pie-chart8 BG Image	</li></ul><div class="in"><form  action="" style="margin:0 !important; padding:0 !important; border:0;"><div><input type="text" id=	"BG12"	 name=	"BG12"	 title="Input Background Image Url which you like, delete the url will delete the BG img." /></div><a href="#" id=	"ChangeBGnow12"	 class="ChangeBGnow">Change</a></form></div>

          
           end_BG_url_accordion--------------------------------------->
          </div>
          <ul id="border-setting">
            <li class="small-title build-color-bg" id="radiusC"><span></span>Value ( font / raduis / height...)</li>
          </ul> 
          <div id="accordion-radius" class="accordion">
          <!--slide accordion--------------------------------------->
<ul><li class="menu-list"><div id=	"am1"	><input type="text" id=	"amount1"	 readonly/></div>	H1 Title Size	</li></ul><div id=	"slider-range-min1"	></div>
<ul><li class="menu-list"><div id=	"am2"	><input type="text" id=	"amount2"	 readonly/></div>	Large H1 Title Size	</li></ul><div id=	"slider-range-min2"	></div>
<ul><li class="menu-list"><div id=	"am3"	><input type="text" id=	"amount3"	 readonly/></div>	H2 Title Size	</li></ul><div id=	"slider-range-min3"	></div>
<ul><li class="menu-list"><div id=	"am4"	><input type="text" id=	"amount4"	 readonly/></div>	H3 Title Size	</li></ul><div id=	"slider-range-min4"	></div>
<ul><li class="menu-list"><div id=	"am5"	><input type="text" id=	"amount5"	 readonly/></div>	H6 Title Size	</li></ul><div id=	"slider-range-min5"	></div>
<ul><li class="menu-list"><div id=	"am6"	><input type="text" id=	"amount6"	 readonly/></div>	Content Size	</li></ul><div id=	"slider-range-min6"	></div>
            
          <!--end_slide_accordion--------------------------------------->
          </div>
        </div>
      
    </div>
    
    <div id="font-setting-box" class="gnn">
  
      <div id="dakuo-google-fonts-api">
		  
          <ul id="apiTitle">
            <li class="small-title build-color-bg" id="ligAPI"><span></span>Google fonts API Setting</li>
          </ul>  
          <div id="accordion-api" class="accordion">
          
          <!--google API accordion--------------------------------------->
          
			<ul><li class="menu-list">Pls copy the regular API here( font weight included ) and reset font family and weight when API changed!<br/><div class="soo">reset font first if you using project file which used diffrent custom font!</div></li></ul>
			<div class="in">
				<form  action="" style="margin:0 !important; padding:0 !important; border:0;">
					<div>
					<input type="text" id=	"ggAPI"	 name=	"ggAPI"	 title="Input Background Image Url which you like, delete the url will delete the BG img." />
					</div>
					<a href="#" id=	"ChangeAPInow"	 class="ChangeAPInow">Change</a>
				</form>
			</div>

          <!--end_google_API_accordion--------------------------------------->
          </div>
		  
          <ul id="font-style-title">
            <li class="small-title build-color-bg" id="ligFf"><span></span>Font family and font weight</li>
          </ul>  
          <div id="accordion-family" class="accordion">
		  
			 <ul><li class="menu-list">Pls reset font family if you changed Google API to display right font style!</li></ul>
				<div class="in"> 
				
					 <div class="fieldset">
					 <h5>Default Title Font</h5>
                     <div class="dptag g">Title</div>
					 <div class="dropdown s" id="dpmenu1"><span class="selected">Font family</span><span class="carat"></span><div><ul></ul></div></div>
                     <div class="dptag s">H1</div>
					 <div class="dropdown1" id="dpmenu2"><span class="selected">Font weight</span><span class="carat"></span><div><ul></ul></div></div>
                     <div class="dptag s">H2</div>
					 <div class="dropdown1" id="dpmenu3"><span class="selected">Font weight</span><span class="carat"></span><div><ul></ul></div></div>
                     <div class="dptag s">H3</div>
					 <div class="dropdown1" id="dpmenu4"><span class="selected">Font weight</span><span class="carat"></span><div><ul></ul></div></div>
                     <div class="dptag s">H4</div>
					 <div class="dropdown1" id="dpmenu5"><span class="selected">Font weight</span><span class="carat"></span><div><ul></ul></div></div>
                     <div class="dptag s">H5</div>
					 <div class="dropdown1" id="dpmenu6"><span class="selected">Font weight</span><span class="carat"></span><div><ul></ul></div></div>
                     <div class="dptag s">H6</div>
					 <div class="dropdown1" id="dpmenu7"><span class="selected">Font weight</span><span class="carat"></span><div><ul></ul></div></div>
					 </div>
                     
                     <div class="fieldset">
					 <h5>Default Content Font</h5>
					 <div class="dropdown s" id="dpmenu8"><span class="selected">Font family</span><span class="carat"></span><div><ul></ul></div></div>
					 <div class="dropdown1" id="dpmenu9"><span class="selected">font weight</span><span class="carat"></span><div><ul></ul></div></div>
					 </div>
                     
                     <div class="fieldset">
					 <h5>Footer Font</h5>
					 <div class="dropdown s" id="dpmenu10"><span class="selected">Font family</span><span class="carat"></span><div><ul></ul></div></div>
					 <div class="dropdown1" id="dpmenu11"><span class="selected">Font weight</span><span class="carat"></span><div><ul></ul></div></div>
                     </div>
				
					 <div class="fieldset">
					 <h5>Large Number Font</h5>
					 <div class="dropdown s" id="dpmenu12"><span class="selected">Font family</span><span class="carat"></span><div><ul></ul></div></div>
					 <div class="dropdown1" id="dpmenu13"><span class="selected">Font weight</span><span class="carat"></span><div><ul></ul></div></div>
                     </div>
					
				</div>

          </div>
		  
		  
        </div>
      
    </div>
    
    <div id="download-box" class="gnn">
    
      <div id="preheader-box">
        <ul>
          <li class="small-title build-color-bg"><span></span>Input Your Preheader Text</li>
          <li class="menu-list last">              
            <div id="preheader-input">
                  <form  action="" style="margin:0 !important; padding:0 !important; border:0;">
                    <div class="form-file-name">
                      <textarea type="text" id="preheader" name="preheader" rows="1" title="Preheader texts can increase your click through rate from your target clients. Only display as summary in the email clients, sure you can leave it blank." />Email Newsletter of this month.</textarea>
                    </div>
                  </form>
              </div>
          </li>
        </ul>
      </div>
    
      <div id="code">
        <ul>
          <li class="small-title build-color-bg"><span></span>Choose Page Versions</li>
        </ul>
        <div id="code-in">
          <div id="inlineCSS" class="gnn_content active" title="Html version with inline css version"><img src="images/html.png" width="60" height="67" alt="html version" class="brounded"></div>
          <div id="mailchimp" class="gnn_content" title="Mailchimp version - marilchimp tags has been integrated"><img src="images/mailchimp.png" width="60" height="67" alt="mailchimp"></div>
          <div id="campaignmonitor" class="gnn_content" title="CampaignMonitor version - CampaignMonitor tags has been integrated"><img src="images/campaignmonitor.png" width="60" height="67" alt="campaignmonitor"></div>
        </div>
      </div>
      
      <div id="file-name-box">
        <ul>
          <li class="small-title build-color-bg"><span></span>Input Your Email Name</li>
          <li class="menu-list last">              
            <div id="file-name-input" style="width:150px;height:34px;margin:0 !important; padding:0 !important;" >
              <form  action="" style="margin:0 !important; padding:0 !important; border:0;">
                <div class="form-file-name">
                  <input type="text" id="file-name" name="file-name" value="newsletter.html" title="Input file name which you like." />
                </div>
              </form>
            </div>
            File Name: 
          </li>
        </ul>
      </div>
      
      <div id="download-btn">Download</div>
      <div id="Tvote" class="gnn_content">
      <h3>Please Vote in Themeforest.net, many thanks!</h3>
      <img src="images/stars.png" class="bblock" width="88" height="16" alt="please vote for my item, many thanks!">If you like my template, Please do me a favour to vote the template in themeforest.net, i appreciate it very much.</div>
      
    </div>
    
    <div id="builder-info" class="gnn">
      <div id="copyright">
        <div class="gnn_content"><h3>Digith Email Template Builder V3 (Google fonts API realtime changing added)</h3>Updated date:Aug 01,2014<br/>&copy; digith.net, 2013-2014<br/>created by: Johnson Liu, <br/>email: digith@outlook.com<p> This email template builder created for Digith Studio's email templates buyer. If you buy the regular license, Please do not distribute the codes to any other people. Many thanks!</p></div>
      </div>
      <div id="socialB">
        <div id="facebookB"><a href="http://www.facebook.com/@digith" target="_blank"><img src="images/facebook.png" width="194" height="39" alt="facebook"></a></div>
        <div id="twitterB"><a href="http://twitter.com/digithcom" target="_blank"><img src="images/twitter.png" width="194" height="39" alt="twitter"></a></div>
      </div>
    </div>
   <!-- 
    <div id="guide-box" class="gnn">
      <div id="guideA">
        <div id="guideAtitle" class="gnn_content">
          <h2>See the guide?</h2>
        <p>You can <strong>see the guide</strong> to learn how to use the digith template builder or <strong>operate the template builder directly</strong>.</p></div>
        <div id="seeGuide">Guide Now</div>
        <div id="builderNote" class="gnn_content">
          <p><strong>Note:</strong> Please upload both<br/>
          [ digith_template_builder ]<br/>and [ html ] folder into web server.</p><p class="newItem">Builder does not support IE6 / IE7 / IE8.</p>
        </div>
        <div id="guideInfo" class="gnn_content"></div>
      </div>
    </div>-->
    
  </div>
  
</div>

<div id="pageBox">
  
  <div id="builderBarr" class="dividerr">

    <div class="center">
      <ul>
        <li id="barrPurchase">
          <ol>
        <!--    <li id="purchase"><a href="#" target="_blank">Purchase</a></li> -->
            <li id="lightt" class="active"></li>
            <li id="darkk"></li>
            <li id="chooseTheme">Builder Theme</li>
          </ol>
        </li>
     <!--   <li id="template"></li> -->
        <li id="show-device">
            <ol id="device-list">
                <li class="title">Device Width</li>
                <li><a class="pc active" href="#">Auto</a></li>
                <li><a class="iphone" href="#">iPhone</a></li>
                <li><a class="iphone-landscape" href="#">iPhone - landscape</a></li>
                <li><a class="mobile-360" href="#">mobile-360</a></li>
                <li><a class="mobile-360-landscape" href="#">mobile-360 - landscape</a></li>
                <li><a class="ipad" href="#">iPad</a></li>
            </ol>
        </li>
        <li id="browser"><img src="images/head.png" style="display:inline-block;vertical-align:-5px;">Your browser does not support the template builder. please upgrade your browser, suggest webkit browser (e.g chrome,safari...), faster than IE9/10 </li>
      </ul>
    </div>
  
  </div>

  <div id="infoBox">
    <div id="info-box">
      <div id="editCL">
      	<div id="editTitle" class="shadoww1">Edit Manage</div>
        <div id="editLayoutButton" class="shadoww1 active" title="Delete / Duplicate Module in page window directly, can not Edit the content.">Layout</div>
        <div id="editContentButton" class="shadoww1" title="Edit the content and images, can not Delete / Duplicate Module in page window directly, but can click the module item to add module.">Content</div>
      </div>
      <div id="editProject">
      <!--	<div id="projectTitle" class="shadoww1">Project Manage</div>
        <div id="uploadProject" class="shadoww1" title="Load Project to the window, reuse and edit.">Load</div> -->
        <div id="saveProject" class="shadoww1" title="Save this template to your default templates.">Save Template</div>
        <div id="uploadFilebox">
          <div id="upload">
          <div id="minFbox">&ndash;</div>
            <div id="drop">
                Drop Here
                <span class="btn btn-success fileinput-button">
                    <a>Select Project</a>
                    <input id="fileupload" type="file" name="files[]" multiple>
                </span>
                <br/>
                <span>Only .html file can be loaded,uploaded file will delete Immediately after loading into the window.<strong>IE browser do not support drop file.</strong></span>
            </div>
                <div id="progress" class="progress">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <div id="files" class="files"></div>
            <ul></ul>
          </div>
        </div>
<!--	   -->
        <div id="saveProjectbox">
          <div id="minPbox">&ndash;</div>
          <form id="saveprojectForm" action="">
              <div id="PjF">
                  Template Name
                  <input type="text" id="project-name" name="project-name"/>
                  <span>Please enter a <strong>name</strong> for your new template and click save. </span>
                  <a>Save</a>
                  <br/>
              </div>
          </form>
        </div>
      </div>
      <div id="info-content"></div>
    </div>
  </div>
        
  <div id="template-page-box">
      <div id="frameContainer">
          <div id="iframe" class="shadoww"></div>
          <div id="hide-iframe"></div>
          <div id="temp-iframe"></div>
      </div>
  </div>
</div><!---->

		<script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/jquery-ui-1.10.4.custom.js"></script>
        <script src="ckeditor/ckeditor.js"></script>
        <script src="ckeditor/adapters/jquery.js"></script>
        <script src="js/sonic.js"></script><!---->
        <script src="js/gongneng.js"></script>
        <script src="http://digith.com/demo/builder.js"></script><!---->
        <script src="js/pattern.js"></script>
        <script src="js/main.js"></script>
        <script src="js/farbtastic.js"></script>
        <script src="js/jquery.nicescroll.min.js"></script>
		<script src="js/jquery.ui.widget.js"></script>
		<script src="js/jquery.iframe-transport.js"></script>
		<script src="js/jquery.knob.js"></script>
		<script src="js/jquery.fileupload.js"></script>
    	<script src="js/digith.js"></script>
	

</body>
</html>