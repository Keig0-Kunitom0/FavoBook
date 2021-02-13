<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;

class SearchController extends Controller
{
    public function search(Request $request) 
    {
        //dd($request);
        
        
        $url = 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404';

        // applicationIdの 'xxxxx....' は取得したアプリIDに書き換える
        $params = [
            'format' => 'json',
            'applicationId' => '1090065011903172178',
            'affiliateId'=> '1cbb6bcb.b85d0223.1cbb6bcc.19ae9cea',
            'hits' => 15,
            'title' => $request->q,
            'page' => $request->page,
            //'isbn' => $request->q,
        ];
    
        $query = http_build_query($params, "", "&");
        $search_url = $url . '?' . $query;
        
        $result = file_get_contents($search_url);
        
        if($result === false){
            return [];
        }
        
        
        $records = json_decode($result, false);
        
        $books = [];
        foreach ($records->Items as $item) {
            //  同じisbnのデータがあれば重複データを作成しない。findOrCreateを使う。
            $book = Book::firstOrCreate([
            'title' => $item->Item->title,
            'author' => $item->Item->author,
            'publisher' => $item->Item->publisherName,
            'img_url' => $item->Item->largeImageUrl,
            'affiliate' => $item->Item->affiliateUrl,
            'release_date' => $item->Item->salesDate,
            ]);
            
            $book->title = $item->Item->title;
            $book->author = $item->Item->author;
            $book->publisher = $item->Item->publisherName;
            $book->img_url = $item->Item->largeImageUrl;
            $book->affiliate = $item->Item->affiliateUrl;
            //$book->category = $item->Item->category;
            //$book->category = "dummy"; // FIXME：categoryがnullableでないのでエラーになったのでダミーデータ投入。
            $book->release_date= $item->Item->salesDate; 
            $book->save();
            
            $books[] = $book->toArray();
        }
        
        //dd($books);
        
        return $books;

    }
}