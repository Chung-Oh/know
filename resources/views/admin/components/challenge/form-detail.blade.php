<!----------------------------- THIS SECTION USES MODAL AS FORM DETAILS ----------------------------->
<section id="formDetailChallenge" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="formQuestionModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <!-- Message bellow = "Challenge details with ID :" -->
                <h5 id="formQuestionModalLabel" class="modal-title text-white font-weight-bold"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-dark">
                <div class="container text-center text-light mx-auto row">
                    <p id="creator" class="form-control bg-secondary text-light float-left col-xl-5 col-12 mx-auto mb-1"></p>
                    <p id="level" class="form-control bg-secondary text-light float-left col-xl-5 col-6 mx-auto mb-1"></p>
                    <p id="timeDetail" class="form-control bg-secondary text-light float-left col-xl-3 col-6 mx-auto mb-1"></p>
                    <p id="experienceDetail" class="form-control bg-secondary text-light float-left col-xl-3 col-6 mx-auto mb-1"></p>
                    <p id="opportunityDetail" class="form-control bg-secondary text-light float-left col-xl-3 col-6 mx-auto mb-1"></p>
                    <p id="createdAt" class="form-control bg-secondary text-light float-left col-xl-5 col-12 mx-auto mb-1"></p>
                    <p id="updatedAt" class="form-control bg-secondary text-light float-left col-xl-5 col-12 mx-auto mb-1"></p>
                </div>
                <input type="hidden" value="{{ $i = 1 }}"> <!-- For represent Questions -->
                @foreach ($categories as $c)
                    <hr class="bg-light mt-2 mb-1">
                    <div class="form-group d-flex justify-content-center text-center row">
                        <h5 class="container text-light mt-2 mb-0">{{ $c->name }}</h5> <!-- Category -->
                        <details id="detail{{ $i }}" class="col-xl-6 text-warning mt-2">
                            <summary>{{ __('Question ') }}{{ $i++ }}</summary>
                            <div class="border border-light rounded bg-secondary text-light">
                                <p class="content-question text-break pt-2 pb-1 mb-0"></p> <!-- Question -->
                                <ol class="text-left pb-1 mb-0">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ol>
                                <p class="creator text-break pt-2 pb-1 mb-0"></p> <!-- Creator question -->
                                <p class="created-at text-break pt-2 pb-1 mb-0"></p> <!-- Created At -->
                                <p class="updated-at text-break pt-2 pb-1 mb-0"></p> <!-- Updated At -->
                            </div>
                        </details>
                        <details id="detail{{ $i }}" class="col-xl-6 text-warning mt-2">
                            <summary>{{ __('Question ') }}{{ $i++ }}</summary>
                            <div class="border border-light rounded bg-secondary text-light">
                                <p class="content-question text-break pt-2 pb-1 mb-0"></p>
                                <ol class="text-left pb-1 mb-0">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ol>
                                <p class="creator text-break pt-2 pb-1 mb-0"></p>
                                <p class="created-at text-break pt-2 pb-1 mb-0"></p>
                                <p class="updated-at text-break pt-2 pb-1 mb-0"></p>
                            </div>
                        </details>
                    </div>
                @endforeach
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
</section>