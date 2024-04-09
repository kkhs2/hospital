<x-layout>
<div class="container">
@if ($content)
    <div class="row margin-10">
        <div class="col-md-6">
            <h4>@isset ($content->name) 
                    {{ $content->name }}
                @endisset 
                @isset ($content->genre) 
                    {{ $content->genre }}
                @endisset
                @isset ($content->description)
                    {{ $content->description }}
                @endisset
            </h4>
            <p>Provided by {{ $content->author->name }}<br>
            Contact <a href="mailto:{{ $content->author->email }}">{{ $content->author->email }}</a><br>
            @isset ($content->contributor) Contribution by {{ $content->contributor }} @endisset </p>
        </div>
        <div class="col-md-6">
            <img src="{{ $content->author->logo }}" class="img-fluid">
        </div>
    </div>
    @isset ($content->significantLink)
        @foreach ($content->significantLink as $k => $v)
            <div class="accordion">
                <div class="card">
                    <div class="card-header" id="heading{{ $k }}">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $k }}" aria-expanded="true" aria-controls="collapse{{ $k }}">{{ $v->name }}</button>
                    </div>
                    <div id="collapse{{ $k }}" class="collapse" aria-labelledby="heading{{ $k }}">
                        <div class="card-body">
                            <p>{{ $v->description }}<br>
                            <a href="{{ $v->url }}" target="_blank">Click here to open this article</a></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endisset
    @isset ($content->video)
        @foreach ($content->video as $k => $v)
            <div class="accordion">
                <div class="card">
                    <div class="card-header" id="heading{{ $k }}">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $k }}" aria-expanded="true" aria-controls="collapse{{ $k }}">{{ $v->name }}</button>
                    </div>
                    <div id="collapse{{ $k }}" class="collapse" aria-labelledby="heading{{ $k }}">
                        <div class="card-body">
                            <div class="row"><p>{{ $v->description }}</p></div>
                            <div class="row"><p>Video duration {{ $v->duration }}</p></div>
                            <div class="row">
                                <iframe width="640" height="360" src="{{ $v->embedUrl }}" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endisset
@endif    
</div>
</x-layout>