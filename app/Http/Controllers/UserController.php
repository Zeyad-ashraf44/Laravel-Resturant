<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $users = User::orderBy('created_at', 'desc')->get();

    return view('admin.users.index', compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required|in:admin,user'
    ]);
 User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
            ]);

        return redirect()->back()->with('success', 'User created successfully.');
    }
    //user edit form 
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    //user update
    public function update(Request $request, User $user)
    {
           $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required|in:admin,user'
    ]);

     $user->name = $request->name;
    $user->email = $request->email;
    $user->role = $request->role;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }
        $user->save();

    return redirect()->back()->with('success', 'User updated successfully.'); }

 

    /**
     * Remove user from storage.
     */
    public function destroy(User $user)
    {
       $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }


}
