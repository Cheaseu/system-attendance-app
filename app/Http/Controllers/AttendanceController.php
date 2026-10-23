<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomersExport;
class AttendanceController extends Controller
{
    public function Dashboard(){
        return view('dashboard');
    }


    // public function ViewCoustomer(Request $request){
    //     $query = DB::table('attendances');

    //     // Search by fullname, location, or money (optional)
    //     if ($request->filled('search')) {
    //         $search = $request->search;

    //         $query->where(function ($q) use ($search) {
    //             $q->where('fullname', 'LIKE', "%{$search}%")
    //             ->orWhere('location', 'LIKE', "%{$search}%")
    //             ->orWhere('money', 'LIKE', "%{$search}%");
    //         });
    //     }

    //     $sql = $query->orderBy('id', 'desc')->get();

    //     return view('viewcoustomer', ['getquery' => $sql]);
    // }

//     public function ViewCoustomer(Request $request) {
//     $query = DB::table('attendances');

//     // Search by fullname, location, or money
//     if ($request->filled('search')) {
//         $search = $request->search;

//         $query->where(function ($q) use ($search) {
//             $q->where('fullname', 'LIKE', "%{$search}%")
//               ->orWhere('location', 'LIKE', "%{$search}%")
//               ->orWhere('money', 'LIKE', "%{$search}%");
//         });
//     }

//     // ប្ដូរពី ->get() មកជា ->paginate(10) 
//     // $sql = $query->orderBy('id', 'desc')->paginate(10);
//     $sql = $query->orderBy('id', 'desc')->get();

//     return view('viewcoustomer', ['getquery' => $sql]);
// }

//     public function ExportCustomers(Request $request)
//     {
//         return Excel::download(
//             new CustomersExport($request->search),
//             'customers.xlsx'
//         );
//     }


//     public function Addcoustomer(){
//         return view('add-coustomer');
//     }

//     public function AddcoustomerSubmit(Request $request){
//         $insert = DB::table('attendances')->insert([
//         'fullname' => $request->fullname,
//         'money'    => $request->money,
//         'symbol'   => $request->symbol,
//         'location' => $request->location,
//         'created_at' => now(),
//         'updated_at' => now() 
//     ]);

//         if($insert){
//             return redirect('viewcoustomer')->with('success', 'coustomer added successfully.');
//         }


//     }

//     public function UdateCoustomer($idupdate){
//         $sqlupdate = DB::table('attendances')
//                         ->where('id', $idupdate)
//                         ->first();
//         return view('update-coustomer', compact('sqlupdate'));
//     }

//     public function UdateCoustomerSubmit(Request $request){
//         $update = DB::table('attendances')->where('id', $request->id)->update([
//             'fullname' =>$request->fullname,
//             'money'    =>$request->money,
//             'symbol'   => $request->symbol,
//             'location' =>$request->location,
//             'created_at' => now(),
//             'updated_at' => now() 
//         ]);
//         if($update){
//             return redirect('viewcoustomer')->with('success', 'coustomer updated successfully.');
//         }
//         else{
//             return redirect('update-coustomer');
//         }
//     }

//     public function DeleteAtten($id_dele){
//         $delete = DB::table('attendances')->where('id',$id_dele)->delete();
//         if($delete){
//             return redirect('viewcoustomer')->with('success', 'Student deleted successfully.');
//         } else {
//             return redirect('viewcoustomer')->with('error', 'Student not deleted successfully.');
//         }
//     }



public function ViewCoustomer(Request $request) {
        $query = DB::table('attendances');

        // Search by fullname, location, or money
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('fullname', 'LIKE', "%{$search}%")
                  ->orWhere('location', 'LIKE', "%{$search}%")
                  ->orWhere('money', 'LIKE', "%{$search}%");
            });
        }

        $sql = $query->orderBy('id', 'desc')->get();

        return view('viewcoustomer', ['getquery' => $sql]);
    }

    public function ExportCustomers(Request $request)
    {
        return Excel::download(
            new CustomersExport($request->search),
            'customers.xlsx'
        );
    }

    // Submit Add Customer ពី Modal
    public function AddcoustomerSubmit(Request $request){
        $insert = DB::table('attendances')->insert([
            'fullname'   => $request->fullname,
            'money'      => $request->money,
            'symbol'     => $request->symbol,
            'location'   => $request->location,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if($insert){
            return redirect()->route('viewcoustomer')->with('success', 'Customer added successfully.');
        } else {
            return redirect()->route('viewcoustomer')->with('error', 'Failed to add customer.');
        }
    }

    // Submit Update Customer ពី Modal
    public function UdateCoustomerSubmit(Request $request){
        $update = DB::table('attendances')->where('id', $request->id)->update([
            'fullname'   => $request->fullname,
            'money'      => $request->money,
            'symbol'     => $request->symbol,
            'location'   => $request->location,
            'updated_at' => now() // កែប្រែតែ updated_at បានហើយ
        ]);

        if($update){
            return redirect()->route('viewcoustomer')->with('success', 'Customer updated successfully.');
        } else {
            
            return redirect()->route('viewcoustomer')->with('info', 'No changes were made.');
        }
    }

    // Delete Customer
    public function DeleteAtten($id_dele){
        $delete = DB::table('attendances')->where('id', $id_dele)->delete();
        
        if($delete){
            return redirect()->route('viewcoustomer')->with('success', 'Customer deleted successfully.');
        } else {
            return redirect()->route('viewcoustomer')->with('error', 'Failed to delete customer.');
        }
    }
}
