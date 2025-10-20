<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Log;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::where('card_number', $request->search)
                ->where('is_active', 1)->get();
            $output = '';
            //  if(Carbon::now()->diffInMinutes($data->created_at) > 2)
            // ene heseg deer log deer data baigaa esehiig employee idgaar shalgaad bwal algasana, hgui bol create hiine.
//            if ($request->isMethod('POST')) {
//
//            }
            if ($data->isNotEmpty()) {
                Log::Create([
                    'fname'               => $data[0]->fname,
                    'lname'               => $data[0]->lname,
                    'register'            => $data[0]->register,
                    'phone'               => $data[0]->phone,
                    'date_of_employement' => $data[0]->date_of_employement,
                    'date_of_expiration'  => $data[0]->date_of_expiration,
                    'photo'               => $data[0]->photo,
                    'company_id'          => $data[0]->company_id,
                    'co_operation_id'     => $data[0]->co_operation_id,
                    'appointment_id'      => $data[0]->appointment_id,
                    'mining_site_id'      => $data[0]->mining_site_id,
                    'sub_company_id'      => $data[0]->sub_company_id,
                    'shift_id'            => $data[0]->shift_id,
                    'region_id'           => $data[0]->region_id,
                    'point_id'            => $data[0]->point_id,
                    'card_number'         => $data[0]->card_number,
                    'employee_uid'        => $data[0]->employee_uid,
                    'is_active'           => $data[0]->is_active,
                    'is_inserted'         => true,
                ]);
            } else {
                Log::create([
                    'card_number'         => $request->search,
                    'is_active'           => false,
                    'is_inserted'         => false,
                ]);
            }

            if ($data->count() > 0) {
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
                foreach ($data as $row) {
                    $output .= '<tr>
                        <td class="border border-gray-300 p-4 m-4">' . $row->coOperation->name . '</td>
                        <td class="border border-gray-300 p-4 m-4">' . $row->company->name . '</td>
                        <td class="border border-gray-300 p-4 m-4">' . $row->fname . '</td>
                        <td class="border border-gray-300 p-4 m-4">' . $row->lname . '</td>
                        <td class="border border-gray-300 p-4 m-4">' . $row->date_of_employement . '</td>
                        <td class="border border-gray-300 p-4 m-4">' . $row->appointment->name . '</td>
                        <td class="border border-gray-300 p-4 m-4">' . $row->employee_uid . '</td>
                        <td class="p-2 m-2 flex justify-center items-center"><img src="' . asset('storage/' . $row->photo) . '" width="110" height="130"> </td>
                        </tr>';
                    $output .= '</tbody>
                    </table>';
                }
            } else {
                $output .= '<tr><td align="center" colspan="5"><h1 class="text-center text-3xl text-red-500">Та бүртгэлгүй байна.</h1></td></tr>';
            }
            // dump($data);
            //    echo json_encode($data);
            return $output;
        }
    }
    public function search1(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::where('card_number', $request->search)
                ->where('is_active', 1)
//                ->where('point_id', '=', '2')
                ->get();

            $output = '';
            //  if(Carbon::now()->diffInMinutes($data->created_at) > 2)
            // ene heseg deer log deer data baigaa esehiig employee idgaar shalgaad bwal algasana, hgui bol create hiine.
//            if ($request->isMethod('POST')) {
//
//            }
            if ($data->isNotEmpty()) {
                Log::Create([
                    'fname'               => $data[0]->fname,
                    'lname'               => $data[0]->lname,
                    'register'            => $data[0]->register,
                    'phone'               => $data[0]->phone,
                    'date_of_employement' => $data[0]->date_of_employement,
                    'date_of_expiration'  => $data[0]->date_of_expiration,
                    'photo'               => $data[0]->photo,
                    'company_id'          => $data[0]->company_id,
                    'co_operation_id'     => $data[0]->co_operation_id,
                    'appointment_id'      => $data[0]->appointment_id,
                    'mining_site_id'      => $data[0]->mining_site_id,
                    'sub_company_id'      => $data[0]->sub_company_id,
                    'shift_id'            => $data[0]->shift_id,
                    'region_id'           => $data[0]->region_id,
                    'point_id'            => $data[0]->point_id,
                    'card_number'         => $data[0]->card_number,
                    'employee_uid'        => $data[0]->employee_uid,
                    'is_active'           => $data[0]->is_active,
                    'is_inserted'         => true,
                ]);
            } else {
                Log::create([
                    'card_number'         => $request->search,
                    'is_active'           => false,
                    'is_inserted'         => false,
                ]);
            }
            if ($data->count() > 0) {
                $output .= '<div class="flex justify-center items-start p-2">
                <div class="w-full max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 gap-8">';
                foreach ($data as $row) {
                    $output .= '<div class="bg-white rounded-3xl shadow-2xl border border-amber-100 overflow-hidden">
                        <div class="p-2">
                            <div class="flex items-center space-x-8">
                                <!-- Зураг -->
                                <div class="flex-shrink-0">
                                    <img src="' . asset('storage/' . $row->photo) . '" class="w-36 h-44 object-cover rounded-2xl border border-gray-200 shadow-lg">
                                </div>
                                <!-- Үндсэн мэдээлэл -->
                                <div class="flex-1">
                                    <div class="mb-1">
                                        <h6 class="text-xl font-bold text-gray-900 mb-3">' . $row->lname . ' ' . $row->fname . '</h6>
                                        <p class="text-xl text-blue-600 font-semibold mb-2">' . $row->appointment->name . '</p>
                                        <p class="text-lg text-gray-500 font-medium">Ажилтны код: №' . $row->employee_uid . '</p>
                                    </div>
                                   <!-- Дэлгэрэнгүй мэдээлэл -->
                                    <div class="flex flex-col gap-1">
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Түншлэл</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->coOperation->name . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Компани</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->company->name . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Ажилд орсон</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->date_of_employement . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Үнэмлэх дуусах</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->date_of_expiration . '</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>';
                }
                $output .= '</div></div></div>';
            } else {
                $output .= '
                <div class="w-full py-12 px-4">
                    <div class="max-w-2xl mx-auto text-center bg-white rounded-xl shadow-lg border border-red-200 p-8">
                    <div class="flex justify-center mb-4">
                        <div class="bg-red-100 p-4 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-bold text-red-600 mb-4">Та бүртгэлгүй байна</h1>
                    <p class="text-gray-600 mb-6">Таны картын мэдээлэл системд бүртгэгдээгүй байна</p>
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 text-sm text-red-700">
                        <p>✅ Картаа шалгуулна уу</p>
                        <p>✅ Холбогдох хэлтэст хандана уу</p>
                    </div>
                </div>
            </div>';
            }
            return $output;
        }
    }
    public function search2(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::where('card_number', $request->search)
                ->where('is_active', 1)
//                ->where('point_id', '=', '2')
                ->get();

            $output = '';
            //  if(Carbon::now()->diffInMinutes($data->created_at) > 2)
            // ene heseg deer log deer data baigaa esehiig employee idgaar shalgaad bwal algasana, hgui bol create hiine.
//            if ($request->isMethod('POST')) {
//
//            }
            if ($data->isNotEmpty()) {
                Log::Create([
                    'fname'               => $data[0]->fname,
                    'lname'               => $data[0]->lname,
                    'register'            => $data[0]->register,
                    'phone'               => $data[0]->phone,
                    'date_of_employement' => $data[0]->date_of_employement,
                    'date_of_expiration'  => $data[0]->date_of_expiration,
                    'photo'               => $data[0]->photo,
                    'company_id'          => $data[0]->company_id,
                    'co_operation_id'     => $data[0]->co_operation_id,
                    'appointment_id'      => $data[0]->appointment_id,
                    'mining_site_id'      => $data[0]->mining_site_id,
                    'sub_company_id'      => $data[0]->sub_company_id,
                    'shift_id'            => $data[0]->shift_id,
                    'region_id'           => $data[0]->region_id,
                    'point_id'            => $data[0]->point_id,
                    'card_number'         => $data[0]->card_number,
                    'employee_uid'        => $data[0]->employee_uid,
                    'is_active'           => $data[0]->is_active,
                    'is_inserted'         => true,
                ]);
            } else {
                Log::create([
                    'card_number'         => $request->search,
                    'is_active'           => false,
                    'is_inserted'         => false,
                ]);
            }
            if ($data->count() > 0) {
                $output .= '<div class="flex justify-center items-start p-2">
                <div class="w-full max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 gap-8">';
                foreach ($data as $row) {
                    $output .= '<div class="bg-white rounded-3xl shadow-2xl border border-amber-100 overflow-hidden">
                        <div class="p-2">
                            <div class="flex items-center space-x-8">
                                <!-- Зураг -->
                                <div class="flex-shrink-0">
                                    <img src="' . asset('storage/' . $row->photo) . '" class="w-36 h-44 object-cover rounded-2xl border border-gray-200 shadow-lg">
                                </div>
                                <!-- Үндсэн мэдээлэл -->
                                <div class="flex-1">
                                    <div class="mb-1">
                                        <h6 class="text-xl font-bold text-gray-900 mb-3">' . $row->lname . ' ' . $row->fname . '</h6>
                                        <p class="text-xl text-blue-600 font-semibold mb-2">' . $row->appointment->name . '</p>
                                        <p class="text-lg text-gray-500 font-medium">Ажилтны код: №' . $row->employee_uid . '</p>
                                    </div>
                                   <!-- Дэлгэрэнгүй мэдээлэл -->
                                    <div class="flex flex-col gap-1">
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Түншлэл</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->coOperation->name . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Компани</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->company->name . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Ажилд орсон</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->date_of_employement . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Үнэмлэх дуусах</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->date_of_expiration . '</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>';
                }
                $output .= '</div></div></div>';
            } else {
                $output .= '
                <div class="w-full py-12 px-4">
                    <div class="max-w-2xl mx-auto text-center bg-white rounded-xl shadow-lg border border-red-200 p-8">
                    <div class="flex justify-center mb-4">
                        <div class="bg-red-100 p-4 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-bold text-red-600 mb-4">Та бүртгэлгүй байна</h1>
                    <p class="text-gray-600 mb-6">Таны картын мэдээлэл системд бүртгэгдээгүй байна</p>
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 text-sm text-red-700">
                        <p>✅ Картаа шалгуулна уу</p>
                        <p>✅ Холбогдох хэлтэст хандана уу</p>
                    </div>
                </div>
            </div>';
            }
            return $output;
        }
    }
    public function search3(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::where('card_number', $request->search)
                ->where('is_active', 1)
//                ->where('point_id', '=', '2')
                ->get();

            $output = '';
            //  if(Carbon::now()->diffInMinutes($data->created_at) > 2)
            // ene heseg deer log deer data baigaa esehiig employee idgaar shalgaad bwal algasana, hgui bol create hiine.
//            if ($request->isMethod('POST')) {
//
//            }
            if ($data->isNotEmpty()) {
                Log::Create([
                    'fname'               => $data[0]->fname,
                    'lname'               => $data[0]->lname,
                    'register'            => $data[0]->register,
                    'phone'               => $data[0]->phone,
                    'date_of_employement' => $data[0]->date_of_employement,
                    'date_of_expiration'  => $data[0]->date_of_expiration,
                    'photo'               => $data[0]->photo,
                    'company_id'          => $data[0]->company_id,
                    'co_operation_id'     => $data[0]->co_operation_id,
                    'appointment_id'      => $data[0]->appointment_id,
                    'mining_site_id'      => $data[0]->mining_site_id,
                    'sub_company_id'      => $data[0]->sub_company_id,
                    'shift_id'            => $data[0]->shift_id,
                    'region_id'           => $data[0]->region_id,
                    'point_id'            => $data[0]->point_id,
                    'card_number'         => $data[0]->card_number,
                    'employee_uid'        => $data[0]->employee_uid,
                    'is_active'           => $data[0]->is_active,
                    'is_inserted'         => true,
                ]);
            } else {
                Log::create([
                    'card_number'         => $request->search,
                    'is_active'           => false,
                    'is_inserted'         => false,
                ]);
            }
            if ($data->count() > 0) {
                $output .= '<div class="flex justify-center items-start p-2">
                <div class="w-full max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 gap-8">';
                foreach ($data as $row) {
                    $output .= '<div class="bg-white rounded-3xl shadow-2xl border border-amber-100 overflow-hidden">
                        <div class="p-2">
                            <div class="flex items-center space-x-8">
                                <!-- Зураг -->
                                <div class="flex-shrink-0">
                                    <img src="' . asset('storage/' . $row->photo) . '" class="w-36 h-44 object-cover rounded-2xl border border-gray-200 shadow-lg">
                                </div>
                                <!-- Үндсэн мэдээлэл -->
                                <div class="flex-1">
                                    <div class="mb-1">
                                        <h6 class="text-xl font-bold text-gray-900 mb-3">' . $row->lname . ' ' . $row->fname . '</h6>
                                        <p class="text-xl text-blue-600 font-semibold mb-2">' . $row->appointment->name . '</p>
                                        <p class="text-lg text-gray-500 font-medium">Ажилтны код: №' . $row->employee_uid . '</p>
                                    </div>
                                   <!-- Дэлгэрэнгүй мэдээлэл -->
                                    <div class="flex flex-col gap-1">
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Түншлэл</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->coOperation->name . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Компани</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->company->name . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Ажилд орсон</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->date_of_employement . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Үнэмлэх дуусах</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->date_of_expiration . '</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>';
                }
                $output .= '</div></div></div>';
            } else {
                $output .= '
                <div class="w-full py-12 px-4">
                    <div class="max-w-2xl mx-auto text-center bg-white rounded-xl shadow-lg border border-red-200 p-8">
                    <div class="flex justify-center mb-4">
                        <div class="bg-red-100 p-4 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-bold text-red-600 mb-4">Та бүртгэлгүй байна</h1>
                    <p class="text-gray-600 mb-6">Таны картын мэдээлэл системд бүртгэгдээгүй байна</p>
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 text-sm text-red-700">
                        <p>✅ Картаа шалгуулна уу</p>
                        <p>✅ Холбогдох хэлтэст хандана уу</p>
                    </div>
                </div>
            </div>';
            }
            return $output;
        }
    }
    public function search4(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::where('card_number', $request->search)
                ->where('is_active', 1)
//                ->where('point_id', '=', '2')
                ->get();

            $output = '';
            //  if(Carbon::now()->diffInMinutes($data->created_at) > 2)
            // ene heseg deer log deer data baigaa esehiig employee idgaar shalgaad bwal algasana, hgui bol create hiine.
//            if ($request->isMethod('POST')) {
//
//            }
            if ($data->isNotEmpty()) {
                Log::Create([
                    'fname'               => $data[0]->fname,
                    'lname'               => $data[0]->lname,
                    'register'            => $data[0]->register,
                    'phone'               => $data[0]->phone,
                    'date_of_employement' => $data[0]->date_of_employement,
                    'date_of_expiration'  => $data[0]->date_of_expiration,
                    'photo'               => $data[0]->photo,
                    'company_id'          => $data[0]->company_id,
                    'co_operation_id'     => $data[0]->co_operation_id,
                    'appointment_id'      => $data[0]->appointment_id,
                    'mining_site_id'      => $data[0]->mining_site_id,
                    'sub_company_id'      => $data[0]->sub_company_id,
                    'shift_id'            => $data[0]->shift_id,
                    'region_id'           => $data[0]->region_id,
                    'point_id'            => $data[0]->point_id,
                    'card_number'         => $data[0]->card_number,
                    'employee_uid'        => $data[0]->employee_uid,
                    'is_active'           => $data[0]->is_active,
                    'is_inserted'         => true,
                ]);
            } else {
                Log::create([
                    'card_number'         => $request->search,
                    'is_active'           => false,
                    'is_inserted'         => false,
                ]);
            }
            if ($data->count() > 0) {
                $output .= '<div class="flex justify-center items-start p-2">
                <div class="w-full max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 gap-8">';
                foreach ($data as $row) {
                    $output .= '<div class="bg-white rounded-3xl shadow-2xl border border-amber-100 overflow-hidden">
                        <div class="p-2">
                            <div class="flex items-center space-x-8">
                                <!-- Зураг -->
                                <div class="flex-shrink-0">
                                    <img src="' . asset('storage/' . $row->photo) . '" class="w-36 h-44 object-cover rounded-2xl border border-gray-200 shadow-lg">
                                </div>
                                <!-- Үндсэн мэдээлэл -->
                                <div class="flex-1">
                                    <div class="mb-1">
                                        <h6 class="text-xl font-bold text-gray-900 mb-3">' . $row->lname . ' ' . $row->fname . '</h6>
                                        <p class="text-xl text-blue-600 font-semibold mb-2">' . $row->appointment->name . '</p>
                                        <p class="text-lg text-gray-500 font-medium">Ажилтны код: №' . $row->employee_uid . '</p>
                                    </div>
                                    <!-- Дэлгэрэнгүй мэдээлэл -->
                                    <div class="flex flex-col gap-1">
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Түншлэл</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->coOperation->name . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Компани</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->company->name . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Ажилд орсон</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->date_of_employement . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Үнэмлэх дуусах</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->date_of_expiration . '</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>';
                }
                $output .= '</div></div></div>';
            } else {
                $output .= '
                <div class="w-full py-12 px-4">
                    <div class="max-w-2xl mx-auto text-center bg-white rounded-xl shadow-lg border border-red-200 p-8">
                    <div class="flex justify-center mb-4">
                        <div class="bg-red-100 p-4 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-bold text-red-600 mb-4">Та бүртгэлгүй байна</h1>
                    <p class="text-gray-600 mb-6">Таны картын мэдээлэл системд бүртгэгдээгүй байна</p>
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 text-sm text-red-700">
                        <p>✅ Картаа шалгуулна уу</p>
                        <p>✅ Холбогдох хэлтэст хандана уу</p>
                    </div>
                </div>
            </div>';
            }
            return $output;
        }
    }
    public function search5(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::where('card_number', $request->search)
                ->where('is_active', 1)
//                ->where('point_id', '=', '2')
                ->get();

            $output = '';
            //  if(Carbon::now()->diffInMinutes($data->created_at) > 2)
            // ene heseg deer log deer data baigaa esehiig employee idgaar shalgaad bwal algasana, hgui bol create hiine.
//            if ($request->isMethod('POST')) {
//
//            }
            if ($data->isNotEmpty()) {
                Log::Create([
                    'fname'               => $data[0]->fname,
                    'lname'               => $data[0]->lname,
                    'register'            => $data[0]->register,
                    'phone'               => $data[0]->phone,
                    'date_of_employement' => $data[0]->date_of_employement,
                    'date_of_expiration'  => $data[0]->date_of_expiration,
                    'photo'               => $data[0]->photo,
                    'company_id'          => $data[0]->company_id,
                    'co_operation_id'     => $data[0]->co_operation_id,
                    'appointment_id'      => $data[0]->appointment_id,
                    'mining_site_id'      => $data[0]->mining_site_id,
                    'sub_company_id'      => $data[0]->sub_company_id,
                    'shift_id'            => $data[0]->shift_id,
                    'region_id'           => $data[0]->region_id,
                    'point_id'            => $data[0]->point_id,
                    'card_number'         => $data[0]->card_number,
                    'employee_uid'        => $data[0]->employee_uid,
                    'is_active'           => $data[0]->is_active,
                    'is_inserted'         => true,
                ]);
            } else {
                Log::create([
                    'card_number'         => $request->search,
                    'is_active'           => false,
                    'is_inserted'         => false,
                ]);
            }
            if ($data->count() > 0) {
                $output .= '<div class="flex justify-center items-start p-2">
                <div class="w-full max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 gap-8">';
                foreach ($data as $row) {
                    $output .= '<div class="bg-white rounded-3xl shadow-2xl border border-amber-100 overflow-hidden">
                        <div class="p-2">
                            <div class="flex items-center space-x-8">
                                <!-- Зураг -->
                                <div class="flex-shrink-0">
                                    <img src="' . asset('storage/' . $row->photo) . '" class="w-36 h-44 object-cover rounded-2xl border border-gray-200 shadow-lg">
                                </div>
                                <!-- Үндсэн мэдээлэл -->
                                <div class="flex-1">
                                    <div class="mb-1">
                                        <h6 class="text-xl font-bold text-gray-900 mb-3">' . $row->lname . ' ' . $row->fname . '</h6>
                                        <p class="text-xl text-blue-600 font-semibold mb-2">' . $row->appointment->name . '</p>
                                        <p class="text-lg text-gray-500 font-medium">Ажилтны код: №' . $row->employee_uid . '</p>
                                    </div>
                                   <!-- Дэлгэрэнгүй мэдээлэл -->
                                    <div class="flex flex-col gap-1">
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Түншлэл</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->coOperation->name . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Компани</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->company->name . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Ажилд орсон</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->date_of_employement . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Үнэмлэх дуусах</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->date_of_expiration . '</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>';
                }
                $output .= '</div></div></div>';
            } else {
                $output .= '
                <div class="w-full py-12 px-4">
                    <div class="max-w-2xl mx-auto text-center bg-white rounded-xl shadow-lg border border-red-200 p-8">
                    <div class="flex justify-center mb-4">
                        <div class="bg-red-100 p-4 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-bold text-red-600 mb-4">Та бүртгэлгүй байна</h1>
                    <p class="text-gray-600 mb-6">Таны картын мэдээлэл системд бүртгэгдээгүй байна</p>
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 text-sm text-red-700">
                        <p>✅ Картаа шалгуулна уу</p>
                        <p>✅ Холбогдох хэлтэст хандана уу</p>
                    </div>
                </div>
            </div>';
            }
            return $output;
        }
    }
    public function search6(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::where('card_number', $request->search)
                ->where('is_active', 1)
//                ->where('point_id', '=', '2')
                ->get();

            $output = '';
            //  if(Carbon::now()->diffInMinutes($data->created_at) > 2)
            // ene heseg deer log deer data baigaa esehiig employee idgaar shalgaad bwal algasana, hgui bol create hiine.
//            if ($request->isMethod('POST')) {
//
//            }
            if ($data->isNotEmpty()) {
                Log::Create([
                    'fname'               => $data[0]->fname,
                    'lname'               => $data[0]->lname,
                    'register'            => $data[0]->register,
                    'phone'               => $data[0]->phone,
                    'date_of_employement' => $data[0]->date_of_employement,
                    'date_of_expiration'  => $data[0]->date_of_expiration,
                    'photo'               => $data[0]->photo,
                    'company_id'          => $data[0]->company_id,
                    'co_operation_id'     => $data[0]->co_operation_id,
                    'appointment_id'      => $data[0]->appointment_id,
                    'mining_site_id'      => $data[0]->mining_site_id,
                    'sub_company_id'      => $data[0]->sub_company_id,
                    'shift_id'            => $data[0]->shift_id,
                    'region_id'           => $data[0]->region_id,
                    'point_id'            => $data[0]->point_id,
                    'card_number'         => $data[0]->card_number,
                    'employee_uid'        => $data[0]->employee_uid,
                    'is_active'           => $data[0]->is_active,
                    'is_inserted'         => true,
                ]);
            } else {
                Log::create([
                    'card_number'         => $request->search,
                    'is_active'           => false,
                    'is_inserted'         => false,
                ]);
            }
            if ($data->count() > 0) {
                $output .= '<div class="flex justify-center items-start p-2">
                <div class="w-full max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 gap-8">';
                foreach ($data as $row) {
                    $output .= '<div class="bg-white rounded-3xl shadow-2xl border border-amber-100 overflow-hidden">
                        <div class="p-2">
                            <div class="flex items-center space-x-8">
                                <!-- Зураг -->
                                <div class="flex-shrink-0">
                                    <img src="' . asset('storage/' . $row->photo) . '" class="w-36 h-44 object-cover rounded-2xl border border-gray-200 shadow-lg">
                                </div>
                                <!-- Үндсэн мэдээлэл -->
                                <div class="flex-1">
                                    <div class="mb-1">
                                        <h6 class="text-xl font-bold text-gray-900 mb-3">' . $row->lname . ' ' . $row->fname . '</h6>
                                        <p class="text-xl text-blue-600 font-semibold mb-2">' . $row->appointment->name . '</p>
                                        <p class="text-lg text-gray-500 font-medium">Ажилтны код: №' . $row->employee_uid . '</p>
                                    </div>
                                    <!-- Дэлгэрэнгүй мэдээлэл -->
                                    <div class="flex flex-col gap-1">
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Түншлэл</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->coOperation->name . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Компани</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->company->name . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Ажилд орсон</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->date_of_employement . '</p>
                                        </div>
                                        <div class="rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-4">
                                            <p class="text-sm font-semibold text-gray-600 mb-2">Үнэмлэх дуусах</p>
                                            <p class="text-sm font-bold text-gray-900">' . $row->date_of_expiration . '</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>';
                }
                $output .= '</div></div></div>';
            } else {
                $output .= '
                <div class="w-full py-12 px-4">
                    <div class="max-w-2xl mx-auto text-center bg-white rounded-xl shadow-lg border border-red-200 p-8">
                    <div class="flex justify-center mb-4">
                        <div class="bg-red-100 p-4 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-bold text-red-600 mb-4">Та бүртгэлгүй байна</h1>
                    <p class="text-gray-600 mb-6">Таны картын мэдээлэл системд бүртгэгдээгүй байна</p>
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 text-sm text-red-700">
                        <p>✅ Картаа шалгуулна уу</p>
                        <p>✅ Холбогдох хэлтэст хандана уу</p>
                    </div>
                </div>
            </div>';
            }
            return $output;
        }
    }
    public function logs(Request $request)
    {
        if ($request->ajax()) {
            $data = Log::where('is_inserted', 1)->orderBy('id', 'DESC')->take(4)->latest()->get();
            // $data = Log::orderBy('id', 'DESC')->take(3)->get();
            return $data;
        }
    }
    public function logs_error(Request $request)
    {
        if ($request->ajax()) {
            $data_error = Log::where('is_inserted', 0)->orderBy('id', 'DESC')->take(4)->latest()->get();
            // $data = Log::orderBy('id', 'DESC')->take(3)->get();
            return $data_error;
        }
    }

}
