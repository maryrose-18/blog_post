<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;

use App\Services\CommentService;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;

class CommentController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $commentService;
    public function __construct()
    {
        $this->commentService = new CommentService();
    }
    public function index()
    {
        $result = $this->successResponse('Comments successfully Loaded!');

        try
        {
            $result['data'] = $this->commentService->loadComments();
        }
        catch(\Exception $e)
        {
            $result = $this->errorResponse($e);
        }
        return $this->returnResponse($result);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request)
    {
        $result = $this->successResponse('Post successfully inserted');

        $data = 
        [
            'user'      =>  $request->user,
            'content'   =>  $request->content,
            'post_id'   =>  $request->post_id
        ];  
        try
        {
            $this->commentService->storeComment($data);
        }
        catch(\Exception $e)
        {
            $result = $this->errorResponse($e);
        }
        return $this->returnResponse($result);
    }

    public function storeSubComment()
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
