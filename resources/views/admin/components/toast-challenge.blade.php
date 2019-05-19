<div class="container-toast pt-1">
    <!-- All questions below for to treat -->
    <p id="questionsToast" data-questions="{{ $questions->where('type', 1)->where('challenge_id', null) }}" hidden></p>
    <p id="questionsBeg" data-questions="{{ $questions->where('type', 1)->where('challenge_id', null)->where('level_id', 1)->last() }}" hidden></p>
    <p id="questionsInt" data-questions="{{ $questions->where('type', 1)->where('challenge_id', null)->where('level_id', 2)->last() }}" hidden></p>
    <p id="questionsAdv" data-questions="{{ $questions->where('type', 1)->where('challenge_id', null)->where('level_id', 3)->last() }}" hidden></p>
    <p id="questionsEru" data-questions="{{ $questions->where('type', 1)->where('challenge_id', null)->where('level_id', 4)->last() }}" hidden></p>
</div>