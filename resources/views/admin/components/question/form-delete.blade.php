<!----------------------------- THIS SECTION USES MODAL AS FORM DELETE ----------------------------->
<section id="formDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="formQuestionModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 id="formQuestionModalLabel" class="modal-title text-white font-weight-bold">{{ __('Remove question') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-dark">
                <form action="{{ action('Admin\QuestionController@destroy') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- TOKEN -->
                    <input id="idQuestion" type="hidden" name="id_question"> <!-- ID Question -->
                    <div class="text-light text-center mb-3">
                        <h5>{{ __('Are you sure you want to delete question?') }}</h5>
                        <div class="rounded bg-secondary pr-3 pl-3">
                            <h6 id="idMessage" class="font-weight-bold pt-3"></h6>
                            <p id="question" class="mb-0 pb-3"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>