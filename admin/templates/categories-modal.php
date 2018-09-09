
<!--
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 8/31/2018
 * Time: 1:16 PM
 */-->


<!-- Modal -->
<div class="modal fade" id="form_categories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="categories-form" onsubmit="return false">
                    <div class="form-group">
                        <label>Categories Name</label>
                        <input type="text" class="form-control" name="categories_name" id="categories_name" aria-describedby="emailHelp" placeholder="Enter Categories name">
                        <small id="cat_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label >Parent Categories</label>
                        <select class="form-control" id="parent_cat" name="parent_cat">
                        </select>
                        <small id="cat_error" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>