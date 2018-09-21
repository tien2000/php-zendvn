<?php 
class Pagination{    
    private $_totalItems;            // Tổng số phần tử.
    
    private $_itemsPerPage  = 1;     // Tống số phần tử trên 1 trang.    
    
    private $_pageRange     = 5;     // Số trang xuất hiện.    
    
    private $_totalPage;             // Tổng số trang
    
    private $_currentPage   = 1;     // Trang hiện tại.
    
    public function __construct($totalItems, $pagination) {
       $this->_totalItems   = $totalItems;
       $this->_itemsPerPage = $pagination['totalItemsPerPage'];

       if($pagination['pageRange'] % 2 == 0) $pagination['pageRange'] = $pagination['pageRange'] + 1;

       $this->_pageRange    = $pagination['pageRange'];
       $this->_currentPage  = $pagination['currentPage'];
       $this->_totalPage    = ceil($totalItems / $pagination['totalItemsPerPage']);
    }

    public function showPaging($link){           
        $listPage 	    = '';
        $paginationHTML = '';       

        if ($this->_totalPage > 1) {
            $first = '<li class="disabled"><span><span class="icon-backward icon-first" aria-hidden="true"></span></span></li>';
            $prev  = '<li class="disabled"><span><span class="icon-step-backward icon-previous" aria-hidden="true"></span></span></li>';
            if ($this->_currentPage > 1) {                
                $first = '<li><a onclick="javascript:changePage(1);" aria-label="Go to start page" class="hasTooltip" title="" href="#" data-original-title="Start (Page 1 of '. $this->_totalPage .')"><span class="icon-backward icon-first" aria-hidden="true"></span></a></li>';
                $prev  = '<li><a onclick="javascript:changePage('. ($this->_currentPage - 1) .');" aria-label="Go to previous page" class="hasTooltip" title="" href="#" data-original-title="Previous"><span class="icon-step-backward icon-previous" aria-hidden="true"></span></a></li>';
            }

            $next  = '<li kclass="disabled"><span><span class="icon-step-forward icon-next" aria-hidden="true"></span>	</span></li>';
            $last  = '<li class="disabled"><span><span class="icon-step-forward icon-last" aria-hidden="true"></span>	</span></li>';
            if ($this->_currentPage < $this->_totalPage) {
                $next  = '<li><a onclick="javascript:changePage('. ($this->_currentPage + 1) .');" aria-label="Go to next page" class="hasTooltip" title="" href="#" data-original-title="Next"><span class="icon-step-forward icon-next" aria-hidden="true"></span></a></li>';
                $last  = '<li><a onclick="javascript:changePage('. $this->_totalPage .');" aria-label="Go to end page" class="hasTooltip" title="" href="#" data-original-title="End (Page '. $this->_totalPage .' of '. $this->_totalPage .')"><span class="icon-forward icon-last" aria-hidden="true"></span></a></li>';
            } 
            
            if ($this->_pageRange < $this->_totalPage) {
                if ($this->_currentPage == 1) {
                    $start 	  = 1;
                    $end 	  = $this->_pageRange;
                } else if($this->_currentPage == $this->_totalPage) {
                    $start 	  = $this->_totalPage - $this->_pageRange + 1;
                    $end 	  = $this->_totalPage;
                } else {
                    $start 	  = $this->_currentPage - ($this->_pageRange-1)/2;
                    $end 	  = $this->_currentPage + ($this->_pageRange-1)/2;

                    if ($start < 1) {
                        $start = 1;
                        $end   = $end + 1;
                    }

                    if ($end > $this->_totalPage) {
                        $end   = $this->_totalPage;
                        $start = $end - $this->_pageRange + 1;
                    }
                }
            } else {
                $start 	  = 1;
                $end 	  = $this->_totalPage;
            }
            
            for ($i = $start; $i <= $end; $i++) { 
                if ($i == $this->_currentPage) {
                    // $listPage .= '<li class="active"><a href="?page='. $i .'">'. $i .'</a></li>';
                    $listPage .= '<li class="active"><span aria-current="true" aria-label="Page '. $i .'">'. $i .'</span></li>';
                } else {
                    $listPage .= '<li class="hidden-phone"><a onclick="javascript:changePage('. $i .');" aria-label="Go to page '. $i .'" href="#">'. $i .'</a></li>';
                }
            }

            if ($this->_currentPage < 1 || $this->_currentPage > $this->_totalPage) {
                header('location: errors.php');
                exit();
            }
            
            // Pagination
            $paginationHTML = '<ul class="pagination">' . $first . $prev . $listPage . $next . $last . '</ul>';
        }
        return $paginationHTML;
    }
}
?>