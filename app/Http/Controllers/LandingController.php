<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.home');
    }


    public function about()
    {
        $items = [
            [
                'name' => 'Julie Brown',
                'title' => 'Head of Development',
                'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60',
                'description' => 'In et sagittis risus, sed molestie sapien. Suspendisse potenti. Sed pharetra, leo quis dignissim tristique, arcu arcu varius libero, ut vestibulum sapien odio facilisis nunc.'
            ],
            [
                'name' => 'NiCo Brown',
                'title' => 'Head of Development',
                'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60',
                'description' => 'In et sagittis risus, sed molestie sapien. Suspendisse potenti. Sed pharetra, leo quis dignissim tristique, arcu arcu varius libero, ut vestibulum sapien odio facilisis nunc.'
            ],
            [
                'name' => 'Julie Loice',
                'title' => 'Head of Development',
                'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60',
                'description' => 'In et sagittis risus, sed molestie sapien. Suspendisse potenti. Sed pharetra, leo quis dignissim tristique, arcu arcu varius libero, ut vestibulum sapien odio facilisis nunc.'
            ],
        ];
        return view('landing.about', compact('items'));
    }

    public function contact()
    {
        return view('landing.contact');
    }

    public function service()
    {
        return view('landing.service');
    }


}
