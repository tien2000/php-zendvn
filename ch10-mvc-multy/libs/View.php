<?php 
class View{
    public $_moduleName;
    public $_templatePath;
    public $_title;
    public $_metaHTTP;
    public $_metaName;
    public $_cssFiles;
    public $_jsFiles;
    public $_dirImg;
    public $_fileView;

    public function __construct($moduleName) {
        $this->_moduleName = $moduleName;
    }

    public function render($fileInclude, $loadFull = true){
        $path = APPLICATIONS_PATH . $this->_moduleName . DS .'views' . DS . $fileInclude . '.php';
        if (file_exists($path)) {
            if ($loadFull == true) {
                $this->_fileView = $fileInclude;
                require_once $this->_templatePath;
            } else {
                require_once $path;
            }            
        } else {
            echo "<h3>". __METHOD__ ." : Error</h3>";
        }
        
    }

    // Thiết lập đường dẫn đến Template
    public function setTemplatePath($path){
        $this->_templatePath = $path;
    }

    // GET TITLE
    public function getTitle($title){
        return '<title>'. $title .'</title>';
    }

    // SET TITLE
    public function setTitle($title){
        $this->_title = '<title>'. $title .'</title>';
    }

    // CREATE (CSS | JS)
    public function createLink($dir, $files, $type = 'css'){
        $xhtml = '';
        if (!empty($files)) {
            $path = TEMPLATE_URL . $dir . DS;
            foreach ($files as $file) {
                if ($type == 'css') {
                    $xhtml .= '<link rel="stylesheet" href="'. $path . $file .'">';
                } else if ($type == 'js'){
                    $xhtml .= '<script src="'. $path . $file .'"></script>';
                }
            }
        }
        return $xhtml;
    }

    // CREATE META (NAME | HTTP)
    public function createMeta($arrMeta, $typeMeta = 'name'){
        $xhtml = '';
        if (!empty($arrMeta)) {
            foreach ($arrMeta as $meta) {
                $temp = explode("|", $meta);

                $xhtml .= '<meta '. $typeMeta .'="'. $temp[0] .'" content="'. $temp[1] .'">';
            }
        }
        return $xhtml;
    }

    public function appendFile($arrFile, $type = 'css'){
        if (!empty($arrFile)) {
            foreach ($arrFile as $file) {
                $file = APPLICATIONS_URL . $this->_moduleName . DS . 'views' . DS . $file;
                if ($type == 'css') {
                    $this->_cssFiles .= '<link rel="stylesheet" href="'.  $file .'">';
                } else if ($type == 'js'){
                    $this->_jsFiles .= '<script src="'. $file .'"></script>';
                }                
            }
        }
    }
}
?>