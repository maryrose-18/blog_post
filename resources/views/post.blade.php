@extends('template') {{-- kung saang file mo siya lalagay --}}

@section('content'){{-- kung saan mo siya lalagay  sa app template--}}
<div class="container-fluid pt-2 pl-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <div id="post_user"></div>
            <div id="post_content"></div>
            <div id="post_timestamp"></div>
            <input type="text" name="post_id" id="post_id" class="d-none">
        </div>
    </div>
    <div class="controls-comment">
        <a href="#user" onclick="COMMENT.showCommentInputs('container-comment');"><i class="fa fa-comment-dots"></i> Comment</a>
    </div>
    <div id="comment_section">
       
    </div>
    <div class="container-comment">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="" value="" id="txt_user" placeholder="user" class="form-control">
            </div>
            <div class="col-md-6">
                <input type="text" name="" id="txt_content" placeholder="comment" class="form-control">
            </div>
            <div class="col-md-2">
                <button id="btn_save" class="btn btn-primary" onclick="COMMENT.insertComment();">Save</button>
            </div>
        </div>
    </div>
    
</div>

@endsection

@section('custom_js')
<script src="{{asset('scripts/post.js')}}"></script>
<script src="{{asset('scripts/comment.js')}}"></script>
@endsection


@section('custom_css')
    <link href="{{asset('css/post.css')}}" rel="stylesheet">
@endsection