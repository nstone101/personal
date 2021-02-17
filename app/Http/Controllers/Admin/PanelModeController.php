<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PanelMode;
use Illuminate\Http\Request;

class PanelModeController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_mode()
    {
        //Panel Color Mode
        $panel_mode = PanelMode::first();

        if($panel_mode->mode == 1) {
            $mode = 0;
        } else {
            $mode = 1;
        }

        // Update a model
        PanelMode::find($panel_mode->id)->update(['mode' => $mode]);

        return redirect()->route('dashboard')
            ->with('success','Panel mode has been changed.');
    }

}
