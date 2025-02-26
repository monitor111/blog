<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
}







// ДЛЯ ВОССТАНОВЛЕНИЯ УДАЛЕННОГО - МЕНЯЕМ НА ТОТ ЧТО В ВЕРХУ !!!

// namespace App\Http\Controllers\Admin\Category;

// use App\Http\Controllers\Controller;
// use App\Models\Category;
// use Illuminate\Http\Request;

// class IndexController extends Controller
// {
//     public function __invoke()
//     {
//         // Восстанавливаем запись с ID 21, если она существует
//         $category = Category::withTrashed()->find(19);
//         if ($category) {
//             $category->restore(); // Восстанавливаем запись с ID 21
//         }

//         // Получаем все записи, включая восстановленные
//         $categories = Category::all();
        
//         // Возвращаем представление с категориями
//         return view('admin.category.index', compact('categories'));
//     }
// }

