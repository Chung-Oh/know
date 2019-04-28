<!----------------------------- THIS SECTION USES MODAL AS FORM DETAILS ----------------------------->
<section id="formDetailQuestion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="formQuestionModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 id="formQuestionModalLabel" class="modal-title text-white font-weight-bold"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-dark">
                <div class="text-center text-light">
                    <p id="level" class="form-control bg-secondary text-light"></p>
                    <p id="category" class="form-control bg-secondary text-light"></p>
                    <textarea id="contentQuestion" class="form-control bg-secondary text-center text-light" disabled></textarea>
                    <details class="pt-3 pb-3">
                        <summary class="text-warning font-weight-bold">{{ __('Alternatives (click here)') }}</summary>
                        <div class="border border-light rounded bg-secondary">
                            <ol class="text-light mb-0">
                                <li id="alt1" class="text-left pt-2"></li>
                                <li id="alt2" class="text-left"></li>
                                <li id="alt3" class="text-left"></li>
                                <li id="alt4" class="text-left"></li>
                                <li id="alt5" class="text-left"></li>
                            </ol>
                            <div>
                                <p id="altTrue" class="bg-secondary text-warning text-center font-weight-bold font-italic mb-1"></p>
                            </div>
                        </div>
                    </details>
                    <p id="creator" class="form-control bg-secondary text-center text-light"></p>
                    <p id="createdAt" class="form-control bg-secondary text-center text-light"></p>
                    <p id="updatedAt" class="form-control bg-secondary text-center text-light"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
</section>