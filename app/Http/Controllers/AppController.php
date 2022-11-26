<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class AppController extends Controller
{
    public function index()
    {
        $cocktails = $this->sortJson(storage_path('app/public/cocktails.json'), 'name');
        return view('home', compact('cocktails'));
    }

    public function sortJson($path, $member = null)
    {
        $data = json_decode(file_get_contents($path), true);
        
        // Sort by member
        if (isset($member)) {
            usort($data, function ($a, $b) use ($member) {
                return $a[$member] <=> $b[$member];
            });
        }

        return $data;
    }

    static function selectGlass($glass) {
        switch ($glass) {
            case 'highball':
                return 'highball';
            case 'collins':
                return 'highball';
            case 'old-fashioned':
                return 'old-fashioned';
            case 'shot':
                return 'old-fashioned';
            case 'champagne-flute':
                return 'champagne-flute';
            case 'champagne-tulip':
                return 'champagne-flute';
            case 'martini':
                return 'martini';
            case 'white-wine':
                return 'wine';
            default:
                return 'martini';
        }
    }
}
