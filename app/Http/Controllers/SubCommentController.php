<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Http\Requests\StoreSubCommentRequest;
use App\Services\SubCommentService;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;

class SubCommentController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $subCommentService;
    public function __construct()
    {
        $this->subCommentService = new SubCommentService();    
    }

    public function index()
    {
        //
        $result = $this->successResponse('Subcomments Successfully loaded!');

        try
        {
            $result['data'] = $this->subCommentService->loadSubComment();
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
    public function store(StoreSubCommentRequest $request)
    {
        $result = $this->successResponse('Subcomment successfully inserted!');

        $data =
        [
            'user'      =>  $request->user,
            'content'   =>  $request->content,
            'level'     =>  $request->level,
            'comment_id'=>  $request->comment_id
        ];
        try
        {
            $this->subCommentService->storeSubComment($data);
        }
        catch(\Exception $e)
        {
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        //
    }
}
