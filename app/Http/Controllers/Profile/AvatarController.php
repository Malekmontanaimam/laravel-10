<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request){



       $path= $request->file('avatar')->store('avatar','public');

       if($oldAvatar=auth()->user()->avatar){
        Storage::disk('public')->delete($oldAvatar);
       }
       auth()->user()->update(['avatar' => $path]);
                   return redirect(route('profile.edit'))->with('message','avatar is done ');
    }
}
