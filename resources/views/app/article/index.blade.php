@extends('layouts.app')

@section('hero')
    @include('app.partials.hero')
@endsection

@section('content')
    <div class="row mt-5">
        @foreach($articles as $article)
            <div class="col-4 pb-3">
                <div class="card">
                    <img src="{{$article->img}}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->titile}}</h5>
                        <p class="card-text">{{$article->getBodyPreview()}}</p>
                        <p>{{$article->createdAtForHumans()}}</p>
                        <a href="#" class="btn btn-primary">Подробнее</a>

                        <div class="nt-3">
                            <span class="badge bg-primary"><i class="far fa-thumbs-up"></i> {{$article->state->likes}}</span>
                            <span class="badge bg-danger"><i class="far fa-eye"></i> {{$article->state->views}}</span>
                        </div>
                        <div class="nt-4">
                            Теги:
                            @foreach($article->tags as $tag)
                                <a href="#" class="badge bg-danger">{{$tag->label}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mx-auto" style="width: max-content;">{{$articles->links()}}</div>
@endsection
