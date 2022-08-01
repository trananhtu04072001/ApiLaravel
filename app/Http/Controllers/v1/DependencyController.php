<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Responsitory\BookInterface;
use App\Responsitory\BookResponsitory;
use Illuminate\Http\Request;

class DependencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $book;
    /**
     * @var BookResponsitory
     */
    protected $Bookrespon;

    public function __construct(BookInterface $book,BookResponsitory $Bookrespon)
     {
         $this->book = $book;
         $this->Bookrespon = $Bookrespon;
     }

    public function index(BookInterface $book)
    {
        $data =  $book->getAll();
        return $this->successResponse($data , 'In ra thành công' , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BookRequest $req , BookInterface $responsitory)
    {
        $data = $req->all();
        $book = $responsitory->create($data);
        return $this->successResponse($book,'Thêm Thành công' , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = $this->book->find($id);
        return $this->successResponse($data , 'Tri tiết sách' , 202);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BookRequest $req, $id)
    {
        $data = $this->book->update($id , $req->all());
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
        $data = $this->book->delete($id);
        return $this->successResponse($data , 'Đã xoá thành công có id: '.$id , 200);
    }
}
