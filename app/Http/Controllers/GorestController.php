<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class GorestController extends Controller
{
    public function iii()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://gorest.co.in/public-api/');
        $response = $request->getBody();
    
        return $response;
    }
    public function index()
    {
        $client = new Client(['base_uri' => 'https://gorest.co.in/public-api/']);
        $response = $client->request('GET', 'users');
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        $finaldata = $data['data'];

        return view('gorest.index',compact('finaldata'));
    }
    public function show($id)
    {   
        $client = new Client(['base_uri' => 'https://gorest.co.in/public-api/']);
        $response = $client->request('GET', 'users/'.$id.'');
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        $finaldata = $data['data'];
 
        return view('gorest.show',compact('finaldata'));
    }
    public function edit($id)
    {
        $client = new Client(['base_uri' => 'https://gorest.co.in/public-api/']);
        $response = $client->request('GET', 'users/'.$id.'');
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        $finaldata = $data['data'];
        return view('gorest.edit',compact('finaldata'));
    }
    public function update(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required',
        'gender' => 'required',
        'status' => 'required',
    ]);
        $token = 'c45ee81606b44da6bcb67057df955e941feb97e1be82e94443b1add8499c847d';
        $client = new Client();
        $response = $client->request('PUT', 'https://gorest.co.in/public-api/users/'.$request->id.'', [
        'headers' => [
        'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ],
            'form_params' => [
            'name' => $request->name,
            'email' => $request->email,
        ]
        ]);      
        return redirect('/');
    }
    public function delete($id)
    {
        $token = 'c45ee81606b44da6bcb67057df955e941feb97e1be82e94443b1add8499c847d';
        $client = new Client();
        $response = $client->request('DELETE', 'https://gorest.co.in/public-api/users/'.$id.'', [
        'headers' => [
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $token,
        ]
    ]);
        return redirect('/');
    }
    public function create()
    {
        return view('gorest.create');
    }
    public function submit(Request $request)
    {
        $request->validate([
        'name'=>'required',
        'email'=> 'required',
        'gender' => 'required',
        'status' => 'required',
        ]);
        $token = 'c45ee81606b44da6bcb67057df955e941feb97e1be82e94443b1add8499c847d';
        $client = new Client();
        $response = $client->request('POST', 'https://gorest.co.in/public-api/users/'.$request->id.'', [
        'headers' => [
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $token,
        ],
            'form_params' => [
            'name' => $request->name,
            'email' => $request->email,
        ]
        ]);      
       return redirect('/');
    }

}
