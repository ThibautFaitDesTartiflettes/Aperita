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
        return view('home', compact('cocktails', 'categories'));
    }

    public function legalNotice()
    {
        return view('legal-notice');
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

    public function search(Request $request)
    {
        $cocktails = [];
        $categories = array_unique(array_column($this->sortJson(storage_path('app/public/cocktails.json'), 'name'), 'category'));

        $search = $request->input('search');
        $category = $request->input('categories');

        ($category == 'none') ? $cocktails = $this->filterCocktails($search) : $cocktails = $this->filterCocktails($search, $category);

        return view('home', compact('cocktails', 'categories'))->with('#browse');
    }

    public function filterCocktails($name, $category = null)
    {
        $cocktails = $this->sortJson(storage_path('app/public/cocktails.json'), 'name');
        $results = [];

        if ($category != null) {
            if ($category == 'ingredient') {
                foreach ($cocktails as $cocktail) {
                    foreach ($cocktail['ingredients'] as $ingredient) {
                        if (isset($ingredient['ingredient'])) {
                            if (strpos(strtolower($ingredient['ingredient']), strtolower($name)) !== false) {
                                $results[] = $cocktail;
                            }
                        }
                    }
                }
            } else {
                if ($name != "") {
                    foreach ($cocktails as $cocktail) {
                        if (strpos(strtolower($cocktail['name']), strtolower($name)) !== false && $cocktail['category'] == $category) {
                            $results[] = $cocktail;
                        }
                    }
                } else {
                    foreach ($cocktails as $cocktail) {
                        if (isset($cocktail['category']) && $cocktail['category'] == $category) {
                            $results[] = $cocktail;
                        }
                    }
                }
            }
        } else {
            foreach ($cocktails as $cocktail) {
                if (strpos(strtolower($cocktail['name']), strtolower($name)) !== false) {
                    $results[] = $cocktail;
                }
            }
        }
        return $results;
    }

    static function selectGlass($glass) 
    {
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
