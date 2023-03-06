<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Spatie\Geocoder\Geocoder;

class UserController extends Controller
{
    public function homefeed()
    {
        return view('homefeed');
    }
    public function showCorrectHomepage()
    {
        if (auth()->check()) {
            return view('homefeed');
        } else {
            return view('homepage');
        }
    }
    public function login(Request $request)
    {

        $incomingfields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $incomingfields['email'], 'password' => $incomingfields['password']])) {
            if (auth()->check()) {
                $request->session()->regenerate();
                return redirect('/homefeed')->with('success', 'you have sucessfully loged in');
            }
        } else {
            return redirect('/')->with('success', 'login failed, no such user in the database');
        }
    }

    
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'first_name' => ['required', 'min:3', 'max:13'],
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:7'],
            'gender' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
        ]);
    
        $client = new Client();
        $geocoder = new Geocoder($client);
        $geocoder->setApiKey('AIzaSyDsDbf6HI9VCkiCZaR3udlrz8lslseyC5o');
        $result = $geocoder->getCoordinatesForAddress($incomingFields['address']);
    
        if ($result) {
            $latitude = $result['lat'];
            $longitude = $result['lng'];
            $incomingFields['latitude'] = $latitude;
            $incomingFields['longitude'] = $longitude;
        } else {
            return redirect()->back()->withErrors(['address' => 'Invalid address']);
        }
    
        $incomingFields['password'] = password_hash($incomingFields['password'], PASSWORD_BCRYPT);
    
        User::create($incomingFields);
    
        return 'User has been registered';
    }
    

    public function profile()
    {
        return view('profile');
    }
}
?>