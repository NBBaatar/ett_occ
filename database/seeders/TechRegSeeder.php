<?php

namespace Database\Seeders;

use App\Models\TechReg;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TechRegSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $techRegs = [
            array (
                'mining_site_id' => '1',
                'co_operation_id' => '1',
                'company_id' => '1',
                'sub_company_id' => '1',
                'tech_category_id' => '1',
                'tech_type_id' => '1',
                'tech_brand_id' => '1',
                'tech_mark_id' => '1',
                'tech_specs_id' => '1',
                'tech_number' => '0001UNA',
                'tech_park_number' => 'D-01',
                'tech_aral_numebr' => 'AR00000001',
                'date_of_manufacture' => '1990',
                'date_of_imported' => '2001-01-01',
                'tech_tewsh' => json_encode([['tevsh' => 'is_double']]),
                'radio_id' => '30116',
                'radio_serial' => '',
                'status' => '1',
                'property_file' => '',
                'property' => json_encode([['property_id' => '5', 'property_company_name' => 'Эрдэнэс Тавантолгой ХК']]),
                'tech_permission' => json_encode([[
                    'description' => null,
                    'request_num' => '4155-3',
                    'permission_num' => '1618',
                    'permission_date' => '2024-12-30',
                    'permission_date_expire' => "2027-10-31",
                    'permitted_person_1' => 'Нараа',
                    "permitted_person_2" => "Даваа",
                    "permitted_person_3" => "Сараа",
                    "permitted_person_branch_ceo" => 'Батяю'
                ]]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array (
                'mining_site_id' => '1',
                'co_operation_id' => '1',
                'company_id' => '1',
                'sub_company_id' => '1',
                'tech_category_id' => '1',
                'tech_type_id' => '1',
                'tech_brand_id' => '1',
                'tech_mark_id' => '1',
                'tech_specs_id' => '1',
                'tech_number' => '0001UNA',
                'tech_park_number' => 'D-01',
                'tech_aral_numebr' => 'AR00000001',
                'date_of_manufacture' => '1990',
                'date_of_imported' => '2001-01-01',
                'tech_tewsh' => json_encode([['tevsh' => 'is_double']]),
                'radio_id' => '30116',
                'radio_serial' => '',
                'status' => '1',
                'property_file' => '',
                'property' => json_encode([['property_id' => '5', 'property_company_name' => 'Эрдэнэс Тавантолгой ХК----+++##']]),
                'tech_permission' => json_encode([[
                    'description' => null,
                    'request_num' => '4155-3',
                    'permission_num' => '1618',
                    'permission_date' => '2024-12-30',
                    'permission_date_expire' => "2027-10-31",
                    'permitted_person_1' => 'Нараа',
                    "permitted_person_2" => "Даваа",
                    "permitted_person_3" => "Сараа",
                    "permitted_person_branch_ceo" => 'Батяю'
                ]]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
        ];
        DB::table('tech_regs')->insert($techRegs);
    }
}
