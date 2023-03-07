<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('home');
    }

    public function index()
    {

        $users = User::latest()->paginate(10);

        return view('adminHome', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        // return view('products.products-add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],

        ]);

        User::create($request->all());

        return redirect()->route('users.adminHome')
            ->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        // return view('products.show',compact('product'));
    }

    public function edit(User $user)
    {
        return view('edithome', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            

        ]);

        // $user->update(array_merge($request->only('name', 'email', 'is_admin', [
        //     'password'->Hash::make($request->password)])));


        $request->request->remove('password_confirmation'); 
        (!$request->filled('password')) ? $request->request->remove('password') : "";
        ($request->has('password')) ?$request->merge(['password' => Hash::make($request->post()['password'])]) : "";
        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'Users updated successfully');
      
    }

}
