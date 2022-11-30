<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;
use Illuminate\Http\Client\Request as ClientRequest;

class AppController extends Controller
{
    public function index()
    {
        $cocktails = $this->sortJson(storage_path('app/public/cocktails.json'), 'name');
        $categories = array_unique(array_column($cocktails, 'category'));
        $ingredients = $this->getIngredients($cocktails);
        return view('home', compact('cocktails', 'categories', 'ingredients'));
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

    public function getIngredients($cocktails)
    {
        $ingredients = [];
        foreach ($cocktails as $cocktail) {
            foreach ($cocktail['ingredients'] as $ingredient) {
                if (isset($ingredient['ingredient'])) {
                    $ingredients[] = $ingredient['ingredient'];
                }
            }
        }
        return array_unique($ingredients);
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
