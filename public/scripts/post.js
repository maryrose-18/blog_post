
$(document).ready(function(){
    POST.loadData();
});

const POST = (()=>
{
    let this_data = {}; 


    this_data.loadData = () =>
    { 
        $.ajax({
            url:"posts",
            method: "GET",
            dataType: "json",
            success:(result) =>
            {
                console.log(result)
                let d = new Date(result.data[0].created_at);
                let ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
                let mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(d);
                let da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);
                $('#post_user').html(result.data[0].user);
                $('#post_timestamp').html(`${da}-${mo}-${ye}`);
                $('#post_content').html(result.data[0].content);
                $('#post_id').val(result.data[0].id);
            },
            error:(error)=>
            {
                // console.log(error.responseJSON.message)
            }


        })
        
    };
    return this_data;
})();