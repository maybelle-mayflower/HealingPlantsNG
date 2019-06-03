  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="\logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

    <!-- categoryDeleteModal-->
    <div class="modal fade" id="categoryDeleteModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Delete Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="deletecategoryform" class="form-horizontal" enctype="multipart/form-data">
                        <p class="confirm_msg">Are you sure you want to delete this category?</p>
                </div>
                <input type="hidden" name="cat_id" id="cat_id">
                <div class="modal-footer">
                    <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </form>

            </div>
        </div>
    </div>
