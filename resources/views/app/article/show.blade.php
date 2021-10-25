@extends('layouts.app')
@section('content')
    <div class="app">
        <div class="row mt-5">
            <div class="col-12 p-3">
                <img src="{{$articles->img}}" alt="" class="border rounded mx-auto d-block">
                <h5 class="mt-5">{{$articles->title}}</h5>
                <p>
                    @foreach($articles->tags as $tag)
                        @if($loop->last)
                            <span class="tag">{{$tag->label}}</span>
                        @else
                            <span class="tag">{{$tag->label}} |</span>
                        @endif
                    @endforeach
                </p>
                <p class="card-text">{{$articles->body}}</p>
                <p>Опубликовано: <i>{{$articles->createdAtForHumans()}}</i></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <form action="">
                <div class="pb-3">
                    <label for="commentSubject" class="form-label">Тема комментария</label>
                    <input type="text" class="form-control" id="commentSubject">
                </div>
                <div class="pb-3">
                    <label for="commentBody" class="form-label">Комментарий</label>
                    <textarea type="text" class="form-control" id="commentBody" rows="3"></textarea>
                </div>
                <button class="btn btn-success" type="submit">Отправить</button>
            </form>
            <div class="toast-container pb-5 mt-3 mx-auto">
                @foreach($articles->comments as $comment)
                    <div class="toast show" style="min-width: 400px">
                        <div class="toast-header">
                            <img src="https://via.placeholder.com/600/0f113b/fff.png?text=Laravel 8" class="rounded me-2" style="width: 120px;" alt="">
                            <strong class="me-auto">{{$comment->subject}}</strong>
                            <small class="text-muted">{{$comment->createdAtForHumans()}}</small>
                        </div>
                        <div class="toast-body">
                            {{$comment->body}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('vie')
@endsection
