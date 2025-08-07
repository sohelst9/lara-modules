<div class="modal fade" id="createPostModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="createPostForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User <span style="color:red;">*</span></label>
                        <select id="user_id" name="user_id" class="form-select">
                            <option value="">Select</option>
                            <option value="1">User 1</option>
                            <option value="2">User 2</option>
                            <option value="7">User 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="createTitle" class="form-label">Title</label>
                        <input type="text" id="createTitle" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="createContent" class="form-label">Content</label>
                        <textarea id="createContent" name="content" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
