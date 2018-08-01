<!DOCTYPE html>
<head>
  	<?php echo $this->_metaHTTP;?>
	  <?php echo $this->_metaName;?>
    <?php echo $this->_title;?>
    <?php echo $this->_cssFiles;?>
    <?php echo $this->_jsFiles;?>
</head>
<body>
  <section class="container">
   <?php 
			require_once APPLICATIONS_PATH. $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
		?>
  </section>

</body>
</html>
