<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\User;
use App\Role;
use Auth;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($team)
    {
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        $roles = Role::all()->filter(function ($role) {
            return !($role->slug === 'admin');
        });

        $user = Auth::user();

        return view('team.create', [
            'roles' => $roles,
            'team' => $team,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($team, Request $request)
    {
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        User::create([
            'name' => $request->get('name'),
            'team_id' => $request->get('team_id'),
            'role_id' => $request->get('role_id'),
            'username' => str_slug($request->get('name')),
            'avatar' => 'img/logo.png',
            'password' => bcrypt($request->get('password')),
            'email' => $request->get('email')
        ]);

        return redirect("/app/{$team->slug}/manage");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($team, $id)
    {
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        $roles = Role::all()->filter(function ($role) {
            return !($role->slug === 'admin');
        });

        $editUser = User::find($id);
        $user = Auth::user();

        return view('team.edit', [
            'roles' => $roles,
            'team' => $team,
            'user' => $user,
            'editUser' => $editUser,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($team, $id, Request $request)
    {
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        $user = User::find($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role_id = $request->get('role_id');

        if ($request->has('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();

        return redirect("/app/{$team->slug}/manage");
    }

    public function checkDomain(Request $request)
    {
        $domain = $request->get('domain');
        $team = Team::where('slug', $domain)->first();
        if (!$team) {
            $request->session()->flash('status', 'err');
            $request->session()->flash('message', 'Команда не существует');

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

        $request->session()->flash('status', 'err');
        $request->session()->flash('message', 'Неправильные данные');
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
            $request->session()->flash('status', 'err');
            $request->session()->flash('message', 'Команда уже существует');

            return redirect()->back();
        }

        $team = Team::create([
            'slug' => $domain
        ]);
        $role = Role::where('slug', 'admin')->first();

        $user = User::create([
            'name' => $request->get('name'),
            'username' => str_slug($request->get('name')),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'avatar' => 'img/logo.png',
            'role_id' => $role->id,
            'team_id' => $team->id,
        ]);

        Auth::login($user);

        return redirect("/app/{$team->slug}/manage");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function swapPriority(Request $request)
    {
        $user1 = User::find($request->get('id1'));
        $user2 = User::find($request->get('id2'));

        $t = $user1->priority;
        $user1->priority = $user2->priority;
        $user2->priority = $t;
        $user1->save();
        $user2->save();

        return response()->json([
            'status' => 'ok',
        ]);
    }
}
