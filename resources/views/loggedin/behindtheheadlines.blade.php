<x-layout>
<div class="container">
@if ($news)
    <h4>Headline news</h4>
    <div class="row">
        <div class="col-md-6">
            <p>Provided by {{ $news->author->name }}<br>
            Contact <a href="mailto:{{ $news->author->email }}">{{ $news->author->email }}</a><br>
            Contributed by </p>
        </div>
        <div class="col-md-6">
            <img src="{{ $news->author->logo }}" class="img-fluid">
        </div>
    </div>
    @foreach ($news->significantLink as $k => $v)
        <div class="accordion">
            <div class="card">
                <div class="card-header" id="heading{{ $k }}">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $k }}" aria-expanded="true" aria-controls="collapse{{ $k }}">{{ $v->name }}</button>
                </div>
                <div id="collapse{{ $k }}" class="collapse" aria-labelledby="heading{{ $k }}">
                    <div class="card-body">
                        <div class="row"><p>{{ $v->description }}</p></div>
                        <div class="row"><a href="{{ $v->url }}">Click here to open this article</a></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
</div>
</x-layout>