<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Exports\EmployeesExport;
use App\Exports\DepartmentExport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\SimpleExcel\SimpleExcelWriter;

class EmployeeController extends Controller
{
    public function index(): View
    {
        return view('employees', ['employees' => Employee::paginate(10)]);
    }

    public function export()
    {
        $file_name = 'employees_'.date('Y_m_d_H_i_s').'.csv';
        // Maatwebsite Solution
        // return Excel::download(new EmployeesExport, $file_name);

        // Spatie/SimpleExcel Solution
        /* $rows = [];

        Employee::chunk(5000, function ($employees) use (&$rows) {
            foreach ($employees->toArray() as $e) {
                $rows[] = $e;
            }
        });

        SimpleExcelWriter::streamDownload($file_name)
            ->addRows($rows); */

        // PHP raw solution
        $handle = fopen(public_path('storage/'.$file_name), mode: 'w');
        Employee::chunk(10000, function ($employees) use ($handle) {
            foreach ($employees->toArray() as $e) {
                fputcsv($handle, $e);
            }
        });
        fclose($handle);

        return Storage::disk('public')->download($file_name);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
        ]);

        //$request->user()->

        return redirect(route('employees.index'));
    }
}
