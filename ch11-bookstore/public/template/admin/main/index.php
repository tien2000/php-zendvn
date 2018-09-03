<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <?php echo $this->_metaHTTP;?>
    <?php echo $this->_metaName;?>
    <?php echo $this->_cssFiles;?>
    <?php echo $this->_jsFiles;?>
    <title><?php echo $this->_title;?></title>
</head>
    <?php 
        include_once "html/header.php";
    ?>
    <!-- BEGIN LOAD CONTENT -->
    <?php 
        require_once MODULE_PATH . $this->_moduleName . DS .'views' . DS . $this->_fileView . '.php';
    ?>
    <!-- END LOAD CONTENT -->
    <?php 
        include_once "html/footer.php";
    ?>
    