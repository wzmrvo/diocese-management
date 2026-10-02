<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\Vicariate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;

class OrganizationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ORGANIZATION DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $vicariateCount = Schema::hasTable('vicariates')
            ? Vicariate::count()
            : 0;

        $unitCount = Schema::hasTable('units')
            ? Unit::count()
            : 0;

        return view(
            'admin.organization.index',
            compact(
                'vicariateCount',
                'unitCount'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | OFFICERS
    |--------------------------------------------------------------------------
    */

    public function officers()
    {
        return view('admin.organization.officers');
    }


    /*
    |--------------------------------------------------------------------------
    | VICARIATES
    |--------------------------------------------------------------------------
    */

    public function vicariates()
    {
        $vicariates = Schema::hasTable('vicariates')
            ? Vicariate::withCount('units')
                ->latest()
                ->get()
            : collect();

        return view(
            'admin.organization.vicariates',
            compact('vicariates')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE VICARIATE
    |--------------------------------------------------------------------------
    */

    public function createVicariate()
    {
        return view(
            'admin.organization.vicariates.create'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE VICARIATE
    |--------------------------------------------------------------------------
    */

    public function storeVicariate(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:vicariates,name',
            ],
        ]);

        Vicariate::create($validated);

        return redirect()
            ->route('admin.organization.vicariates.index')
            ->with(
                'success',
                'Vicariate successfully added.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT VICARIATE
    |--------------------------------------------------------------------------
    */

    public function editVicariate(Vicariate $vicariate)
    {
        $unitCount = Schema::hasTable('units')
            ? Unit::where(
                'vicariate_id',
                $vicariate->id
            )->count()
            : 0;

        return view(
            'admin.organization.vicariates.edit',
            compact(
                'vicariate',
                'unitCount'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE VICARIATE
    |--------------------------------------------------------------------------
    */

    public function updateVicariate(
        Request $request,
        Vicariate $vicariate
    ) {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique(
                    'vicariates',
                    'name'
                )->ignore($vicariate->id),
            ],
        ]);

        $vicariate->update($validated);

        return redirect()
            ->route(
                'admin.organization.vicariates.index'
            )
            ->with(
                'success',
                'Vicariate successfully updated.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | CONFIRM DELETE VICARIATE
    |--------------------------------------------------------------------------
    */

    public function confirmDeleteVicariate(
        Vicariate $vicariate
    ) {
        $unitCount = Schema::hasTable('units')
            ? Unit::where(
                'vicariate_id',
                $vicariate->id
            )->count()
            : 0;

        return view(
            'admin.organization.vicariates.delete',
            compact(
                'vicariate',
                'unitCount'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE VICARIATE
    |--------------------------------------------------------------------------
    */

    public function destroyVicariate(
        Request $request,
        Vicariate $vicariate
    ) {
        $request->validate([
            'password' => [
                'required',
                'string',
            ],
        ], [
            'password.required' =>
                'Enter your admin password to confirm deletion.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Verify authenticated admin password
        |--------------------------------------------------------------------------
        */

        if (
            !Auth::check() ||
            !Hash::check(
                $request->password,
                Auth::user()->password
            )
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'password' =>
                        'The admin password is incorrect.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Prevent deleting Vicariate with Units
        |--------------------------------------------------------------------------
        */

        $unitCount = Schema::hasTable('units')
            ? Unit::where(
                'vicariate_id',
                $vicariate->id
            )->count()
            : 0;

        if ($unitCount > 0) {

            return redirect()
                ->route(
                    'admin.organization.vicariates.edit',
                    $vicariate
                )
                ->with(
                    'error',
                    "This vicariate cannot be deleted because it still contains {$unitCount} unit(s). Move or delete those units first."
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete
        |--------------------------------------------------------------------------
        */

        $name = $vicariate->name;

        $vicariate->delete();

        return redirect()
            ->route(
                'admin.organization.vicariates.index'
            )
            ->with(
                'success',
                "\"{$name}\" was successfully deleted."
            );
    }


    /*
    |--------------------------------------------------------------------------
    | UNITS
    |--------------------------------------------------------------------------
    */

    public function units()
    {
        $units = Schema::hasTable('units')
            ? Unit::with('vicariate')
                ->latest()
                ->get()
            : collect();

        $vicariates = Schema::hasTable('vicariates')
            ? Vicariate::orderBy('name')->get()
            : collect();

        return view(
            'admin.organization.units',
            compact(
                'units',
                'vicariates'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE UNIT
    |--------------------------------------------------------------------------
    */

    public function createUnit()
    {
        $vicariates = Schema::hasTable('vicariates')
            ? Vicariate::orderBy('name')->get()
            : collect();

        /*
        |--------------------------------------------------------------------------
        | Unit requires a Vicariate
        |--------------------------------------------------------------------------
        */

        if ($vicariates->isEmpty()) {

            return redirect()
                ->route(
                    'admin.organization.vicariates.index'
                )
                ->with(
                    'error',
                    'Create a vicariate first before adding a unit.'
                );
        }

        return view(
            'admin.organization.units.create',
            compact('vicariates')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE UNIT
    |--------------------------------------------------------------------------
    */

    public function storeUnit(Request $request)
    {
        if (
            !Schema::hasTable('vicariates') ||
            Vicariate::count() === 0
        ) {
            return redirect()
                ->route(
                    'admin.organization.vicariates.index'
                )
                ->with(
                    'error',
                    'Create a vicariate first before adding a unit.'
                );
        }

        $validated = $request->validate([
            'vicariate_id' => [
                'required',
                'integer',
                'exists:vicariates,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Prevent duplicate Unit names
        |--------------------------------------------------------------------------
        */

        $exists = Unit::where(
            'vicariate_id',
            $validated['vicariate_id']
        )
            ->where(
                'name',
                $validated['name']
            )
            ->exists();

        if ($exists) {

            return back()
                ->withInput()
                ->withErrors([
                    'name' =>
                        'This unit already exists under the selected vicariate.',
                ]);
        }


        Unit::create($validated);

        return redirect()
            ->route(
                'admin.organization.units.index'
            )
            ->with(
                'success',
                'Unit successfully added.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT UNIT
    |--------------------------------------------------------------------------
    */

    public function editUnit(Unit $unit)
    {
        $unit->load('vicariate');

        $vicariates = Schema::hasTable('vicariates')
            ? Vicariate::orderBy('name')->get()
            : collect();

        return view(
            'admin.organization.units.edit',
            compact(
                'unit',
                'vicariates'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE UNIT
    |--------------------------------------------------------------------------
    */

    public function updateUnit(
        Request $request,
        Unit $unit
    ) {
        $validated = $request->validate([
            'vicariate_id' => [
                'required',
                'integer',
                'exists:vicariates,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Prevent duplicate Unit names
        |--------------------------------------------------------------------------
        */

        $exists = Unit::where(
            'vicariate_id',
            $validated['vicariate_id']
        )
            ->where(
                'name',
                $validated['name']
            )
            ->where(
                'id',
                '!=',
                $unit->id
            )
            ->exists();

        if ($exists) {

            return back()
                ->withInput()
                ->withErrors([
                    'name' =>
                        'This unit already exists under the selected vicariate.',
                ]);
        }


        $unit->update($validated);

        return redirect()
            ->route(
                'admin.organization.units.index'
            )
            ->with(
                'success',
                'Unit successfully updated.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | CONFIRM DELETE UNIT
    |--------------------------------------------------------------------------
    */

    public function confirmDeleteUnit(
        Unit $unit
    ) {
        $unit->load('vicariate');

        return view(
            'admin.organization.units.delete',
            compact('unit')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE UNIT
    |--------------------------------------------------------------------------
    */

    public function destroyUnit(
        Request $request,
        Unit $unit
    ) {
        $request->validate([
            'password' => [
                'required',
                'string',
            ],
        ], [
            'password.required' =>
                'Enter your admin password to confirm deletion.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Verify authenticated admin password
        |--------------------------------------------------------------------------
        */

        if (
            !Auth::check() ||
            !Hash::check(
                $request->password,
                Auth::user()->password
            )
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'password' =>
                        'The admin password is incorrect.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Delete
        |--------------------------------------------------------------------------
        */

        $name = $unit->name;

        $unit->delete();

        return redirect()
            ->route(
                'admin.organization.units.index'
            )
            ->with(
                'success',
                "\"{$name}\" was successfully deleted."
            );
    }
}