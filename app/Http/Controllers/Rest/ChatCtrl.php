<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, DB;
use App\Models\ChatModel;

class ChatCtrl extends Controller
{   
    private $chatModel;
      public function __construct(ChatModel $chatModel)
    {
        $this->chatModel = $chatModel;

    }

    public function listChat()
    {
        $listChat = $this->chatModel->get();
        return response()->json($listChat);

    }

    //
    public function insertChat(Request $request)
    {
        if ($request->hasFile('images')) {
            $images = $request->images;
            
            $content  = $images->getClientOriginalName();
            $images->move('images', $content);
        }else{
            $content = $request->content;
        }
        $type = $request->type;

        DB::beginTransaction();
        // try{
            $newId = $this->chatModel->insertGetId([
                'content' => $content,
                'type' => $type
            ]);
            $data = $this->chatModel->find($newId);
            DB::commit();

            return response()->json(['status' => true, 'data' => $data]);

        // } catch (\Throwable $th) {
        //     //throw $th;
        //     DB::rollback();
        //     return response()->json(['errMsg' => 'Xảy ra lỗi hệ thống'], 422);
        // }
    
    }
}
