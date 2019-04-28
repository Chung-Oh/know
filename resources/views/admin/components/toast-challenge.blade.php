<div class="container-toast pt-1">
    <!-- All questions bellow for to treat -->
    <p id="questions-toast" data-questions="{{ $questions->where('type', 1)->where('challenge_id', null) }}" hidden></p>
    <p id="questions-beg" data-questions="{{ $questions->where('type', 1)->where('challenge_id', null)->where('level_id', 1)->last() }}" hidden></p>
    <p id="questions-int" data-questions="{{ $questions->where('type', 1)->where('challenge_id', null)->where('level_id', 2)->last() }}" hidden></p>
    <p id="questions-adv" data-questions="{{ $questions->where('type', 1)->where('challenge_id', null)->where('level_id', 3)->last() }}" hidden></p>
    <p id="questions-eru" data-questions="{{ $questions->where('type', 1)->where('challenge_id', null)->where('level_id', 4)->last() }}" hidden></p>
</div>