<!-- Pagination -->
<?php
    $paginationHTML = $this->pagination->showPaging(URL::createLink('admin', 'group', 'index'));
?>
<tfoot>
    <tr>
        <td colspan="10">
            <div class="pagination pagination-toolbar clearfix">
                <nav role="navigation" aria-label="Pagination">
                    <ul class="pagination-list">
                        <?php echo $paginationHTML; ?>
                    </ul>
                </nav>
                <input type="hidden" name="limitstart" value="0" />
            </div>
        </td>
    </tr>
</tfoot>