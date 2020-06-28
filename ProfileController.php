<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//4【応用】 artisanを使って、Admin/ProfileControllerを作成しましょう。
//5【応用】 Admin/ProfileControllerに、以下のadd, create, edit, update それぞれのActionを追加してみましょう。

use App\Profile;
class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }
                    // 以下を追記 14課題(5)
    public function create(Request $request)
    {
        
      $this->validate($request, Profile::$rules);// Varidationを行う
      
      $Profile = new Profile;
      $form = $request->all();
      
      unset($from['_token']); //フォームから送信された_tokenを削除する。
      
      $Profile->fill($from);
      $Profile->save();
      //上記までを追記　14課題(5)
     return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
