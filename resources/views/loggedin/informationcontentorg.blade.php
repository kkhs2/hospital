<x-layout>
<div class="container">
@if ($content)
    <div class="row margin-10">
        <div class="col-md-6">
            <p>Provided by {{ $content->feed->author->name }}<br>
            Contact <a href="mailto:{{ $content->feed->author->email }}">{{ $content->feed->author->email }}</a>
        </div>
        <div class="col-md-6">
            <img src="{{ $content->feed->logo }}" class="img-fluid">
        </div>
    </div>
    @foreach ($content->feed->entry as $k => $v)
        <div class="accordion">
            <div class="card">
                <div class="card-header" id="heading{{ $k }}">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $k }}" aria-expanded="true" aria-controls="collapse{{ $k }}">{{ $v }}</button>
                </div>
                <div id="collapse{{ $k }}" class="collapse" aria-labelledby="heading{{ $k }}">
                    <div class="card-body">
                
                       
                    </div>
                </div>
            </div>
        </div>  
    @endforeach
@endif
</div>
</x-layout>