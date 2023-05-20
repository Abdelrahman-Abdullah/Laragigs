<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('listings.index' ,[
            'listings'=>Listing::filter(
                request(['tag', 'search'])
            )->latest()->paginate(8)->withQueryString()
        ]);
    }

    public function show(Listing $listing): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('listings.show' , ['listing' => $listing]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('listings.create');
    }
    public function store()
    {
        $validatedData = $this->listingValidate();
        if (request('logo') ?? false)
        {
            $validatedData['logo_path'] = request()->file('logo')->store('logos');
        }
        Listing::create($validatedData);
        return redirect('/')->with('message' , 'Listing Add Successfully');

    }

    public function edit(Listing $listing)
    {
        return view('listings.edit' , ['listing' => $listing]);
    }

    public function update(Listing $listing): RedirectResponse
    {
        $validatedData = $this->listingValidate($listing);
        if (request('logo') ?? false)
        {
            $validatedData['logo_path'] = request()->file('logo')->store('logos');
        }
        $listing->update($validatedData);
        return back()->with('message' , 'Listing Updated Successfully');
    }
    public function destroy(Listing $listing): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $listing->delete();
        return back()->with('message' , 'Listing Deleted Successfully');

    }

    public function manage(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('listings.manage' , [
            'listings' => auth()->user()->listings
        ]);
    }



    protected function listingValidate(?Listing $listing = null): array
    {
        $listing ??= new Listing();
        return request()->validate([
            'title' => ['required' , 'min:8' , 'max:255'],
            'tags'  => ['required' , 'max:255'],
            'description' => ['required' , 'min:8'],
            'location' => ['required' , 'min:8' , 'max:255'],
            'website' => ['required' , 'min:8' , 'max:255'],
            'logo' => $listing->exists ? ['image'] : ['required' , 'image'],
            'email' => $listing->exists ? ['required','email'] : ['required' , 'email' , Rule::unique('listings' , 'email')],
            'company' => $listing->exists ? ['required' , 'min:8' , 'max:255'] : ['required' , 'min:8' , 'max:255' , Rule::unique('listings' , 'company')]
        ]);

    }
}
