<?php 
class Pagination{    
    private $_totalItems;            // Tổng số phần tử.
    
    private $_itemsPerPage  = 1;     // Tống số phần tử trên 1 trang.    
    
    private $_pageRange     = 5;     // Số trang xuất hiện.    
    
    private $_totalPage;             // Tổng số trang
    
    private $_currentPage   = 1;     // Trang hiện tại.
    
    public function __construct($totalItems, $itemsPerPage = 1, $pageRange = 3, $currentPage = 1) {
       $this->_totalItems   = $totalItems;
       $this->_itemsPerPage = $itemsPerPage;

       if($pageRange % 2 == 0) $pageRange = $pageRange + 1;
       $this->_pageRange    = $pageRange;

       $this->_currentPage  = $currentPage;
       $this->_totalPage    = ceil($totalItems / $itemsPerPage);
    }

    public function showPaging(){
        $listPage 	    = '';
        $paginationHTML = '';

        if ($this->_totalPage > 1) {
            $first = '<li>First</li>';
            $prev  = '<li>Previous</li>';
            if ($this->_currentPage > 1) {
                $first = '<li><a href="?page=1">First</a></li>';
                $prev = '<li><a href="?page='. ($this->_currentPage - 1) .'">Previous</a></li>';
            }

            $next  = '<li>Next</li>';
            $last   = '<li>Last</li>';
            if ($this->_currentPage < $this->_totalPage) {
                $next = '<li><a href="?page='. ($this->_currentPage + 1) .'">Next</a></li>';
                $last = '<li><a href="?page='. $this->_totalPage .'">Last</a></li>';
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
                    $listPage .= '<li class="active"><a href="?page='. $i .'">'. $i .'</a></li>';
                } else {
                    $listPage .= '<li><a href="?page='. $i .'">'. $i .'</a></li>';
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