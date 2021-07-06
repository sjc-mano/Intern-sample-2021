<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\EditUsersRequest;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;

    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }

    /**
     * ユーザ管理画面を表示
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 検索条件に一致するユーザの取得
        $users = $this->userService->search($request);

        return view('users.list')->with([
            'users' => $users
        ]);
    }

    /**
     * ユーザ作成画面を表示
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('users.create');
    }

    /**
     * ユーザ作成
     *
     * @param \App\Http\Requests\StoreUsersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        $return = $this->userService->store($request);

        if(array_key_exists('success', $return)){
            return response()->json(['message' => $return['success']], 200);
        }else{
            return response()->json(['message' => $return['error']], 500);
        }
    }

    /**
     * ユーザ編集画面を表示
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // ユーザ情報の取得
        $user = $this->userService->getUser($request['user_id']);

        if($user){
            return view('users.edit')->with([
                'user' => $user
            ]);
        }else{
            return redirect()->route('users.list');
        }
    }

    /**
     * ユーザ編集
     *
     * @param \App\Http\Requests\EditUsersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(EditUsersRequest $request)
    {
        // 存在チェック
        $user = $this->userService->getUser($request['user_id']);
        if(is_null($user)){
            return response()->json(['message' => config('const.MESSAGE.ERROR.DELETED')], 404);
        }

        // 保存処理
        $return = $this->userService->update($request);

        if(array_key_exists('success', $return)){
            return response()->json(['message' => $return['success']], 200);
        }else{
            return response()->json(['message' => $return['error']], 500);
        }
    }

    /**
     * ユーザ削除
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // 存在チェック
        $user = $this->userService->getUser($request['user_id']);
        if(is_null($user)){
            return response()->json(['message' => config('const.MESSAGE.SUCCESS.DELETE')], 200);
        }

        // 削除処理
        $return = $this->userService->destroy($request);

        if(array_key_exists('success', $return)){
            return response()->json(['message' => $return['success']], 200);
        }else{
            return response()->json(['message' => $return['error']], 500);
        }
    }
}
