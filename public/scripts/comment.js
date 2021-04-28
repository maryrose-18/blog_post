

$(document).ready(function(){
    COMMENT.loadData();
    COMMENT.loadSubComment();
});

const COMMENT = (()=>
{
    let this_data = {}; 
    let level = "";


    this_data.loadData = () =>
    { 
        $.ajax({
            url         : "comments",
            method      : "GET",
            dataType    : "json",
            success     : (result) => 
            {
                
            },
            error       : (error)=>
            {

            }
        })
        
    };

    this_data.insertComment = ()=>
    {
        var user    = $("#txt_user").val();
        var content = $("#txt_content").val();
        var post_id = $("#post_id").val();

        if (user == "" || content =="")
        {
            alert('Please complete details');
        }
        else
        {
            $.ajax({
                url         :"comments",
                method      : "POST",
                dataType    : "json",
                data:
                {
                    user    :   user,
                    content :   content,
                    post_id :   post_id,
                    _token  : _TOKEN
                },
                success:(result) =>
                {
                    COMMENT.loadSubComment();
                    
    
                    console.log(result)
                },
                error:(error)=>
                {
                    // console.log(error.responseJSON.message)
                }


            })
        }
    }

    

    this_data.showCommentInputs = (classname, level_data = "") =>
    {
        $(`.${classname}`).css("display", "block");

        level = level_data;

        console.log(level);
    }

    this_data.clearFields = () =>
    {
        $("#txt_user").val("");
        $("#txt_content").val("");
    }

    this_data.insertSubComment = (id) =>
    {
        var user        = $(`#txt_user_${id}`).val();
        var content     = $(`#txt_content_${id}`).val();

        $.ajax({
            url     : "subcomment",
            method  : "POST",
            dataType: "json",
            data    :
            {
                user        :   user,
                content     :   content,
                level       :   level,
                comment_id  :   id,
                _token      :   _TOKEN
            },
            success:(result) =>
            {
                COMMENT.loadSubComment();
                console.log(result);
            },
            error:(error)=>
            {

            }
        })
    }

    this_data.loadSubComment = () =>    
    {
         $.ajax({
            url     : "subcomment",
            method  : "GET",
            dataType: "json",
            success:(result) =>
            {
                COMMENT.clearFields();
                console.log(result);
                console.log(result);
                let data = '';
                let main_comment = '';
                let reply_inputs = '';
                $.each(result.data, function(){
                    let d = new Date(this.created_at);
                    let ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
                    let mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(d);
                    let da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);

                    main_comment=`
                    <div class="comment-user">${this.user}</div>
                    <div class="comment-timestamp">${da}-${mo}-${ye}</div>
                    <div class="comment-content">${this.content}
                        <div class="comment-controls">
                            <a href="#" onclick="COMMENT.showCommentInputs('reply-comment_${this.id}',1);"><i class="fa fa-comment"></i> Reply </a>
                        </div>
                    </div>
                    `;
                    let comment_id = this.id;
                    let sub_comment1 = '';
                    let sub_comment2 = '';
                    $.each(this.level, function(){
                        let d = new Date(this.created_at);
                        let ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
                        let mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(d);
                        let da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);

                        if(this.level === 1 )
                        {
                            sub_comment1+=`
                            <div class="sublevel1">
                            <div class="comment-user">${this.user}</div>
                                <div class="comment-timestamp">${da}-${mo}-${ye}</div>
                                <div class="comment-content">${this.content}
                                    <div class="comment-controls">
                                        <a href="#" onclick="COMMENT.showCommentInputs('reply-comment_${comment_id}',2);"><i class="fa fa-comment"></i> Reply </a>
                                    </div>
                            </div>
                            </div>`;
                        }
                        else
                        {
                            sub_comment2+=`
                            <div class="sublevel2">
                            <div class="comment-user">${this.user}</div>
                                <div class="comment-timestamp">${da}-${mo}-${ye}</div>
                                <div class="comment-content">${this.content}</div>
                            </div>`;
                        }
                    })

                    reply_inputs = ` 
                    <div class="reply_container reply-comment_${this.id}">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="" value="" id="txt_user_${this.id}" placeholder="user" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="" id="txt_content_${this.id}" placeholder="comment" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button id="btn_save_${this.id}" class="btn btn-primary" onclick="COMMENT.insertSubComment(${this.id});">Save</button>
                            </div>
                            <div class="comment-controls">
                                <a href="#" onclick="COMMENT.showCommentInputs('reply-comment_${this.id}',2);"><i class="fa fa-comment"></i> Reply </a>
                            </div>
                        </div>
                    </div>`;

                    data += `${main_comment} ${sub_comment1} ${sub_comment2} ${reply_inputs}`;
                })
                $('#comment_section').html(data);
            },
            error:(error)=>
            {

            }
        })
    }

    return this_data;
})();