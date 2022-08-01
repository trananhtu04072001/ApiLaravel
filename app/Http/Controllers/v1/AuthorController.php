<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Responsitory\AuthorInterface;
use App\Responsitory\AuthorResponsitory;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    protected $authorResponsitory;

    protected $interface;

    public function __construct(AuthorResponsitory $authorResponsitory , AuthorInterface $interface)
    {
        $this->authorResponsitory = $authorResponsitory;
        $this->interface = $interface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->authorResponsitory->getAuthor();
        return $this->successResponse($data , 'In tác giả thành công' , 200);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AuthorRequest $req)
    {
        $req->validated();
        $data = $this->authorResponsitory->create($req->all());
        return $this->successResponse($data , 'Thêm thành công' , 202);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = $this->authorResponsitory->find($id);
        return $this->successResponse($data , 'Tri tiết tác giả' , 200);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id , AuthorRequest $req)
    {
        $req->validated();
        $data = $this->authorResponsitory->update($id , $req->all());
        return $this->successResponse($data , 'Cập nhật thành công' , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $data = $this->authorResponsitory->delete($id);
        return $this->successResponse($data , 'Xoá tác giả thành công' , 200);
    }
}
