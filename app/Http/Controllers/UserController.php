<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkDomain(Request $request)
    {
        $domain = $request->get('domain');
        $team = Team::where('slug', $domain)->first();
        if (!$team) {
            $request->session()->flash([
                'status' => 'err',
                'message' => 'Команда не существует'
            ]);
            return redirect('/register');
        }

        return redirect('/login')->with('domain', $domain);
    }

    public function getLogin(Request $request)
    {
        if (!$request->session()->has('domain')) {
            return redirect('/');
        }

        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $domain = $request->get('domain');

        $team = Team::where('slug', $domain)->first();
        if (!$team) {
            abort(404);
        }

        if (Auth::attempt(['email' => $email, 'password' => $password, 'team_id' => $team->id])) {
            $user = Auth::user();
            return redirect()->intended("/app/{$team->slug}");
        }

        $request->session()->flash([
            'status' => 'err',
            'message' => 'Неправильные данные'
        ]);
        return redirect()->back();
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $domain = $request->get('domain');

        $team = Team::where('slug', $domain)->first();

        if ($team) {
            $request->session()->flash([
                'status' => 'err',
                'message' => 'Команда уже существует'
            ]);
            return redirect()->back();
        }

        $team = Team::create([
            'slug' => $domain
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'username' => str_slug($request->get('name')),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'avatar' => '/img/logo.png',
        ]);

        Auth::login($user);

        return redirect("/app/{$team->slug}/team");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
