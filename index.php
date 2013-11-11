<?php

defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;
$user = JFactory::getUser();
$userToken = JSession::getFormToken();

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/custom.css');

// Load optional rtl Bootstrap css and Bootstrap bugfixes
JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction);

// Add current user information
$user = JFactory::getUser();

// Adjusting content width
if ($this->countModules('left') && $this->countModules('right'))
{
	$span = "span6";
}
elseif ($this->countModules('left') && !$this->countModules('right'))
{
	$span = "span9";
}
elseif (!$this->countModules('left') && $this->countModules('right'))
{
	$span = "span9";
}
else
{
	$span = "span12";
}

// Adjusting navigation width
if ($this->countModules('search'))
{
	$nav = "span8";
}
else
{
	$nav = "span12";
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	<?php
	// Use of Google Font
	if ($this->params->get('googleFont'))
	{
	?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName');?>' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title{
				font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName'));?>', sans-serif;
			}
		</style>
	<?php
	}
	?>
<script src="templates/<?php echo $this->template; ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="templates/<?php echo $this->template; ?>/js/Scouts_500.font.js" type="text/javascript"></script>
<script type="text/javascript">
  Cufon.replace('h1,h2,h3');
  //If you also include a library, you can add complex selectors like #content h1
</script>
	<?php
	// Template color
	if ($this->params->get('templateColor'))
	{
	?>
	<style type="text/css">
	body.bg { background-color: <?php echo $this->params->get('templateBackgroundColor');?> }
	#header { background: <?php echo $this->params->get('templateColor');?>; border-bottom: 10px solid <?php echo $this->params->get('templateSecondColor');?>; }
	#header h1 { color: <?php echo $this->params->get('templateHeaderFontColor');?>; }
	h1 { color: <?php echo $this->params->get('templateColor');?>; }
	h2 { color: <?php echo $this->params->get('templateColor');?>; }
	h3 { color: <?php echo $this->params->get('templateColor');?>; }
	#search { background: <?php echo $this->params->get('templateMenuColor');?>; }
	#footer { background: <?php echo $this->params->get('templateColor');?>; border-top: 10px solid <?php echo $this->params->get('templateSecondColor');?>; color: <?php echo $this->params->get('footerTextColor');?>; }
	#footer a { color: <?php echo $this->params->get('templateHeaderFontColor');?>; }
	.navbar .navbar-inner { background: <?php echo $this->params->get('templateColor');?>; }
	.navbar .nav .active > a { background: <?php echo $this->params->get('templateMenuColor');?>; color: <?php echo $this->params->get('templateMenuTextColor');?>; /*border-right: 2px solid <?php echo $this->params->get('templateColor');?> !important;*/ }		
	.navbar .nav .active > a:hover { background: <?php echo $this->params->get('templateMenuColor');?>; color: <?php echo $this->params->get('templateMenuTextColor');?>; /*border-right: 2px solid <?php echo $this->params->get('templateColor');?> !important;*/ }		
	.navbar .nav > li > a { background: <?php echo $this->params->get('templateSecondColor');?>; color: <?php echo $this->params->get('templateMenuTextColor');?>; /*border-right: 2px solid <?php echo $this->params->get('templateColor');?> !important;*/ }		
	.navbar .nav > li > a:hover { background: <?php echo $this->params->get('templateMenuColor');?>; /*border-right: 2px solid <?php echo $this->params->get('templateColor');?> !important;*/ }	
	.in-out { background: <?php echo $this->params->get('loginColor');?> !important; }
	.fred { background: <?php echo $this->params->get('templateMenuColor');?> !important; }	
/*	.search { background: <?php echo $this->params->get('templateSecondColor');?>; border: <?php echo $this->params->get('templateSecondColor');?>; }
	input#mod-search-searchword.inputbox.search-query { border: 2px solid <?php echo $this->params->get('templateColor');?>; background: <?php echo $this->params->get('templateColor');?>; } */
	.content { background: <?php echo $this->params->get('contentbgColor');?>; }
	.breadcrumb { background: <?php echo $this->params->get('templateMenuColor');?>; }
	.breadcrumb li { color: <?php echo $this->params->get('templateColor');?>; }
	.breadcrumb li a { color: <?php echo $this->params->get('templateHeaderFontColor');?>; }
	.breadcrumb .divider { color: <?php echo $this->params->get('templateColor');?>; }
	.bottom h3 { /*color: <?php echo $this->params->get('templateSecondColor');?>;*/ color: <?php echo $this->params->get('templateColor');?>; }
	.bottom { border: solid 5px <?php echo $this->params->get('templateSecondColor');?>; background: <?php echo $this->params->get('templateBackgroundColor');?>; }
	a { color: <?php echo $this->params->get('templateColor');?>; }
	</style>
	<?php
	}
	?>
	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
	<![endif]-->
</head>
<body data-spy="scroll" data-target=".navbar" class="bg" >
	<!-- Begin Header -->
	<div id="header" class="navbar<?php echo ($params->get('fixedHeader') ? ' navbar-fixed-top' : '');?>">
		<div class="navbar-inner">
			<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
					<?php if ($this->params->get('1stlogo')) : ?>                	
					<!-- Begin Left Logo -->
                    <a class="brand pull-left" href="<?php echo $this->baseurl; ?>">
						<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/logo/<?php echo $this->params->get('logoOption');?>.png" alt="logo" class="logo" />
                    </a>
                    <!-- End Left Logo -->
					<?php endif; ?>
					<?php if ($this->params->get('logoFile')) : ?>
					<!-- Begin Custom Left Logo -->
                    <a class="brand pull-left" href="<?php echo $this->baseurl; ?>">                    
                        <img src="<?php echo $this->baseurl;?>/<?php echo $this->params->get('logoFile')?>" alt="<?php echo $app->getCfg ('sitename'); ?>" />
                    </a>
                    <!-- End Custom Left Logo -->
					<?php endif; ?>
                    <a class="brand pull-left" href="<?php echo $this->baseurl; ?>">
          				<h1><?php $app = JFactory::getApplication(); echo $app->getCfg ('sitename'); ?></h1>
					</a>
					<?php if ($this->params->get('2ndlogo')) : ?>
                    <!-- Begin Right Logo -->
                    <a class="brand pull-left" href="<?php echo $this->baseurl; ?>">
						<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/logo/<?php echo $this->params->get('rightlogo');?>.png" alt="logo" class="logo" />
					</a>
					<!-- End Right Logo -->
					<?php endif; ?>
					<?php if ($this->params->get('rightcustom')) : ?>
                    <!-- Begin Custom Right Logo -->
                    <a class="brand pull-left" href="<?php echo $this->baseurl; ?>">                    
                        <img src="<?php echo $this->baseurl;?>/<?php echo $this->params->get('rightcustom')?>" alt="<?php echo $app->getCfg ('sitename'); ?>" />
                    </a>
					<!-- End Custom Right Logo -->
					<?php endif; ?>
                    <?php if ($this->params->get('login')) : ?>
                    <div class="pull-right">
                    <ul class="nav menutop">
						<li>
						<?php if ($user->id == 0){   
							echo '<a class="in-out" href="'.$this->baseurl.'/index.php/login">Login</a>';} 
						else {   
							echo '<a class="in-out" href="'.$this->baseurl.'/index.php?option=com_users&task=user.logout&'.$userToken.'=1">Logout</a>';} 
						?>
                        </li>
                    </ul>
                    </div>
                    <?php endif; ?>
					<?php if ($this->countModules('status')) : ?>
					<!-- Begin Menu -->
					<div class="status pull-right">
						<jdoc:include type="modules" name="status" style="none" />
					</div>
					<!-- End Menu -->
					<?php endif; ?>
                <div class="divide row">&nbsp;</div>
				<!-- Begin Main Menu -->
				<div class="nav-collapse">
					<jdoc:include type="modules" name="navbar" style="none" />
				</div>
				<!-- End Main Menu -->
				<?php if ($this->countModules('search')) : ?>
				<!-- Begin Search -->
				<div id="search" class="pull-right">
					<jdoc:include type="modules" name="search" style="none" />
				</div>
				<!-- End Search -->
				<?php endif; ?>            
			</div>
		</div>
	</div>
	<!-- End Header -->
	<!-- Begin Content -->    
    <div id="wrap" class="<?php echo ($params->get('fixedHeader') ? 'wrap-fixed-top' : '');?> <?php echo ($params->get('fixedFooter') ? 'wrap-fixed-bottom' : '');?>">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?> <?php echo ($params->get('contentbg') ? 'content' : '');?>">
			<div class="row-fluid">
				<?php if ($this->countModules('left')) : ?>
				<!-- Begin Left Sidebar -->
				<div id="sidebar-left" class="span3">
					<div class="sidebar-nav">
						<jdoc:include type="modules" name="left" style="xhtml" />
					</div>
				</div>
				<!-- End Left Sidebar -->
				<?php endif; ?>
				<div id="content" class="<?php echo $span;?>">
					<!-- Begin Content -->
					<jdoc:include type="modules" name="message" style="xhtml" />
					<jdoc:include type="message" />
					<jdoc:include type="modules" name="above" style="none" />
					<jdoc:include type="component" />
					<jdoc:include type="modules" name="banner" style="none" />
					<!-- End Content -->
				</div>
				<?php if ($this->countModules('right')) : ?>
				<!-- Begin Right Sidebar -->
				<div id="sidebar-right" class="span3">
					<div class="sidebar-nav">
						<jdoc:include type="modules" name="right" style="xhtml" />
                   	</div>
				</div>
				<!-- End Right Sidebar -->
				<?php endif; ?>
			</div>
		</div>
		<div id="push"></div>
	</div>
	<!-- End Content -->          
	<div class="clr"></div>
	<!-- Begin Footer -->    
	<div id="footer" class="<?php echo ($params->get('fixedFooter') ? 'navbar navbar-fixed-bottom' : '');?>">
		<?php if ($this->countModules('breadcrumbs')) : ?>
		<!-- Breadcrumbs -->      
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">      
           <jdoc:include type="modules" name="breadcrumbs" style="none" />
        </div>
		<?php endif; ?>        
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">      
			<div class="row-fluid">
           		<?php if ($this->countModules('bottom-1')) : ?>
				<!-- Bottom 1 -->      
    	    	<div class="bottom span4">
        	    	<jdoc:include type="modules" name="bottom-1" style="xhtml" />
            	</div>
				<?php endif; ?>       
				<?php if ($this->countModules('bottom-2')) : ?>
				<!-- Bottom 2 -->      
	        	<div class="bottom span4">
    	        	<jdoc:include type="modules" name="bottom-2" style="xhtml" />
        	    </div>
				<?php endif; ?>       
        		<?php if ($this->countModules('bottom-3')) : ?>
				<!-- Bottom 3 -->                      
	        	<div class="bottom span4">
    	        	<jdoc:include type="modules" name="bottom-3" style="xhtml" />
        	    </div>
				<?php endif; ?>                       
			</div>
            <div class="row-fluid">
	          	<div class="copyright span12">
    	    		<jdoc:include type="modules" name="footer" /><br />          
			        <a href="http://www.joomla.org" target="_blank">Joomla!</a> is Free Software released under the <a href="http://www.gnu.org/licenses/gpl-2.0.html">GNU/GPL License</a>. - Joomla! <?php echo  JText::_('Version') ?> <?php echo  JVERSION; ?><br /><br />
        		</div>

	        </div>
        </div>
                  		<div style="clear:both"></div>
        </div>
	<jdoc:include type="modules" name="debug" style="none" />
    </div>
	<!-- End Footer -->
  </body>
</html>