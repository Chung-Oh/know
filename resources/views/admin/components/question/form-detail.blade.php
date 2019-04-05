<!----------------------------- THIS SECTION USES MODAL AS FORM DETAILS ----------------------------->
<section class="modal fade" id="formDetail" tabindex="-1" role="dialog" aria-labelledby="formQuestionModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white font-weight-bold" id="formQuestionModalLabel">{{ __('Question details') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-dark">
                <fieldset class="text-center text-light">
                    <label>Level:</label>
                    <input id="level" type="text" class="form-control text-center" disabled>
                    <label class="pt-3">Category:</label>
                    <input id="category" type="text" class="form-control text-center" disabled>
                    <label class="pt-3">Content Question:</label>
                    <textarea id="contentQuestion" type="text" class="form-control align-middle text-center" disabled></textarea>
                    <details class="pt-3">
                        <summary>Alternatives click here</summary>
                        <ol>
                            <li id="alt1" class="text-left"></li>
                            <li id="alt2" class="text-left"></li>
                            <li id="alt3" class="text-left"></li>
                            <li id="alt4" class="text-left"></li>
                            <li id="alt5" class="text-left"></li>
                        </ol>
                        <p id="altTrue" class="text-success"></p>
                    </details>
                    <label class="pt-2">Creator:</label>
                    <input id="creator" type="text" class="form-control text-center" disabled>
                    <label class="pt-2">Created At:</label>
                    <input id="created_at" type="text" class="form-control text-center" disabled>
                    <label class="pt-2">Updated At:</label>
                    <input id="updated_at" type="text" class="form-control text-center" disabled>
                </fieldset>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
</section>