<?php
namespace App\Observers;

use App\Models\Investor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Created by PhpStorm.
 * User: Мова
 * Date: 04.09.2016
 * Time: 17:54
 */
class InvestorObserver
{

    public function deleting(Investor $investor)
    {
        $file = storage_path('app/investor/images/' . $investor->logo);
        if (File::exists($file)) {
            File::delete($file);
        }
    }

    public function updating(Investor $investor)
    {
        if($investor->getOriginal('logo') != $investor->getAttribute('logo')){
            $file = storage_path('app/investor/images/' . $investor->getOriginal('logo'));
            if (File::exists($file)) {
                File::delete($file);
            }
        }
    }
}