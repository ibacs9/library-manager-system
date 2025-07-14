<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\BookService;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }


    public function index()
    {
        return $this->bookService->getAllBooks();
    }

    public function rental($id){

        try{
            $this->bookService->setRental($id);
            return response()->json(['message' => 'Sikeres bérlés!']);


        }catch(\Exception $e){

        }
    }

    public function getPage($slug, $page)
    {
        $book = $this->bookService->getBookBySlug($slug);
       // $content = $book->pages()->where('page_number', $page)->first();

        return response()->json([
            'book' => $book,
            'page_number' => $page,
          //  'content' => $content->text ?? 'Nincs tartalom ezen az oldalon.'
        ]);
    }

}
