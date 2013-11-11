<?php

defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/custom.css');

// Adjusting content width
if ($this->countModules('left-off'))
{
	$span = "span6";
}

else
{
	$span = "span9";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
<script src="templates/<?php echo $this->template; ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="templates/<?php echo $this->template; ?>/js/Scouts_500.font.js" type="text/javascript"></script>
<script type="text/javascript">
  Cufon.replace('h1,h2');
  //If you also include a library, you can add complex selectors like #content h1
</script>
	<?php
	// Template color
	if ($this->params->get('templateColor'))
	{
	?>
	<style type="text/css">
		body.bg
		{
			background-color: <?php echo $this->params->get('templateBackgroundColor');?>
		}
		.header
		{
			background: <?php echo $this->params->get('templateColor');?>;
			border-bottom: 10px solid <?php echo $this->params->get('templateSecondColor');?>;
		}
		.header h1 
		{
			color: <?php echo $this->params->get('templateHeaderFontColor');?>;
		}
		#footer
		{
			background: <?php echo $this->params->get('templateColor');?>;
			border-top: 10px solid <?php echo $this->params->get('templateSecondColor');?>;
			position: fixed;
		}
		.menutop li.active > .item 
		{
			background: <?php echo $this->params->get('templateSecondColor');?>;
			border: <?php echo $this->params->get('templateSecondColor');?>;			
		}
		.nav > li > a:hover
		{
			background: <?php echo $this->params->get('templateSecondColor');?>;		
		}
		.nav-tabs > li > a:hover
		{
			border-color: <?php echo $this->params->get('templateSecondColor');?>;
			color: #000000;		
		}
		.nav-tabs > .active > a
		{
			background: <?php echo $this->params->get('templateSecondColor');?>;				
			border: 1px solid <?php echo $this->params->get('templateSecondColor');?>;
		}
		.nav-tabs > .active > a:hover
		{
			background: <?php echo $this->params->get('templateColor');?>;	
			border: 1px solid <?php echo $this->params->get('templateSecondColor');?>;
			color: #FFFFFF;						
		}		
		.search
		{
			background: <?php echo $this->params->get('templateSecondColor');?>;
			border: <?php echo $this->params->get('templateSecondColor');?>;
		}
/*		input#mod-search-searchword.inputbox.search-query
		{
			border: 2px solid <?php echo $this->params->get('templateColor');?>;
			background: <?php echo $this->params->get('templateColor');?>;
		}
*/		.breadcrumb
		{
			background: <?php echo $this->params->get('templateSecondColor');?>;
			/**height: 40px;
			margin-top: 30px;
			-webkit-box-shadow: 0 3px 5px rgba(0,0,0,0.25);**/
		}
		.bottom h3
		{
			/*color: <?php echo $this->params->get('templateSecondColor');?>;*/
			color: <?php echo $this->params->get('templateColor');?>;			
		}
		.bottom
		{
			border: solid 5px <?php echo $this->params->get('templateSecondColor');?>;
			background: <?php echo $this->params->get('templateBackgroundColor');?>;
		}

		a
		{
			color: <?php echo $this->params->get('templateColor');?>;
		}
		.navbar-inner, .nav-list > .active > a, .nav-list > .active > a:hover, .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover,
		.btn-primary
		{
			background: <?php echo $this->params->get('templateColor');?>;
		}
		.navbar-inner
		{
			-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
		}
	</style>
	<?php
	}
	?>
</head>
  <body class="bg">
	<!-- Body -->
	<div class="body">
			<!-- Header -->
			<div class="header">
				<div class="header-inner clearfix">
					<a class="brand pull-left" href="<?php echo $this->baseurl; ?>">
						<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/logo/<?php echo $this->params->get('logoOption');?>.png" alt="logo" class="logo" />
                    </a>
                    <a class="brand pull-left" href="<?php echo $this->baseurl; ?>">
          				<h1><?php $app = JFactory::getApplication(); echo $app->getCfg ('sitename'); ?></h1>
					</a>
				</div>
			<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">
				<div class="row-fluid">
				<!-- Navigation -->
				<div class="navigation">
				</div>
				</div>
            </div>
			</div>

			<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">
				<div class="row-fluid">
					<?php if ($this->countModules('left-off')) : ?>
					<!-- Begin Left Sidebar -->
					<div id="sidebar-left" class="span3">
						<div class="sidebar-nav">
							<jdoc:include type="modules" name="left-off" style="xhtml" />
						</div>
					</div>
					<!-- End Left Sidebar -->
					<?php endif; ?>
					<div id="content" class="<?php echo $span;?>">
						<!-- Begin Content -->
						<jdoc:include type="modules" name=",message" style="xhtml" />
						<jdoc:include type="message" />
	<?php if ($app->getCfg('display_offline_message', 1) == 1 && str_replace(' ', '', $app->getCfg('offline_message')) != '') : ?>
		<h1>
			<?php echo $app->getCfg('offline_message'); ?>
		</h1>
	<?php elseif ($app->getCfg('display_offline_message', 1) == 2 && str_replace(' ', '', JText::_('JOFFLINE_MESSAGE')) != '') : ?>
		<h1>
			<?php echo JText::_('JOFFLINE_MESSAGE'); ?>
		</h1>
	<?php  endif; ?>

						<jdoc:include type="modules" name="banner" style="none" />
						<!-- End Content -->
					</div>

					<!-- Begin Right Sidebar -->
					<div id="sidebar-right" class="span3">
						<div class="sidebar-nav">
	<form action="<?php echo JRoute::_('index.php', true); ?>" method="post" id="form-login">
	<fieldset class="input">
		<p id="form-login-username">
			<h1><label for="username"><?php echo JText::_('JGLOBAL_USERNAME') ?></label></h1>
			<input name="username" id="username" type="text" class="inputbox" alt="<?php echo JText::_('JGLOBAL_USERNAME') ?>" size="18" />
		</p>
		<p id="form-login-password">
			<h1><label for="passwd"><?php echo JText::_('JGLOBAL_PASSWORD') ?></label></h1>
			<input type="password" name="password" class="inputbox" size="18" alt="<?php echo JText::_('JGLOBAL_PASSWORD') ?>" id="passwd" />
		</p>
		<p id="form-login-remember">
			<h1><label for="remember"><?php echo JText::_('JGLOBAL_REMEMBER_ME') ?></label></h1>
			<input type="checkbox" name="remember" class="inputbox" value="yes" alt="<?php echo JText::_('JGLOBAL_REMEMBER_ME') ?>" id="remember" />
		</p>
		<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGIN') ?>" />
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.login" />
		<input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()) ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</fieldset>
	</form>
							<jdoc:include type="modules" name="right-off" style="well" />
                    	</div>
					</div>
					<!-- End Right Sidebar -->

				</div>
	          </div>          
          <div class="clr"></div>

      <div id="footer">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">      
			<div class="row-fluid">
           		<?php if ($this->countModules('off-1')) : ?>
				<!-- Bottom 1 -->      
    	    	<div class="bottom span4">
        	    	<jdoc:include type="modules" name="off-1" style="xhtml" />
            	</div>
				<?php endif; ?>       
				<?php if ($this->countModules('off-2')) : ?>
				<!-- Bottom 2 -->      
	        	<div class="bottom span4">
    	        	<jdoc:include type="modules" name="off-2" style="xhtml" />
        	    </div>
				<?php endif; ?>       
        		<?php if ($this->countModules('off-3')) : ?>
				<!-- Bottom 3 -->                      
	        	<div class="bottom span4">
    	        	<jdoc:include type="modules" name="off-3" style="xhtml" />
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

  </body>
</html>
