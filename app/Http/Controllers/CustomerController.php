<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    const PATH_VIEW = 'customers.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customer::latest()->paginate(10);

        return view(self::PATH_VIEW . __FUNCTION__, compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'avatar' => 'nullable|image|max:2048',
            'phone' => ['required', 'string', 'max:20', Rule::unique('customers')],
            'email' => 'required|email|max:100',
            'is_active' => ['nullable', Rule::in([0, 1])],
        ]);
        try {
            if ($request->hasFile('avatar')) {
                $data['avatar'] = Storage::put('customers', $request->file('avatar'));
            }
            Customer::query()->create($data);

            return redirect()
                ->route('customers.index')
                ->with('success', true);
        } catch (\Throwable $th) {
            if (!empty($data('avatar')) && Storage::exists($data['avatar'])) {
                Storage::delete($data['avatar']);
            }
        }
        return back()
            ->with('success', false)
            ->with('error', $th->getMessage());
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact("customer"));
    }

    /**
     * Show the form for  the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact("customer"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'avatar' => 'nullable|image|max:2048',
            'phone' => ['required', 'string', 'max:20', Rule::unique('customers')->ignore($customer->id)],
            'email' => 'required|email|max:100',
            'is_active' => ['nullable', Rule::in([0, 1])],
        ]);
        try {
            if ($request->hasFile('avatar')) {
                $data['avatar'] = Storage::put('customers', $request->files('avatar'));
            }
            $currenntAvatar = $customer->avatar;

            $customer->update($data);

            if ($request->hasFile('avatar') && !empty($currenntAvatar) && Storage::exists($currenntAvatar)) {
                Storage::delete($currenntAvatar);
            }

            return back()->with('success', true);
        } catch (\Throwable $th) {
            if (!empty($data('avatar')) && Storage::exists($data['avatar'])) {
                Storage::delete($data['avatar']);
            }
        }
        return back()
            ->with('success', false)
            ->with('error', $th->getMessage());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            return back()->with('success', true);
        } catch (\Throwable $th)
        {
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }
    public function forcedestroy(Customer $customer)
    {
        try {
            $customer->forcedelete();

            if (!empty($customer->avatar) && Storage::exists($customer->avatar)) {
                Storage::delete($customer->avatar);
            }
            return back()->with('success', true);
        } catch (\Throwable $th)
        {
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }
}
