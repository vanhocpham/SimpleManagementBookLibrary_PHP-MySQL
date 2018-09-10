<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 9/10/2018
 * Time: 4:45 PM
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 9/10/2018
 * Time: 2:23 PM
 */
?>
<!-- Modal -->
<div class="modal fade" id="form_author" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_author_form" onsubmit="return false">
                    <div class="form-group">
                        <label>Author Name</label>
                        <input type="hidden" name="aid" id="aid" value=""/>
                        <input type="text" class="form-control" name="update_author" id="update_author" aria-describedby="emailHelp" placeholder="Edit Author">
                        <small id="cat_error" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-success">Update Author</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
