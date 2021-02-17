<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\SiteInfo;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // Retrieving models
        $site_info = SiteInfo::first();
        $user = User::first();

        return view('admin-panel.profile.edit', compact('user', 'site_info'));
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
        // Form validation
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'job' => 'max:255',
            'profile_image' => 'image|mimes:jpeg,jpg,png|max:300',
        ]);

        // Get user
        $user = User::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('profile_image')){

            // Get image file
            $profile_image = $request->file('profile_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/profile/';

            // Make image name
            $profile_image_name =  time().'-'.$profile_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$user->profile_image));

            // Upload image
            $profile_image->move($folder, $profile_image_name);

            // Set input
            $input['profile_image']= $profile_image_name;

        }

        // Update user
        User::find($id)->update($input);

        return redirect()->route('profile.edit')
            ->with('success','User updated successfully');
    }


    /**
     * Display a change-password view.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_password_edit()
    {
        // Retrieve a model
        $site_info = SiteInfo::first();

        return view('admin-panel.profile.change-password', compact('site_info'));
    }

    /**
     * Update password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function change_password_update(Request $request)
    {
        // Get All Request
        $input = $request->all();

        // User ID
        $id = Auth::id();

        // Current password
        $current_password = Auth::User()->password;

        if(Hash::check($input['current_password'], $current_password))
        {
            // Form validation
            $request->validate([
                'password' => ['required', 'string', 'confirmed'],
            ]);

            // Update password
            User::find($id)->update([
                'password' => Hash::make($input['password']),
            ]);

            return redirect()->route('profile.change_password_edit')
                ->with('success','Updated successfully.');

        } else{
            return redirect()->route('profile.change_password_edit')
                ->with('warning','Password change failed!');
        }
    }

}
