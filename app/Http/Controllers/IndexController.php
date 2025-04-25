<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function search(Request $request){
        if($request->ajax()){
            $data = Employee::where('card_number', $request->search)
                                ->where('is_active', 1)->get();
             $output = '';
            //  if(Carbon::now()->diffInMinutes($data->created_at) > 2){
            // ene heseg deer log deer data baigaa esehiig employee idgaar shalgaad bwal algasana, hgui bol create hiine.
            if($data->isNotEmpty()){
                Log::create([
                'fname'=> $data[0]->fname,
                'lname'=> $data[0]->lname,
                'register'=> $data[0]->register,
                'phone'=> $data[0]->phone,
                'date_of_employement'=> $data[0]->date_of_employement,
                'date_of_expiration' => $data[0]->date_of_expiration,
                'photo'=> $data[0]->photo,
                'company_id'=> $data[0]->company_id,
                'co_operation_id'=> $data[0]->co_operation_id,
                'appointment_id'=> $data[0]->appointment_id,
                'mining_site_id'=> $data[0]->mining_site_id,
                'sub_company_id'=> $data[0]->sub_company_id,
                'shift_id'=> $data[0]->shift_id,
                'region_id'=> $data[0]->region_id,
                'point_id'=> $data[0]->point_id,
                'card_number'=> $data[0]->card_number,
                'employee_uid'=> $data[0]->employee_uid,
                'is_active'=> $data[0]->is_active,
                ]);
            }
            // else {
            //     $output = '<h1 class="text-center text-3xl text-red-500">хоосон утга</h1>';
            // }
            if($data->count() > 0){
                    $output .= '<table class= "table-auto border-collapse border border-blue-400">
                    <thread>
                    <tr>
                    <th class="border border-gray-300 p-4 m-4">Түншлэл:</th>
                        <th class="border border-gray-300 p-4 m-4">Туслан гүйцэтгэгч:</th>
                        <th class="border border-gray-300 p-4 m-4">Овог:</th>
                        <th class="border border-gray-300 p-4 m-4">Нэр:</th>
                        <th class="border border-gray-300 p-4 m-4">Ажилд орсон огноо:</th>
                        <th class="border border-gray-300 p-4 m-4">Албан тушаал:</th>
                        <th class="border border-gray-300 p-4 m-4">Ажилтны код:</th>
                        <th class="border border-gray-300 p-4 m-4">Ажилтны зураг:</th>
                    </tr>
                    </thread>
                    <tbody>';
                    foreach($data as $row){
                        $output .= '<tr>
                        <td class="border border-gray-300 p-4 m-4">'.$row->coOperation->name.'</td>
                        <td class="border border-gray-300 p-4 m-4">'.$row->company->name.'</td>
                        <td class="border border-gray-300 p-4 m-4">'.$row->fname.'</td>
                        <td class="border border-gray-300 p-4 m-4">'.$row->lname.'</td>
                        <td class="border border-gray-300 p-4 m-4">'.$row->date_of_employement.'</td>
                        <td class="border border-gray-300 p-4 m-4">'.$row->appointment->name.'</td>
                        <td class="border border-gray-300 p-4 m-4">'.$row->employee_uid.'</td>
                        <td class="p-2 m-2 flex justify-center items-center"><img src="'. asset ('storage/' .$row->photo). '" width="110" height="130"> </td>
                        </tr>';
                    $output .= '</tbody>
                    </table>';
                    }
            } else{
                $output .= '<tr><td align="center" colspan="5"><h1 class="text-center text-3xl text-red-500">Та бүртгэлгүй байна.</h1></td></tr>';
            }
            // dd($data);
        //    echo json_encode($data);
            return $output;
            }

        }
        public function logs (Request $request){
            if ($request->ajax()){
             $data = Log::orderBy('id', 'desc')->take(3)->get();
                return $data;
            }
        }
    }




