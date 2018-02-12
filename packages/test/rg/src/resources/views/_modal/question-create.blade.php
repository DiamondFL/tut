<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Create question</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="question">Question</label>
                        <textarea class="form-control" id="question"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="question">Reply 1</label>
                        <input type="text" name="reply[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="question">Reply 2</label>
                        <input type="text" name="reply[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="question">Reply 3</label>
                        <input type="text" name="reply[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="question">Reply 4</label>
                        <input type="text" name="reply[]" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

