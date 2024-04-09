<x-layout>
<div class="container">
@if ($content)
    <h4>Results returned for query "{{ $content->question->query }}"</h4>
    @foreach ($content->results as $k => $v)
        <div class="accordion">
            <div class="card">
                <div class="card-header" id="heading{{ $k }}">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $k }}" aria-expanded="true" aria-controls="collapse{{ $k }}">{{ $v->title }}</button>
                </div>
                <div id="collapse{{ $k }}" class="collapse" aria-labelledby="heading{{ $k }}">
                    <div class="card-body">
                        {{ $v->summary }}<br>
                        <a href="{{ $v->url }}" target="_blank">Click here to open this article</a></p>
                    </div>
                </div>
            </div>
        </div>  
    @endforeach
@endif
</div>
</x-layout>